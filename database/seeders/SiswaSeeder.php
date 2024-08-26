<?php

// SiswaSeeder.php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all sekolah instances
        $sekolahs = Sekolah::all();

        // Create 10 siswa instances
        for ($i = 0; $i < 10; $i++) {
            $siswa = new Siswa();
            $siswa->nama = "Siswa " . ($i + 1);
            $siswa->jenis_kelamin = rand(0, 1) ? 'Laki-laki' : 'Perempuan';
            $siswa->sekolah_id = $sekolahs->random()->id;
            $siswa->jurusan = 'IPA';
            $siswa->tanggal = now()->format('Y-m-d');
            $siswa->save();
        }
    }
}