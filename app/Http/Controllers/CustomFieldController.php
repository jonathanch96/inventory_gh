<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Voyager;
class CustomFieldController extends Controller
{
	public function getRowTemplate($slug_name){
		//$slug_name = $request->slug_name;
		$slug_name = "pengeluaran-stok-details";

		$dataType = Voyager::model('DataType')->where('slug', '=', $slug_name)->first();
		$dataTypeContent = (strlen($dataType->model_name) != 0)
		? new $dataType->model_name()
		: false;

		foreach ($dataType->addRows as $key => $row) {
			$dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
		}
		$edit = !is_null($dataTypeContent->getKey());
		$add  = is_null($dataTypeContent->getKey());
		$dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
		$counter=3;
		return view('custom_field_component.transaction_detail_row',compact("dataType","dataTypeContent","edit","add","dataTypeRows","counter"));
	}
}
