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

    public function about()
    {
        $active = 'about';
        return view('main.about', compact('active'));
    }

    public function galleries()
    {
        $galleries = Gallery::all();
        $active = 'galleries';
        return view('main.galleries', compact('galleries', 'active'));
    }

    public function kontak()
    {
        $active = 'kontak';
        return view('main.kontak', compact('active'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $galleries = Gallery::where('judul', 'like', "%$query%")
                            ->orWhere('upload_by', 'like', "%$query%")
                            ->get();

        return view('main.galleries', compact('galleries'));
    }

    public function gallery($slug)
    {
        $gallery = Gallery::where('slug', $slug)->first();
        $active = 'gallery';
        if ($gallery) {
            return view('main.gallery', compact('gallery', 'active'));
        } else {
            abort(404); // or return a custom error page
        }
    }
}
