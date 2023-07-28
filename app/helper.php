<?php




function permission($permissions)
{


    $user = auth()->user();

    $user_permissions = $user->role->permissions;

    $role = $user->role->role;

    foreach ($user_permissions as $user_permission) {
        if ($user_permission->permission == $permissions) {

            return true;
        }
    }

    return false;
}
