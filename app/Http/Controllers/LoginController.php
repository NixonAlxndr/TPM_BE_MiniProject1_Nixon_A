<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use HasFactory;

    public function index(){
        return view('login.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'user_name' => 'required',
            "password" => 'required'
        ], [
            "user_name.required" => "Field is required",
            'password.required' => "Password is required",
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back();
    }
}
