<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * * Metode ini digunakan untuk menjalankan seeder yang telah didefinisikan.
     * Seeder berfungsi untuk mengisi database dengan data awal yang dibutuhkan
     */
    public function run(): void
    {
        // Memanggil seeder yang didefinisikan dalam array untuk dijalankan secara berurutan
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleHasPermissionSeeder::class,
            AdminSeeder::class,
            ServicePackageSeeder::class,
        ]);
    }
}
