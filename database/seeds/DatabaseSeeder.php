<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(VoyagerDatabaseSeeder::class);
        //$this->call(VoyagerDummyDatabaseSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ItemBaseUnitsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
    }
}
