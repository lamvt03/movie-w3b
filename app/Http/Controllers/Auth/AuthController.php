<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthController extends Controller{


    public function showFormRegister(){
        return view('web.register');
    }

    public function showFormLogin(){
        return view('web.login');
    }


    public function register(Request $request){
       
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
        ]);
        
        if ($validator->fails()) {
            // Email đã tồn tại
            return redirect()->back()->with('existed_email','Email da ton tai');
        } else {
            // Email chưa tồn tại
            $user = new User();
            $user->fullname = $request->fullname;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->password = bcrypt($request->password);
            $user->isActive = 1;
            $user->save();
            return redirect()->back()->with('register_success','Dang ky thanh cong');
        }
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return redirect()->route('home')->with('success', 'success');
        }
        return redirect()->back()->with('error','error');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    aa
}