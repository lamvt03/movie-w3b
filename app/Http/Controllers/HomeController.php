<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function search(Request $request){
        $videos = Video::join('categories', 'videos.categoryId', '=', 'categories.id')
                        ->select('videos.*')
                        ->where(DB::raw("UPPER(CONCAT(videos.title, ' ', videos.director, ' ', categories.name))"), 'LIKE', '%' . strtoupper($request->keyword) . '%')
                        ->paginate(12);
        return view('web.search')->with(['videos' => $videos]);
    }

    public function about(){
        return view('web.about');
    }
}
