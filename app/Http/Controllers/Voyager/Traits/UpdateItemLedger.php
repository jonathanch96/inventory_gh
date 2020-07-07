<?php 
namespace App\Http\Controllers\Voyager\Traits;

use Illuminate\Http\Request;
use App\Model\ItemLedgerEntry;
use App\Model\Item;

trait UpdateItemLedger{
	protected function updateItemLedger($item_id,$currDate){
		//update item data
		$item_data = Item::find($item_id);
		$sumQty = ItemLedgerEntry::where('item_id',$item_id)->sum('quantity');
		$item_data->update([
			"item_quantity"=>$sumQty,
		]);
		
		//update saldo
		$item_ledger = ItemLedgerEntry::where('item_id',$item_id)->whereDate('date','>=',$currDate)->orderBy('date','DESC')->orderBy('id','DESC')->get();
		$temp_qty = $sumQty;
		foreach ($item_ledger as $key => $il) {

			$il->update([
				'balance'=>$temp_qty,
			]);
			$temp_qty -= $il->quantity;
		}

	}
}


?>