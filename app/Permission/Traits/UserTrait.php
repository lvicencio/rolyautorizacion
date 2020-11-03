<?php

namespace App\Permission\Traits;

/**
 * 
 */
trait UserTrait
{

    public function roles()
    {
        return $this->belongsToMany('App\Permission\Models\Role')->withTimesTamps();
    }

    public function havePermission($permission)
    {

        foreach ($this->roles as $role ) {
            # code...
            if ($role['full-access'] =='yes') {
                return 1;
            }

            foreach ($role->permissions as $perm) {
                # code...
                if ($perm->slug == $permission) {
                    return 1;
                }
            }
        }

        return 0;
        //return $this->roles;
    }



}


