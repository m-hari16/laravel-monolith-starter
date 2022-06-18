<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function index(){
        return view('pages/login');
    }

    public function attempt(Request $req){
        $validator = Validator::make($req->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return back()->with('validError', $validator->errors()->first());
        }

        $body = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if(!Auth::attempt($body)){
            return back()->with('loginFail', 'Email or Password Invalid');
        }

        $req->session()->regenerate();
        return redirect()->intended('/notes');
    }
}
