<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'key' => 'gdrive_folder_id',
            'value' => '1CInaLV73Ye-QFmKvL_02iaLwq1s6FG1t',
        ]);
    }
}
