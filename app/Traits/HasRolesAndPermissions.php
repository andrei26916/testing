<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @param ...$roles
     * @return bool
     */
    public function hasRole(... $roles ): bool
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $permissions
     * @return bool
     */
    public function hashPermission(...$permissions): bool
    {
        foreach ($this->roles as $role){
            foreach ($permissions as $permission) {
                if ($role->permissions->contains('slug', $permission)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param ...$roles
     * @return mixed
     */
    private function getAllRoles(array $roles)
    {
        return Role::whereIn('slug', $roles)->get();
    }

    /**
     * @param ...$roles
     * @return $this
     */
    public function giveRole(...$roles)
    {
        $roles = $this->getAllRoles($roles);

        if($roles !== null) {
            $this->roles()->sync($roles);
        }

        return $this;
    }



}
