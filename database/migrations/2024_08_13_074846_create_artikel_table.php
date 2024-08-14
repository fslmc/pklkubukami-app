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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id(); // Ini secara default adalah kolom id (INT)(PK) (Auto Increment)
            $table->string('writer', 255); // Kolom writer (VARCHAR(255)) (NOT NULL)
            $table->string('title', 255); // Kolom title (VARCHAR(255)) (NOT NULL)
            $table->text('content'); // Kolom content (TEXT) (NOT NULL)
            $table->string('slug', 255); // Kolom slug (VARCHAR(255)) (NOT NULL)
            $table->timestamps(0); // Kolom created_at (TIMESTAMP) DEFAULT CURRENT_TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
