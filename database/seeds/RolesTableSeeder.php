<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
        	'name' => 'admin',
        	'display_name' => 'Administrator',
        	'description'	=> 'Have all permissions '
        ];
    }
}
