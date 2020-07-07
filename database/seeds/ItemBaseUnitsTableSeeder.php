<?php

use Illuminate\Database\Seeder;

class ItemBaseUnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('item_base_units')->delete();
        
        \DB::table('item_base_units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'base_unit_name' => 'DUS',
                'created_at' => '2020-06-22 08:17:10',
                'updated_at' => '2020-06-22 08:17:10',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'base_unit_name' => 'M2',
                'created_at' => '2020-06-22 08:17:10',
                'updated_at' => '2020-06-22 08:17:10',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'base_unit_name' => 'PCS',
                'created_at' => '2020-06-22 08:17:11',
                'updated_at' => '2020-06-22 08:17:11',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'base_unit_name' => 'SET',
                'created_at' => '2020-06-22 08:17:20',
                'updated_at' => '2020-06-22 08:17:20',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'base_unit_name' => 'UNIT',
                'created_at' => '2020-06-22 08:17:20',
                'updated_at' => '2020-06-22 08:17:20',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}