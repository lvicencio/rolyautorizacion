<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class InfoPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //truncates
        DB::statement("SET foreign_key_checks=0"); //desactiva foreign key
            //tables
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            //modelos
            Permission::truncate();
            Role::truncate();
        
        DB::statement("SET foreign_key_checks=1"); //activa foreign key
        //fin truncate

        // usuario admin
        $useradmin = User::where('email','admin@gmail.com')->first();
        if($useradmin){
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123')
        ]);

        //Rol admin

       $roladmin= Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador',
            'full-access' => 'yes'
        ]);  

        //asignar rol admin a usuario admin (tabla role_user)

        $useradmin->roles()->sync([$roladmin->id]);

            $permission_all = [];

            //permisos de los roles
        
            $permission = Permission::create([
                        'name' => 'List Role',
                        'slug' => 'role.index',
                        'description' => 'El  usuario puede listar Roles'
            ]);

            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Show Role',
                'slug' => 'role.show',
                'description' => 'El  usuario puede ver un Rol'
            ]);

            $permission_all[] = $permission->id;




            $permission = Permission::create([
                'name' => 'Create Role',
                'slug' => 'role.create',
                'description' => 'El  usuario puede crear un Rol'
            ]);

            $permission_all[] = $permission->id;



            
            $permission = Permission::create([
                'name' => 'Edit Role',
                'slug' => 'role.edit',
                'description' => 'El  usuario puede editar un Rol'
            ]);

            $permission_all[] = $permission->id;

            
            $permission = Permission::create([
                'name' => 'Destroy Role',
                'slug' => 'role.destroy',
                'description' => 'El  usuario puede Eliminar un Rol'
            ]);

            $permission_all[] = $permission->id;


            // permission_role
       // $roladmin->permissions()->sync($permission_all);



        // usuarios







      //  $permission_all = [];

        //permisos de los roles
    
        $permission = Permission::create([
                    'name' => 'List user',
                    'slug' => 'user.index',
                    'description' => 'El  usuario puede listar los usuarios'
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show User',
            'slug' => 'user.show',
            'description' => 'El  usuario puede ver un Usuario'
        ]);

        $permission_all[] = $permission->id;


       /* $permission = Permission::create([
            'name' => 'Create User',
            'slug' => 'user.create',
            'description' => 'El  usuario puede crear un nuevo Usuario'
        ]);

        $permission_all[] = $permission->id;  */

        $permission = Permission::create([
            'name' => 'Edit User',
            'slug' => 'user.edit',
            'description' => 'El  usuario puede editar un Usuario'
        ]);

        $permission_all[] = $permission->id;

        
        $permission = Permission::create([
            'name' => 'Destroy User',
            'slug' => 'user.destroy',
            'description' => 'El  usuario puede Eliminar un Usuario'
        ]);

        $permission_all[] = $permission->id;


    // permission_role
    //$roladmin->permissions()->sync($permission_all);


    }
}
