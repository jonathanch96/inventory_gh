<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'item_code',
		'item_code_w_variant',
		'item_name',
		'item_base_unit_1_id',
		'item_base_unit_2_id',
		'base_1_to_base_2',
		'item_quantity',
	];
}
