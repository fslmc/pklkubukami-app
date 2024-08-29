<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Gallery;

class MainController extends Controller
{
    public function blogs()
    {
        $blogs = Artikel::all();
        return view('main.blogs', compact('blogs'));
    }

    public function galleries()
    {
        $galleries = Gallery::all();
        return view('main.galleries', compact('galleries'));
    }
}
