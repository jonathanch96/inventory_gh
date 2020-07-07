<?php

namespace App\Imports;

use App\Model\ItemLedgerEntry;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ItemLedgerEntryImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ItemLedgerEntry([
            'item_code'=>$row['item_code'],
            'item_name'=>$row['item_name'],
            'item_id'=>$row['item_id'],
            'document_no'=>null,
            'document_type_id'=>null,
            'document_type_name'=>null,
            'document_id'=>null,
            'quantity'=>$row['quantity'],
            'date'=>Carbon\Carbon::now(),
            'description'=>$row['description'],
        ]);
    }

    public function rules(): array
    {
        return [
            'item_code' => 'required|exists:items,item_code_w_variant',
            'quantity' => 'required',
        ];
    }
}
