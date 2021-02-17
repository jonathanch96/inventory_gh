<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Item;
use App\Model\ItemBaseUnit;
use App\Model\Job;
use App\Jobs\GetItemJob;

class APIHandlerController extends Controller
{
	private $url_1 = 'http://gcp.southeastasia.cloudapp.azure.com/public/api/get_item_data';
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
		$data_chunk = array_chunk($temp_response->data, 100);
		foreach ($data_chunk as $key => $data) {
			dispatch(new GetItemJob($data));
		}


		$counter_add=0;
		$counter_update=0;

		$job_data = Job::get();
		while($job_data->count()!=0){
			sleep(1);
			$job_data = Job::get();

		}

		

		// $this->response['message'] = 
		// "Successfully ".($counter_add>0?"Created ".$counter_add." Item":"").($counter_add>0&&$counter_update>0?" and ":""). ($counter_update>0?"Updated ".$counter_update." Item":"");
		$this->response['message']='Berhasil menyamakan data dengan server';
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
