<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Permission;

class Role extends Model
{
    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }

    /**
     * The usermissions that belong to the role.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_role');
    }
}
