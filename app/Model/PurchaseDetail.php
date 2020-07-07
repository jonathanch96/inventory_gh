<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseDetail extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
		"document_header_id",
		"document_no",
		"item_id",
		"item_code",
		"item_name",
		"quantity",
		"item_base_unit_id",
		"item_base_unit",
	];
	public function parent(){
		return $this->belongsTo('App\Model\PurchaseHeader','document_header_id');
	}
}
