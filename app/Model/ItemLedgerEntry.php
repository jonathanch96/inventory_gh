<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemLedgerEntry extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'item_code',
		'item_name',
		'item_id',
		'description',
		'document_no',
		'document_detail_id',
		'document_type_name',
		'document_id',
		'location_code',
		'quantity',
		'date',
		'balance',
	];
}
