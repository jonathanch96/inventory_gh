<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpnameStockController extends BreadCustomController
{
    public function __construct(){
		$this->variable_detail_name = 'opname_stock';
		$this->table_detail_name = 'App\Model\OpnameStockDetail';
		$this->ledger_value = 1;
		$this->relation_item_name = "opname_stock_detail_belongsto_item_relationship_1";
		$this->header_slug = "opname-stock";
		/*end*/
	}
}
