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
        Schema::create('projek', function (Blueprint $table) {
            $table->id(); // Ini secara default adalah kolom id (INT)(PK) (Auto Increment)
            $table->string('judul', 255); // Kolom judul (VARCHAR(255)) (NOT NULL)
            $table->longText('konten'); // Kolom konten (TEXT) (NOT NULL)
            $table->string('thumbnail')->nullable(); // Kolom thumbnail (VARCHAR(255)) (NULLABLE)
            $table->string('slug', 255); // Kolom slug (VARCHAR(255)) (NOT NULL)
            $table->timestamps(0); // Kolom created_at (TIMESTAMP) DEFAULT CURRENT_TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projek');
    }
};