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
        
        return $request->all();

    }

}
