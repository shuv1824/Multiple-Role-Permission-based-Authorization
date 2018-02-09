<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permission;
use App\Role;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $this->authorize('view', $role);
        $roles = Role::all();
        $data['roles'] = $roles;

        return view('role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $this->authorize('create', $role);
        $data['permissions'] = Permission::all();

        return view('role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $this->authorize('create', $role);
        $role = new Role;

        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'description' => 'string'
        ]);

        $permissions = $request->input('permissions');

        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        
        $role->save();

        $role->permissions()->attach($permissions);

        return redirect('/roles')->with('success', 'New role has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        $this->authorize('update', $role);
        $permissions = Permission::all();

        return view('role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $this->authorize('update', $role);

        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'description' => 'string'
        ]);

        $permissions = $request->input('permissions');

        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        
        $role->save();
        // Delete the previous associated permissions
        DB::table('permission_role')->where('role_id',$id)->delete();
        // Assign new permissions
        $role->permissions()->attach($permissions);

        return redirect('/roles')->with('success', 'Role information has been created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = User::find($id); 
        // The delete() method from RolePolicy       
        $this->authorize('delete', $role);
        $role->delete();
        // Delete the associated permissions
        DB::table('permission_role')->where('role_id',$id)->delete();
        return redirect('/roles')->with('success', 'Role Deleted');
    }
}
