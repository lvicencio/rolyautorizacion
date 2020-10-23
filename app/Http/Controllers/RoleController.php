<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission\Models\Permission;
use App\Permission\Models\Role;

class RoleController extends Controller
{
    

    public function index()
    {
        $roles = Role::orderBy('id','Desc')->paginate(2);

        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('role.create', compact('permissions'));

    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:30|unique:roles,name',
            'slug' => 'required|max:30|unique:roles,slug',
            'full-access' => 'required|in:yes,no',

        ]);
        
        $role = Role::create($request->all());

        if ($request->get('permission')) {
            # code...
            $role->permissions()->sync($request->get('permission'));
        }

        return redirect()->route('role.index')->with('status_success','Role guardado con éxito');

    }

}
