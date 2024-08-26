<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sekolah')->insert([
            [
                'nama_sekolah' => 'Sekolah Menengah Atas Negeri 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_sekolah' => 'Sekolah Menengah Atas Negeri 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_sekolah' => 'Sekolah Menengah Atas Swasta 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}