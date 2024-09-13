<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Gallery;
use App\Models\Testimoni;
use App\Models\HeroSetting;
use App\Models\Projek;


class MainController extends Controller
{

    public function homepage(){
        $testimonies = Testimoni::all();
        $randBlogs = Artikel::inRandomOrder()->take(3)->get();
        $heroSetting = HeroSetting::first();
        $active = '/';

        return view('main.homepage', compact('testimonies', 'active', 'randBlogs', 'heroSetting'));
    }

    public function blogs()
    {
        $blogs = Artikel::latest()->paginate(6);
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

    public function projeks()
{
    $projeks = Projek::latest()->paginate(6);
    $active = 'projeks';
    return view('main.projeks', compact('projeks', 'active'));
}

public function projek($slug)
{
    $projek = Projek::where('slug', $slug)->first();
    $active = 'projeks';
    if ($projek) {
        return view('main.projek', compact('projek', 'active'));
    } else {
        abort(404); // or return a custom error page
    }
}
public function searchProjek(Request $request)
{
    $query = $request->input('query');

    $active = 'projeks';

    $projeks = Projek::where('nama_projek', 'LIKE', "%{$query}%")
                ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                ->get();

    return view('main.searchProjek', compact('projeks', 'query', 'active'));
}

    public function about()
    {
        $active = 'about';
        return view('main.about', compact('active'));
    }

    public function galleries()
    {
        $galleries = Gallery::latest()->get();
        $active = 'galleries';
        return view('main.galleries', compact('galleries', 'active'));
    }

    public function kontak()
    {
        $active = 'contact';

        $client = new \Symfony\Component\HttpClient\CurlHttpClient();
        $crawler = new \Symfony\Component\DomCrawler\Crawler();
    
        $uri = 'https://www.instagram.com/pklkubukami/';
        $response = $client->request('GET', $uri);
        $html = $response->getContent();
    
        $crawler->addHtmlContent($html);
    
    // Scrape the follower count from the meta tag
    $metaTag = $crawler->filter('meta[property="og:description"]')->first();
    $metaContent = $metaTag->attr('content');
    preg_match('/(\d+(?:K|M)?)/', $metaContent, $matches);
    $followerCount = $matches[1];
        return view('main.kontak',['followerCount' => $followerCount], compact('active'));
    }

    // Mencari sebuah galeri
    public function searchGallery(Request $request)
    {
        $query = $request->input('query');
        
        $active = 'galleries';

        $galleries = Gallery::where('judul', 'like', "%$query%")
                            ->orWhere('upload_by', 'like', "%$query%")
                            ->get();

        return view('main.galleries', compact('galleries', 'active'));
    }

    // Mencari Sebuah Artikel
    public function searchBlog(Request $request){
        $query = $request->input('query');

        $active = 'blogs';

        $blogs = Artikel::where('judul', 'LIKE', "%{$query}%")
                    ->orWhere('konten', 'LIKE', "%{$query}%")
                    ->get();
    
        return view('main.searchBlog', compact('blogs', 'query', 'active'));
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
