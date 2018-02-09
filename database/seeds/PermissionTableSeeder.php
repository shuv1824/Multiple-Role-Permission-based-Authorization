<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	[
        		'name' => 'user-list',
        		'display_name' => 'Display User Listing',
        		'description' => 'See only Listing Of User'
        	],
        	[
        		'name' => 'user-create',
        		'display_name' => 'Create User',
        		'description' => 'Create New User'
        	],
        	[
        		'name' => 'user-edit',
        		'display_name' => 'Edit User',
        		'description' => 'Edit User'
        	],
        	[
        		'name' => 'user-delete',
        		'display_name' => 'Delete User',
        		'description' => 'Delete User'
        	],
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'post-list',
        		'display_name' => 'Display Post Listing',
        		'description' => 'See only Listing Of Post'
        	],
        	[
        		'name' => 'post-create',
        		'display_name' => 'Create Post',
        		'description' => 'Create New Post'
        	],
        	[
        		'name' => 'post-edit',
        		'display_name' => 'Edit Post',
        		'description' => 'Edit Post'
        	],
        	[
        		'name' => 'post-delete',
        		'display_name' => 'Delete Post',
        		'description' => 'Delete Post'
        	]
        ];


        foreach ($permissions as $key => $permission) {
        	Permission::create($permission);
        }
    }
}
