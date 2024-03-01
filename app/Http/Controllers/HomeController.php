<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $trendingVideos = Video::orderBy('view', 'desc')->limit(4)->get();
        $videos = Video::orderBy('createdAt', 'desc')->paginate(12);
        return view('web.home')->with([
                'trendingVideos' => $trendingVideos,
                'videos' => $videos
            ]);
    }

    public function about(){
        return view('web.about');
    }
}
