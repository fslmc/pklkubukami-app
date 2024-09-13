<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\HeroSetting;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the default images from the /assets/default.blog.php directory
        $backgroundImage = '/assets/default/blog.png';
        $logoImage = '/assets/default/blog.png';

        // Create a new HeroSetting instance with the default images
        $heroSetting = new HeroSetting();
        $heroSetting->background_image = $backgroundImage;
        $heroSetting->logo = $logoImage;
        $heroSetting->save();
    }
}
