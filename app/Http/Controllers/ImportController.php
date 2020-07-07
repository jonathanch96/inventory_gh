<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\ItemLedgerEntryTemplate;
use App\Imports\ItemLedgerEntryImport;
use App\Model\ItemLedgerEntry;
use App\Model\Item;
use App\Model\UploadLog;
use Validator;
use Carbon\Carbon;
use Auth;
use App\Http\Controllers\Voyager\Traits\UpdateItemLedger;
class ImportController extends Controller
{
    use UpdateItemLedger;

    public function item_ledger_entries(Request $request){
    	$this->validate($request,[
    		'import_file'=>'required|mimes:xlsx',
    	],[]);
    	$data = Excel::toCollection(new ItemLedgerEntryImport,$request->file('import_file'));
    	$data = $data[0]->where('quantity','<>','0');
        //change date
        foreach ($data as $key => $d) {
            $d['date']=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($d['date'])->format('Y-m-d');
        }

        if (count($data)==0){
            return redirect('item-ledger-entries')->with([
                'message'    => 'Tidak ada data/quantity 0',
                'alert-type' => 'error',
            ]);
        }
        return view('import_preview',[
          'data'=>$data,
          'excel_name'=>$request->file('import_file')->getClientOriginalName(),
      ]);
    }
    public function item_ledger_entries_template(){
    	$filename = date('YmdHis').'_ItemLedgerEntries.xlsx';
    	return Excel::download(new ItemLedgerEntryTemplate,$filename);
    	
    }
    public function confirm_item_ledger_entries(Request $request){
        $validator = Validator::make($request->all(),[
            'import_data'=>'required',
            'excel_name'=>'required'
        ],[

        ]);
        if($validator->fails()){
            return redirect('item-ledger-entries')->withErrors($validator);
        }

        $data = json_decode($request->import_data);
        
        //custom validate json
        foreach ($data as $key => $d) {
            $item_data = Item::where('item_code_w_variant',$d->item_code)->first();
            if(!$item_data){
                $validator->getMessageBag()->add('Kode Item', 'Kode Item '.$d->item_code.' tidak ditemukan');
            }
        }
        if($validator->fails()){
            return redirect('item-ledger-entries')->withErrors($validator);
        }
        $upload_log = UploadLog::create([
            "excel_name"=>$request->excel_name,
            "user_id"=>Auth::id(),
            "slug_name"=>"item-ledger-entries",
        ]);
        $document_no = 'UPLOAD_'.str_pad($upload_log->id, 5, '0', STR_PAD_LEFT);
        $upload_log = $upload_log->update([
            'document_no'=>$document_no,
        ]);
        $counter=0;
        foreach ($data as $key => $d) {
            $item_data = Item::where('item_code_w_variant',$d->item_code)->first();

            ItemLedgerEntry::create([
                'item_code'=>$d->item_code,
                'item_name'=>$item_data->item_name,
                'item_id'=>$item_data->id,
                'description'=>$d->description??"",
                'document_no'=>$document_no,
                'document_type_id'=>1,
                'document_type_name'=>'upload-logs',
                'document_id'=>null,
                'quantity'=>$d->quantity,
                'date'=>$d->date,
            ]);
            //recal item
            $this->updateItemLedger($item_data->id,Carbon::now());
            $counter++;
        }
        return redirect('item-ledger-entries')->with([
            'message'    => 'Success add '.$counter.' Data',
            'alert-type' => 'success',
        ]);

    }
}
