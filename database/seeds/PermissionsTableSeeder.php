<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-06-17 07:27:42',
            ),
            25 => 
            array (
                'id' => 41,
                'key' => 'browse_items',
                'table_name' => 'items',
                'created_at' => '2020-06-17 07:28:07',
                'updated_at' => '2020-06-17 07:28:07',
            ),
            26 => 
            array (
                'id' => 42,
                'key' => 'read_items',
                'table_name' => 'items',
                'created_at' => '2020-06-17 07:28:07',
                'updated_at' => '2020-06-17 07:28:07',
            ),
            27 => 
            array (
                'id' => 43,
                'key' => 'edit_items',
                'table_name' => 'items',
                'created_at' => '2020-06-17 07:28:07',
                'updated_at' => '2020-06-17 07:28:07',
            ),
            28 => 
            array (
                'id' => 44,
                'key' => 'add_items',
                'table_name' => 'items',
                'created_at' => '2020-06-17 07:28:07',
                'updated_at' => '2020-06-17 07:28:07',
            ),
            29 => 
            array (
                'id' => 45,
                'key' => 'delete_items',
                'table_name' => 'items',
                'created_at' => '2020-06-17 07:28:07',
                'updated_at' => '2020-06-17 07:28:07',
            ),
            30 => 
            array (
                'id' => 46,
                'key' => 'browse_item_base_units',
                'table_name' => 'item_base_units',
                'created_at' => '2020-06-17 07:28:15',
                'updated_at' => '2020-06-17 07:28:15',
            ),
            31 => 
            array (
                'id' => 47,
                'key' => 'read_item_base_units',
                'table_name' => 'item_base_units',
                'created_at' => '2020-06-17 07:28:15',
                'updated_at' => '2020-06-17 07:28:15',
            ),
            32 => 
            array (
                'id' => 48,
                'key' => 'edit_item_base_units',
                'table_name' => 'item_base_units',
                'created_at' => '2020-06-17 07:28:15',
                'updated_at' => '2020-06-17 07:28:15',
            ),
            33 => 
            array (
                'id' => 49,
                'key' => 'add_item_base_units',
                'table_name' => 'item_base_units',
                'created_at' => '2020-06-17 07:28:15',
                'updated_at' => '2020-06-17 07:28:15',
            ),
            34 => 
            array (
                'id' => 50,
                'key' => 'delete_item_base_units',
                'table_name' => 'item_base_units',
                'created_at' => '2020-06-17 07:28:15',
                'updated_at' => '2020-06-17 07:28:15',
            ),
            35 => 
            array (
                'id' => 71,
                'key' => 'browse_sales_headers',
                'table_name' => 'sales_headers',
                'created_at' => '2020-06-18 04:20:02',
                'updated_at' => '2020-06-18 04:20:02',
            ),
            36 => 
            array (
                'id' => 72,
                'key' => 'read_sales_headers',
                'table_name' => 'sales_headers',
                'created_at' => '2020-06-18 04:20:02',
                'updated_at' => '2020-06-18 04:20:02',
            ),
            37 => 
            array (
                'id' => 73,
                'key' => 'edit_sales_headers',
                'table_name' => 'sales_headers',
                'created_at' => '2020-06-18 04:20:02',
                'updated_at' => '2020-06-18 04:20:02',
            ),
            38 => 
            array (
                'id' => 74,
                'key' => 'add_sales_headers',
                'table_name' => 'sales_headers',
                'created_at' => '2020-06-18 04:20:02',
                'updated_at' => '2020-06-18 04:20:02',
            ),
            39 => 
            array (
                'id' => 75,
                'key' => 'delete_sales_headers',
                'table_name' => 'sales_headers',
                'created_at' => '2020-06-18 04:20:02',
                'updated_at' => '2020-06-18 04:20:02',
            ),
            40 => 
            array (
                'id' => 76,
                'key' => 'browse_sales_details',
                'table_name' => 'sales_details',
                'created_at' => '2020-06-19 10:40:02',
                'updated_at' => '2020-06-19 10:40:02',
            ),
            41 => 
            array (
                'id' => 77,
                'key' => 'read_sales_details',
                'table_name' => 'sales_details',
                'created_at' => '2020-06-19 10:40:02',
                'updated_at' => '2020-06-19 10:40:02',
            ),
            42 => 
            array (
                'id' => 78,
                'key' => 'edit_sales_details',
                'table_name' => 'sales_details',
                'created_at' => '2020-06-19 10:40:02',
                'updated_at' => '2020-06-19 10:40:02',
            ),
            43 => 
            array (
                'id' => 79,
                'key' => 'add_sales_details',
                'table_name' => 'sales_details',
                'created_at' => '2020-06-19 10:40:02',
                'updated_at' => '2020-06-19 10:40:02',
            ),
            44 => 
            array (
                'id' => 80,
                'key' => 'delete_sales_details',
                'table_name' => 'sales_details',
                'created_at' => '2020-06-19 10:40:02',
                'updated_at' => '2020-06-19 10:40:02',
            ),
            45 => 
            array (
                'id' => 81,
                'key' => 'browse_item_ledger_entries',
                'table_name' => 'item_ledger_entries',
                'created_at' => '2020-06-24 04:24:27',
                'updated_at' => '2020-06-24 04:24:27',
            ),
            46 => 
            array (
                'id' => 82,
                'key' => 'read_item_ledger_entries',
                'table_name' => 'item_ledger_entries',
                'created_at' => '2020-06-24 04:24:28',
                'updated_at' => '2020-06-24 04:24:28',
            ),
            47 => 
            array (
                'id' => 83,
                'key' => 'edit_item_ledger_entries',
                'table_name' => 'item_ledger_entries',
                'created_at' => '2020-06-24 04:24:28',
                'updated_at' => '2020-06-24 04:24:28',
            ),
            48 => 
            array (
                'id' => 84,
                'key' => 'add_item_ledger_entries',
                'table_name' => 'item_ledger_entries',
                'created_at' => '2020-06-24 04:24:28',
                'updated_at' => '2020-06-24 04:24:28',
            ),
            49 => 
            array (
                'id' => 85,
                'key' => 'delete_item_ledger_entries',
                'table_name' => 'item_ledger_entries',
                'created_at' => '2020-06-24 04:24:28',
                'updated_at' => '2020-06-24 04:24:28',
            ),
            50 => 
            array (
                'id' => 86,
                'key' => 'browse_purchase_details',
                'table_name' => 'purchase_details',
                'created_at' => '2020-06-25 07:26:49',
                'updated_at' => '2020-06-25 07:26:49',
            ),
            51 => 
            array (
                'id' => 87,
                'key' => 'read_purchase_details',
                'table_name' => 'purchase_details',
                'created_at' => '2020-06-25 07:26:49',
                'updated_at' => '2020-06-25 07:26:49',
            ),
            52 => 
            array (
                'id' => 88,
                'key' => 'edit_purchase_details',
                'table_name' => 'purchase_details',
                'created_at' => '2020-06-25 07:26:49',
                'updated_at' => '2020-06-25 07:26:49',
            ),
            53 => 
            array (
                'id' => 89,
                'key' => 'add_purchase_details',
                'table_name' => 'purchase_details',
                'created_at' => '2020-06-25 07:26:49',
                'updated_at' => '2020-06-25 07:26:49',
            ),
            54 => 
            array (
                'id' => 90,
                'key' => 'delete_purchase_details',
                'table_name' => 'purchase_details',
                'created_at' => '2020-06-25 07:26:49',
                'updated_at' => '2020-06-25 07:26:49',
            ),
            55 => 
            array (
                'id' => 91,
                'key' => 'browse_purchase_headers',
                'table_name' => 'purchase_headers',
                'created_at' => '2020-06-25 07:34:50',
                'updated_at' => '2020-06-25 07:34:50',
            ),
            56 => 
            array (
                'id' => 92,
                'key' => 'read_purchase_headers',
                'table_name' => 'purchase_headers',
                'created_at' => '2020-06-25 07:34:50',
                'updated_at' => '2020-06-25 07:34:50',
            ),
            57 => 
            array (
                'id' => 93,
                'key' => 'edit_purchase_headers',
                'table_name' => 'purchase_headers',
                'created_at' => '2020-06-25 07:34:50',
                'updated_at' => '2020-06-25 07:34:50',
            ),
            58 => 
            array (
                'id' => 94,
                'key' => 'add_purchase_headers',
                'table_name' => 'purchase_headers',
                'created_at' => '2020-06-25 07:34:50',
                'updated_at' => '2020-06-25 07:34:50',
            ),
            59 => 
            array (
                'id' => 95,
                'key' => 'delete_purchase_headers',
                'table_name' => 'purchase_headers',
                'created_at' => '2020-06-25 07:34:50',
                'updated_at' => '2020-06-25 07:34:50',
            ),
            60 => 
            array (
                'id' => 96,
                'key' => 'browse_sales_return_headers',
                'table_name' => 'sales_return_headers',
                'created_at' => '2020-06-26 04:13:45',
                'updated_at' => '2020-06-26 04:13:45',
            ),
            61 => 
            array (
                'id' => 97,
                'key' => 'read_sales_return_headers',
                'table_name' => 'sales_return_headers',
                'created_at' => '2020-06-26 04:13:45',
                'updated_at' => '2020-06-26 04:13:45',
            ),
            62 => 
            array (
                'id' => 98,
                'key' => 'edit_sales_return_headers',
                'table_name' => 'sales_return_headers',
                'created_at' => '2020-06-26 04:13:45',
                'updated_at' => '2020-06-26 04:13:45',
            ),
            63 => 
            array (
                'id' => 99,
                'key' => 'add_sales_return_headers',
                'table_name' => 'sales_return_headers',
                'created_at' => '2020-06-26 04:13:45',
                'updated_at' => '2020-06-26 04:13:45',
            ),
            64 => 
            array (
                'id' => 100,
                'key' => 'delete_sales_return_headers',
                'table_name' => 'sales_return_headers',
                'created_at' => '2020-06-26 04:13:45',
                'updated_at' => '2020-06-26 04:13:45',
            ),
            65 => 
            array (
                'id' => 101,
                'key' => 'browse_sales_return_details',
                'table_name' => 'sales_return_details',
                'created_at' => '2020-06-26 04:22:41',
                'updated_at' => '2020-06-26 04:22:41',
            ),
            66 => 
            array (
                'id' => 102,
                'key' => 'read_sales_return_details',
                'table_name' => 'sales_return_details',
                'created_at' => '2020-06-26 04:22:41',
                'updated_at' => '2020-06-26 04:22:41',
            ),
            67 => 
            array (
                'id' => 103,
                'key' => 'edit_sales_return_details',
                'table_name' => 'sales_return_details',
                'created_at' => '2020-06-26 04:22:41',
                'updated_at' => '2020-06-26 04:22:41',
            ),
            68 => 
            array (
                'id' => 104,
                'key' => 'add_sales_return_details',
                'table_name' => 'sales_return_details',
                'created_at' => '2020-06-26 04:22:41',
                'updated_at' => '2020-06-26 04:22:41',
            ),
            69 => 
            array (
                'id' => 105,
                'key' => 'delete_sales_return_details',
                'table_name' => 'sales_return_details',
                'created_at' => '2020-06-26 04:22:41',
                'updated_at' => '2020-06-26 04:22:41',
            ),
            70 => 
            array (
                'id' => 106,
                'key' => 'browse_upload_logs',
                'table_name' => 'upload_logs',
                'created_at' => '2020-06-30 05:23:55',
                'updated_at' => '2020-06-30 05:23:55',
            ),
            71 => 
            array (
                'id' => 107,
                'key' => 'read_upload_logs',
                'table_name' => 'upload_logs',
                'created_at' => '2020-06-30 05:23:55',
                'updated_at' => '2020-06-30 05:23:55',
            ),
            72 => 
            array (
                'id' => 108,
                'key' => 'edit_upload_logs',
                'table_name' => 'upload_logs',
                'created_at' => '2020-06-30 05:23:55',
                'updated_at' => '2020-06-30 05:23:55',
            ),
            73 => 
            array (
                'id' => 109,
                'key' => 'add_upload_logs',
                'table_name' => 'upload_logs',
                'created_at' => '2020-06-30 05:23:55',
                'updated_at' => '2020-06-30 05:23:55',
            ),
            74 => 
            array (
                'id' => 110,
                'key' => 'delete_upload_logs',
                'table_name' => 'upload_logs',
                'created_at' => '2020-06-30 05:23:55',
                'updated_at' => '2020-06-30 05:23:55',
            ),
        ));
        
        
    }
}