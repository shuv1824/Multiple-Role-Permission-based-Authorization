<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        	'name' => 'Administrator',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('password')
        ];
    }
}
