<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermission = Permission::query()
            ->where('slug', 'all')
            ->first();

        $userPermission = Permission::query()
            ->where('slug', 'create-feedback')
            ->first();

        $userRole = new Role();
        $userRole->name = 'Пользовотель';
        $userRole->slug = 'user';
        $userRole->save();

        $userRole->permissions()->attach($userPermission);

        $adminRole = new Role();
        $adminRole->name = 'Администратор';
        $adminRole->slug = 'admin';
        $adminRole->save();

        $adminRole->permissions()->attach($adminPermission);
    }
}
