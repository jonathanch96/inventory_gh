<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangMasukController extends BreadCustomController
{
	public function __construct(){
		$this->variable_detail_name = 'barang_masuk';
		$this->table_detail_name = 'App\Model\PurchaseDetail';
		$this->ledger_value = 1;
		$this->relation_item_name = "purchase_detail_belongsto_item_relationship";
		$this->header_slug = "barang-masuk";
		/*end*/
	}
}
