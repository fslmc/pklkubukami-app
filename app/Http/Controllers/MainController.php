<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class MainController extends Controller
{
    public function blogs()
    {
        $blogs = Artikel::all();
        $active = 'blogs';
        return view('main.blogs', compact('blogs', 'active'));
    }

    public function blog($slug)
    {
        $blog = Artikel::where('slug', $slug)->first();
        $active = 'blogs';
        if ($blog) {
            return view('main.blog', compact('blog', 'active'));
        } else {
            abort(404); // or return a custom error page
        }
    }
}
