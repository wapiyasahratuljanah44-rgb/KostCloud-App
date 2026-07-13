<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menghapus data lama dengan cara yang aman untuk PostgreSQL
        DB::table('tenants')->delete();

        // Masukkan data penyewa baru langsung ke tabel
        DB::table('tenants')->insert([
            [
                'name' => 'Rahma Yanti',
                'phone' => '081234567890',
                'email' => 'rama@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'phone' => '089876543210',
                'email' => 'budi@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ahmad Fauzi',
                'phone' => '087711223344',
                'email' => 'ahmad@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}