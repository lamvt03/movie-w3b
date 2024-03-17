<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
    public function get_currency(){
        return '₫';
    }
    public function format_money($amount, $currency=false){
        if($currency){
            return number_format($amount, 0, '.', '.'). ''. $this->get_currency();
        }
        return number_format($amount, 0, '.', '.');
    }
    public function showTransaction(){
        
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $userId = Auth::id();
        $video = Video::get();
        $data = DB::table('orders')
            ->join('videos', 'orders.videoId', '=', 'videos.id')
            ->select('orders.*', 'videos.href')
            ->where('userId',$userId)
            ->orderBy('vnp_PayDate','desc')
            ->paginate(5);
        $currentPage = $data->currentPage();
        $index = ($currentPage - 1) * $data->perPage() + 1;
        foreach($data as $row){
            $row->vnp_Amount = $this->format_money($row->vnp_Amount, true);
        }
        
        return view('web.transaction',[
            'now'=> $now,
            'data' => $data,
            'index' => $index,
        ]);
    }
    
}
