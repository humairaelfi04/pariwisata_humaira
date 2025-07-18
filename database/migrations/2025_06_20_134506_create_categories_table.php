<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('humaira_categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->enum('jenis_kategori', ['destinasi', 'umkm', 'acara']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humaira_categories');
    }
};
