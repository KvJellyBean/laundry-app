<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'edit user', 'guard_name' => 'web'],
            ['name' => 'edit service packages', 'guard_name' => 'web'],
            ['name' => 'edit orders', 'guard_name' => 'web'],
            ['name' => 'edit transactions', 'guard_name' => 'web'],
            ['name' => 'edit financial reports', 'guard_name' => 'web'],
            ['name' => 'create user', 'guard_name' => 'web'],
            ['name' => 'create service packages', 'guard_name' => 'web'],
            ['name' => 'create orders', 'guard_name' => 'web'],
            ['name' => 'create transactions', 'guard_name' => 'web'],
            ['name' => 'create financial reports', 'guard_name' => 'web'],
            ['name' => 'view financial reports', 'guard_name' => 'web'],
            ['name' => 'view user', 'guard_name' => 'web'],
            ['name' => 'view service packages', 'guard_name' => 'web'],
            ['name' => 'view orders', 'guard_name' => 'web'],
            ['name' => 'view transactions', 'guard_name' => 'web'],
            ['name' => 'users', 'guard_name' => 'web'],
            ['name' => 'roles-permissions', 'guard_name' => 'web'],
            ['name' => 'service packages', 'guard_name' => 'web'],
            ['name' => 'orders', 'guard_name' => 'web'],
            ['name' => 'transactions', 'guard_name' => 'web'],
            ['name' => 'financial reports', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
