<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class MainController extends Controller
{
    public function blogs()
    {
        $blogs = Artikel::all();
        return view('main.blogs', compact('blogs'));
    }

    public function about()
    {
        return view('main.about');
    }
}
