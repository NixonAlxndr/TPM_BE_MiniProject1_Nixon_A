<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    use HasFactory;

    public function index(){
        return view('login.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'user_name' => 'required',
            "password" => 'required',
            'email' => 'required'
        ], [
            "user_name.required" => "Field is required",
            'password.required' => "Password is required",
            'email.required' => "Password is required",
        ]);

        $loggedUser = Registration::where('user_name', '=', $request->user_name)->first();
        if($loggedUser){
            if(Hash::check($request->password, $loggedUser->password)){
                $request->session()->put('loginId', $loggedUser->id);
                return redirect()->intended('/');
            }else{
                return back();
            }
        }

        return back();
    }
}
