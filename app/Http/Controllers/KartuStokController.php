<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Model\ItemLedgerEntry;
use App\Model\Item;
use Carbon\Carbon;

class KartuStokController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        $item_data = Item::findOrFail($id);
        $title = Carbon::now()."_".$item_data->item_name.".pdf";
        $item_ledger = ItemLedgerEntry::where('item_id',$id)->whereDate('date','>=',$request->date_1)->whereDate('date','<=',$request->date_2)->orderBy('date')->orderBy('id')->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf_template.kartu_stok',[
            'data'=>$item_ledger,
            'item_data'=>$item_data,
            'date_1'=>$request->date_1,
            'date_2'=>$request->date_2,
            'title'=>$title,
        ]));
        return $pdf->stream($title);
    }
}
