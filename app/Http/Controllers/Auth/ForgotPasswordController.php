<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showForgotPassPage(){
        return view('web.forgot-password');
    }

    public function checkExistedEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
        ]);
        
        if ($validator->fails()) {
            // Email đã tồn tại
            return redirect()->back()->with('existed_email','Email da ton tai');
        } else {
            return redirect()->back()->with('not_existed_email','Email khong ton tai');
        }
    }
}
