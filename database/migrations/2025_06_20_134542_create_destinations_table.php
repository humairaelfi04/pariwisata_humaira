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
        Schema::create('humaira_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('alamat');
            $table->decimal('harga_tiket', 12, 2)->nullable();
            $table->string('jam_operasional')->nullable();
            $table->string('url_gambar_utama')->nullable();
            $table->foreignId('category_id')->constrained('humaira_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humaira_destinations');
    }
};
