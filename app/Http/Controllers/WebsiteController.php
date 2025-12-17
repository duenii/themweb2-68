<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\NewsLetter;
use App\Models\Post;
use App\Models\PostAbout;
use App\Models\Service;
use App\Models\SubAbout;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function show()
    {
        $posts = Post::where('publish', 1)->orderBy('updated_at', 'DESC')->get();
        $cat = Category::all();

        $banners = Banner::where('status', 1)->get();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        
        $services = Service::all();

        $newsletter = NewsLetter::orderBy('updated_at', 'DESC')->get();

       
        //dd( $post);
        return view('website.index', compact('posts','cat','banners','navmenu','submenu','services','newsletter'));
    }
    
    public function navmenu()
    {
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        return view('layouts.website', compact('navmenu','submenu'));
    }

}
