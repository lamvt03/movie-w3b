<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthController extends Controller{


    public function showFormRegister(){
        return view('auth.register');
    }

    public function showFormLogin(){
        return view('auth.login');
    }


    public function register(Request $request){
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('showFormRegister')->with('success','Dang ky thanh cong');

    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return redirect()->route('home');
        }
        return redirect()->route('showFormLogin')->with('error','Dang nhap that bai');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    // public function login(Request $request) {
    //     // Kiểm tra dữ liệu nhập vào
    //     $rules = [
    //         'email' =>'required|email',
    //         'password' => 'required|min:6'
    //     ];
    //     $messages = [
    //         'email.required' => 'Email là trường bắt buộc',
    //         'email.email' => 'Email không đúng định dạng',
    //         'password.required' => 'Mật khẩu là trường bắt buộc',
    //         'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    //     ];
    //     $validator = Validator::make($request->all(), $rules, $messages);
        
        
    //     if ($validator->fails()) {
    //         // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
    //         return redirect('login')->withErrors($validator)->withInput();
    //     } else {
    //         // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
    //         $email = $request->input('email');
    //         $password = $request->input('password');
     
    //         if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    //             // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
    //             return redirect('hocsinh');
    //         } else {
    //             // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
    //             Session::flash('error', 'Email hoặc mật khẩu không đúng!');
    //             return redirect('login');
    //         }
    //     }
    // }
}