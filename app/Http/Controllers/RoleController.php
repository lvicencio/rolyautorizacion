<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission\Models\Permission;
use App\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    

    public function index()
    {
        Gate::authorize('haveaccess', 'role.index');

        $roles = Role::orderBy('id','Desc')->paginate(3);

        return view('role.index', compact('roles'));
    }

    public function create()
    {
        Gate::authorize('haveaccess', 'role.create');

        $permissions = Permission::get();
        return view('role.create', compact('permissions'));

    }


    public function store(Request $request)
    {

        Gate::authorize('haveaccess', 'role.create');


        $request->validate([
            'name' => 'required|max:30|unique:roles,name',
            'slug' => 'required|max:30|unique:roles,slug',
            'full-access' => 'required|in:yes,no',

        ]);
        
        $role = Role::create($request->all());

      //  if ($request->get('permission')) {
            # code...
            $role->permissions()->sync($request->get('permission'));
      //  }

        return redirect()->route('role.index')->with('status_success','Role guardado con éxito');

    }


    public function edit(Role $role)
    {
        # code...
        $this->authorize('haveaccess', 'role.edit');

        $permission_role = [];

        foreach ($role->permissions as $permission ) {
            # code...
            $permission_role[]=$permission->id;
        }

        $permissions = Permission::get();
        return view('role.edit', compact('permissions','role', 'permission_role'));

    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('haveaccess', 'role.edit');

        $request->validate([
            'name' => 'required|max:30|unique:roles,name,'.$role->id,
            'slug' => 'required|max:30|unique:roles,slug,'.$role->id,
            'full-access' => 'required|in:yes,no',

        ]);
        
        $role->update($request->all());

     //   if ($request->get('permission')) {
            # code...
            $role->permissions()->sync($request->get('permission'));
     //   }

        return redirect()->route('role.index')->with('status_success','Rol editado con éxito');
    }


    public function show(Role $role)
    {
        $this->authorize('haveaccess', 'role.show');
        # code...
        $permission_role = [];

        foreach ($role->permissions as $permission ) {
            # code...
            $permission_role[]=$permission->id;
        }

        $permissions = Permission::get();
        return view('role.show', compact('permissions','role', 'permission_role'));
    }


    public function destroy(Role $role)
    {
        $this->authorize('haveaccess', 'role.destroy');
        
        $role->delete();

        return redirect()->route('role.index')->with('status_success','Rol Eliminado con éxito');
    }
}
