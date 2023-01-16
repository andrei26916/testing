<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Все права',
            'slug' => 'all',
        ]);

        Permission::create([
            'name' => 'Создание отзыва',
            'slug' => 'create-feedback',
        ]);
    }
}
