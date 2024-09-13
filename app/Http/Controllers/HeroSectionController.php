<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    /**
     * Ke halaman edit
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $heroSetting = HeroSetting::first(); // Get the current hero setting
        return view('admin.hero.edit', compact('heroSetting')); // Pass the hero setting to the view
    }

    /**
     * update database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $heroSetting = HeroSetting::first(); // Get the current hero setting
    
        // Check if both background_image and logo are null
        if (!$request->hasFile('background_image') && !$request->hasFile('logo')) {
            return redirect()->route('hero.edit')->with('error', 'Please upload at least one image');
        }

        // Menghapus image lama
        if ($request->hasFile('background_image') && $heroSetting->background_image != '/assets/default/blog.png') {
            $filePath = ltrim($heroSetting->background_image, '/');
            File::delete(public_path($filePath));
        }
        
        if ($request->hasFile('logo') && $heroSetting->logo != '/assets/default/blog.png') {
            $filePath = ltrim($heroSetting->logo, '/');
            File::delete(public_path($filePath));
        }
    
        // Update hero setting with new images
        $updated = false;
        if ($request->hasFile('background_image')) {
            try {
                $fileName = time() . '.' . $request->background_image->extension();
                $request->background_image->move(public_path('/assets/pages'), $fileName);
                $filePath = '/assets/pages/' . $fileName;
                $heroSetting->background_image = $filePath;
                $updated = true;
            } catch (\Exception $e) {
                return redirect()->route('hero.edit')->with('error', 'Error uploading background image: ' . $e->getMessage());
            }
        }
    
        if ($request->hasFile('logo')) {
            try {
                $fileName = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('/assets/pages'), $fileName);
                $filePath = '/assets/pages/' . $fileName;
                $heroSetting->logo = $filePath;
                $updated = true;
            } catch (\Exception $e) {
                return redirect()->route('hero.edit')->with('error', 'Error uploading logo: ' . $e->getMessage());
            }
        }

    
        if ($updated) {
            $heroSetting->save();
            return redirect()->route('hero.edit')->with('success', 'Hero section updated successfully!');
        } else {
            return redirect()->route('hero.edit')->with('error', 'No changes made');
        }
    }
}