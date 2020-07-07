<?php

namespace App\Http\Controllers\Voyager;
//namespace TCG\Voyager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturPenjualanController  extends BreadCustomController
{
	public function __construct(){
		$this->variable_detail_name = 'retur_penjualan';
		$this->table_detail_name = 'App\Model\SalesReturnDetail';
		$this->ledger_value = 1;
		$this->relation_item_name = "sales_return_detail_belongsto_item_relationship";
		$this->header_slug = "retur-penjualan";
		/*end*/
	}
}
