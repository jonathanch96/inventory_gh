<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Model\Item;
use App\Model\ItemBaseUnit;

class GetItemJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $key => $tr) {

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
            // if($previous_data){
            //     $previous_data->update($server_data);
            //     $counter_update++;
            // }else{
            //     $previous_data = Item::create($server_data);
            //     $counter_add++;
            // }
        }
    }
}
