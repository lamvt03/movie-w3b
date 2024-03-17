<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function showTransaction(){
        $index = 1;
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $userId = Auth::id();
        $data = Order::where('userId', $userId)->orderBy('vnp_PayDate','desc')->get();
        return view('web.transaction',[
            'now'=> $now,
            'data' => $data,
            'index' => $index,
        ]);
    }
}
