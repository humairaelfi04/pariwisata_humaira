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
        Schema::create('humaira_umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->text('deskripsi_layanan');
            $table->string('narahubung');
            $table->string('nomor_telepon');
            $table->string('alamat_umkm');
            $table->enum('status_persetujuan', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('category_id')->constrained('humaira_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humaira_umkms');
    }
};
