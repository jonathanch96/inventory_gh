<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OpnameStockDetail extends Model
{
    protected $fillable = [
		"document_header_id",
		"document_no",
		"item_id",
		"item_code",
		"item_name",
		"quantity",
		"item_base_unit_id",
		"item_base_unit",
		"memo",
	];
	public function parent(){
		return $this->belongsTo('App\Model\OpnameStockHeader','document_header_id');
	}
}
