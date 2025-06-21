<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('humaira_categories')->insert([
            [
                'nama_kategori' => 'Wisata Alam',
                'jenis_kategori' => 'destinasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Wisata Sejarah',
                'jenis_kategori' => 'destinasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kuliner Tradisional',
                'jenis_kategori' => 'umkm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kerajinan Tangan',
                'jenis_kategori' => 'umkm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

