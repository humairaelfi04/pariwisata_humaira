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
        Schema::create('humaira_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('humaira_destination_id')->constrained('humaira_destinations')->onDelete('cascade');
            $table->string('nama_pengunjung');
            $table->string('email_pengunjung')->nullable();
            $table->tinyInteger('rating')->unsigned();
            $table->text('komentar');
            $table->enum('status_moderasi', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humaira_reviews');
    }
};
