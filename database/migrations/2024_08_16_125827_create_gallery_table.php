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
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255)->nullable();  // Menjadikan kolom 'judul' bisa null
            $table->string('upload_by', 255)->nullable();  // Menjadikan kolom 'upload_by' bisa null
            $table->longText('deskripsi')->nullable();  // Menjadikan kolom 'deskripsi' bisa null
            $table->string('foto');  // Kolom 'foto' tidak boleh null
            $table->string('slug', 255)->nullable();  // Menjadikan kolom 'slug' bisa null
            $table->timestamps(0);  // Kolom 'created_at' dan 'updated_at' otomatis non-null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery');
    }
};
