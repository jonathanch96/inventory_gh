<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Jonathan',
                'email' => 'jonathanchang96@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ZeIeleCGHXGDnCaHs.sPsucsvzZd4KbpCrZ0hRmt7p3TZIqveyYn6',
                'remember_token' => 'saOAPRcvRSyBb3MsNn7o7rfzwqVqCa7TzXa95FxfOg6AhIySW5C7qeEII3rv',
                'settings' => '{"locale":"en"}',
                'created_at' => '2020-06-17 07:27:42',
                'updated_at' => '2020-07-01 06:33:30',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'name' => 'Intan Apriani',
                'email' => 'intan.apriani07@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ywwfL3TI9fUn1Yqq4o/zrezJ0y.1gMzeDINBGx6SGfSbF1OfjHu5.',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2020-06-26 07:34:35',
                'updated_at' => '2020-06-26 07:34:35',
            ),
        ));
        
        
    }
}