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

    
    public function showProfile(){
        return view('profile.profile');
    }

    public function showFrmProfile(){
        return view('profile.editProfile');
    }

    public function showFrmChangePass(){
        return view('profile.changePass');
    }

    public function changePass(Request $request){
        //Lấy thông tin về người dùng hiện tại đã đăng nhập
        $user = $request->user();

        if($user->password != $request->oldPass){

        }
        //Cập nhật mật khẩu mới
        $user->password = bcrypt($request->newPass);
        $user->save();
        return redirect()->route('showProfile')->with('change_success', 'Thay đổi mật khẩu thành công.');
        
    }

    // Phương thức để xử lý việc cập nhật thông tin người dùng
    public function editProfile(Request $request)
    {
        
        // Lấy thông tin về người dùng hiện tại đã đăng nhập
        $user = $request->user();
            // Cập nhật thông tin người dùng
            $user->fullname = $request->fullname;
            $user->phone = $request->phone;
            $user->save(); // Lưu lại các thay đổi vào cơ sở dữ liệu

            return redirect()->route('showProfile')->with('update_success', 'Cập nhật thông tin thành công.');
        
    }
    
}
