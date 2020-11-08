<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('id','Desc')->paginate(3);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
               
        $roles = Role::orderBy('name')->get();
        
        return view('user.show', compact('roles','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
               
        $roles = Role::orderBy('name')->get();
        
        return view('user.edit', compact('roles','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:30|unique:users,name,'.$user->id,
            'email' => 'required|max:30|unique:users,email,'.$user->id

        ]);

     
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));
        
   
        return redirect()->route('user.index')->with('status_success','Usuario editado con éxito');
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('status_success','Usuario Eliminado con éxito');
    
    }
}
