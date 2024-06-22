<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Cuci Gosok Express',
                'description' => 'Cuci Gosok Express adalah layanan mencuci dan menyetrika pakaian dengan penyelesaian dalam waktu 24 jam, paket ini cocok untuk kebutuhan pakaian yang harus segera digunakan.',
                'price' => 7000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuci Kering Express',
                'description' => 'Cuci Kering Express adalah layanan dry cleaning dalam waktu 24 jam untuk pakaian yang membutuhkan perawatan khusus, di mana pakaian dibersihkan menggunakan proses dry cleaning yang aman untuk menjaga kualitas dan ketahanan pakaian.',
                'price' => 4000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuci Lipat Express',
                'description' => 'Cuci Lipat Express merupakan layanan mencuci dan melipat pakaian dengan waktu ekspres dalam 24 jam.',
                'price' => 4500,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuci Gosok',
                'description' => 'Cuci Gosok merupakan layanan mencuci dan menyetrika pakaian dalam satu paket terpadu, di mana pakaian dibersihkan dengan dicuci terlebih dahulu, lalu disetrika dengan rapi sebelum dikembalikan.',
                'price' => 5000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuci Lipat',
                'description' => 'Cuci Lipat adalah layanan mencuci pakaian dan melipat pakaian dengan rapi, di mana pakaian dicuci dengan bersih, lalu dilipat dengan rapi sebelum dikembalikan.',
                'price' => 3500,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuci Kering',
                'description' => 'Cuci Kering menawarkan layanan dry cleaning untuk pakaian yang membutuhkan perawatan khusus, di mana pakaian dibersihkan dengan proses dry cleaning yang aman untuk menjaga kualitas dan ketahanan pakaian.',
                'price' => 5000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gosok Express',
                'description' => 'Gosok Express merupakan layanan menyetrika pakaian dengan waktu ekspres dalam 24 jam.',
                'price' => 5000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gosok',
                'description' => 'Gosok hanya menawarkan layanan menyetrika pakaian saja tanpa mencuci, sesuai untuk pakaian yang sudah bersih dan hanya membutuhkan penyetrikaan.',
                'price' => 3500,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kilat',
                'description' => 'Kilat merupakan layanan laundry tercepat dengan penyelesaian dalam waktu 6 jam, paket ini cocok untuk kebutuhan pakaian yang harus segera tersedia.',
                'price' => 10000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('service_packages')->insert($data);
    }
}
