<?php
use Illuminate\Support\Facades\Route;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController')->names('role');


/*
Route::get('/test', function () {
    
 /*   return Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => 'Administrador',
        'full-access' => 'yes'
    ]);  

    return Role::create([
        'name' => 'Guest',
        'slug' => 'guest',
        'description' => 'guest',
        'full-access' => 'no'
    ]);
 
    return Role::create([
        'name' => 'Test',
        'slug' => 'test',
        'description' => 'test',
        'full-access' => 'no'
    ]);
    

    $user = User::find(1);
    $user->roles()->attach([1,3]);

    return $user->roles; */

  /*  return Permission::create([
        'name' => 'List Product',
        'slug' => 'product.index',
        'description' => 'El  usuario puede listar permisos '
    ]); */

/*
    $role = Role::find(2);
    $role->permissions()->sync([1,2]);

    return $role->permissions; 
});

*/

Route::get('/pruebas', function () {
    
    $user = User::find(2);

    $user->roles()->sync([2]);
    return $user->roles;
    //return User::get();
});

Route::get('/test', function () {
    
    $user = User::find(2);

    Gate::authorize('haveaccess', 'role.index');
    //$user->roles()->sync([2]);
    //return $user->roles;
    //return $user->havePermission('role.show');

    return $user;
});