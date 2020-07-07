<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ItemBaseUnit extends Model
{
    protected $fillable=['base_unit_name'];
    use SoftDeletes;
	protected $dates = ['deleted_at'];
}
