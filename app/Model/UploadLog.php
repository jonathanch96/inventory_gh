<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UploadLog extends Model
{
	protected $fillable = [
		"excel_name",
		"creator_id",
		"document_no",
		"slug_name",
	];
}
