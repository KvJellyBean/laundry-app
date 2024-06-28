<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Metode ini digunakan untuk mengisi tabel service_packages dengan data awal.
     */
    public function run()
    {
        // Data paket layanan yang akan dimasukkan ke dalam database
        $data = [
            [
                'name' => 'Express Wash & Iron',
                'description' => 'Express Wash & Iron is a service for washing and ironing clothes with a turnaround time of 24 hours, suitable for garments that need to be quickly ready for use.',
                'price' => 7000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Express Dry Cleaning',
                'description' => 'Express Dry Cleaning is a dry cleaning service within 24 hours for clothes that require special care, ensuring quality and durability using safe dry cleaning processes.',
                'price' => 4000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Express Wash & Fold',
                'description' => 'Express Wash & Fold is a service for washing and folding clothes within 24 hours.',
                'price' => 4500,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wash & Iron',
                'description' => 'Wash & Iron includes washing and ironing clothes in a single package, where clothes are cleaned and neatly ironed before being returned.',
                'price' => 5000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wash & Fold',
                'description' => 'Wash & Fold is a service for washing and neatly folding clothes, ensuring they are cleaned thoroughly and folded neatly before return.',
                'price' => 3500,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dry Cleaning',
                'description' => 'Dry Cleaning offers a dry cleaning service for clothes that require special care, ensuring quality and durability.',
                'price' => 5000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ironing Express',
                'description' => 'Ironing Express is a service for ironing clothes with a turnaround time of 24 hours.',
                'price' => 5000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ironing Only',
                'description' => 'Ironing Only offers ironing service without washing, suitable for clothes that are already clean and only need ironing.',
                'price' => 3500,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Express Service',
                'description' => 'Express Service is the fastest laundry service with a turnaround time of 6 hours, suitable for garments that need to be quickly available.',
                'price' => 10000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Memasukkan data paket layanan ke dalam tabel service_packages
        DB::table('service_packages')->insert($data);
    }
}
