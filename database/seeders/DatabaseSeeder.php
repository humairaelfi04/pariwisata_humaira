<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 3 user dummy (dapat disesuaikan dengan role jika diperlukan)
        User::factory(3)->create();

        // Panggil seeder kategori
        $this->call(CategorySeeder::class);

        // Optional: generate dummy data wisata
        // $this->call(PariwisataSeeder::class);
    }
}
