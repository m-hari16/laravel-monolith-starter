<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return back()->with('validError', $validator->errors()->first());
        }

        $data = new User;
        $data->username = $req->username;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        $data->save();

        return redirect('login')->with('success', 'Register successfully. Please login');
    }
}
