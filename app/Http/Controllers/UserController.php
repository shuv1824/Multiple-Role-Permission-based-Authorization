<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $model)
    {
        $this->authorize('view', $model);
        $users = User::all();
        $data['users'] = $users;

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $model)
    {
        $this->authorize('create', $model);
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $model)
    {
        $this->authorize('create', $model);
        $user = new User;

        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
            //'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $roles = $request->input('roles');

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        
        $user->save();

        $user->roles()->attach($roles);

        return redirect('/users')->with('success', 'New user has been created!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
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
        $user = User::find($id);
        $this->authorize('update', $user);

        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);

        $roles = $request->input('roles');

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        $user->save();

        DB::table('role_user')->where('user_id',$id)->delete();

        $user->roles()->attach($roles);

        return redirect('/users')->with('success', 'User data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);        
        $this->authorize('delete', $user);
        $user->delete();
        // Delete the associated roles
        DB::table('role_user')->where('user_id',$id)->delete();
        return redirect('/users')->with('success', 'User Deleted');
    }
}
