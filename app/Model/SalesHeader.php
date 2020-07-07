<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SalesHeader extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = ['creator_id'];
	
	public function details(){
		return $this->hasMany('App\Model\SalesDetail','document_header_id');
	}
}
