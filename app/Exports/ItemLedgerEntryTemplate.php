<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Model\Item;
use Carbon\Carbon;
class ItemLedgerEntryTemplate implements FromCollection, WithStrictNullComparison,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$items = Item::all();
    	$data = collect();
    	$header = [
    		'item_code',
    		'item_name',
            'quantity',
            'description',
    		'date',
    	];
    	$data->push($header);
    	foreach ($items as $key => $item) {
    		$data->push([
    			$item->item_code_w_variant,
    			$item->item_name,
    			0,
                "",
                Carbon::now()->format('Y-m-d'),
    		]);
    	}
        return $data;
    }
}
