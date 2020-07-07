<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Item;
use App\Model\ItemBaseUnit;
class APIHandlerController extends Controller
{
	private $url_1 = 'http://gcp2.southeastasia.cloudapp.azure.com/api/get_item_data';
	private $url_2 = 'https://payroll.dsgp.co.id/api/login_attempt';
	private $response = array(
		'message'=>'Data Not Found',
		'alert_class'=>'info',
		'success'=>'false',
	);
	private function apiPost($data,$url){
		try {
			$client = new \GuzzleHttp\Client();
			$response = $client->request('POST', $url, [
				'form_params' => $data,
				'allow_redirects' => false,
			]);
		}catch (\GuzzleHttp\Exception\GuzzleException $e) {
			$this->response['message']=$e->getMessage();
			$this->response['success']='false';
			return json_encode($this->response);
		}
		//echo $response->getStatusCode(); # 200
		//echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
		return $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

	}
	public function apiGet($url)
	{
		$client = new \GuzzleHttp\Client();
		$request = $client->get($url);
		return $request->getBody();
	}
	public function getItems(){
		$temp_item=Item::orderBy('created_at','DESC')->first();
		$last_updated_date = $temp_item?date("Y-m-d",strtotime($temp_item->created_at)):"2000-01-01";
		$temp_response = json_decode($this->apiPost([
			"last_updated_date"=>$last_updated_date,
			"total_item"=>Item::count(),
		],$this->url_1));
		if($temp_response->success=="false"||count($temp_response->data)<1){
			$this->response['message'] = "Tidak ada Item Baru pada server";
			return json_encode($this->response);
		}
		$counter_add=0;
		$counter_update=0;
		
		foreach ($temp_response->data as $key => $tr) {

			$base_unit = ItemBaseUnit::where('base_unit_name',$tr->item_base_unit_1_id)->first();
			if(!$base_unit){
				$base_unit = ItemBaseUnit::create([
					'base_unit_name'=>$tr->item_base_unit_1_id
				]);

			}
			$base_unit_2 = ItemBaseUnit::where('base_unit_name','M2')->first();
			if(!$base_unit_2){
				$base_unit_2 = ItemBaseUnit::create([
					'base_unit_name'=>'M2'
				]);

			}

			//:[{"item_code":"BPL60A01","variant_code":"NC53","item_name":"POLISHED BPL-60A01 60 X 60\/NC53","item_base_unit_1_id":"DUS","base_1_to_base_2":"1.44000000000000000000"},
			//$tr->item_code
			$server_data = [
				'item_code'=>$tr->item_code,
				'item_code_w_variant'=>$tr->item_code.'/'.$tr->variant_code,
				'item_name'=>$tr->item_name,
				'item_base_unit_1_id'=>$base_unit->id,
				'item_base_unit_2_id'=>$tr->base_1_to_base_2!=1?$base_unit_2->id:$base_unit->id,
				'base_1_to_base_2'=>$tr->base_1_to_base_2,
			];
			$previous_data = Item::where('item_code_w_variant','=',$tr->item_code.'/'.$tr->variant_code)->first();
			if($previous_data){
				$previous_data->update($server_data);
				$counter_update++;
			}else{
				$previous_data = Item::create($server_data);
				$counter_add++;
			}
		}

		$this->response['message'] = 
		"Successfully ".($counter_add>0?"Created ".$counter_add." Item":"").($counter_add>0&&$counter_update>0?" and ":""). ($counter_update>0?"Updated ".$counter_update." Item":"");
		$this->response['alert_class'] = "success";
		$this->response['success'] = "true";
		$this->response['data'] = $temp_response;

		return json_encode($this->response);
	}
	public function doLogin(Request $request){
		$temp_response = json_decode($this->apiPost([
			'email' => $request->email,
			'password' => $request->password,
		],$this->url_2));
		if($temp_response->success=="false"){
			return json_encode($this->response);
		}
		return json_encode($temp_response);
	}
}
