<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Session;;

class RegisterController extends Controller
{
    public function index(){
        return view('register.register');
    }

    public function registration(Request $request){
        $validatedData = $request->validate([
            "user_name"=>['required'],
            "email" => ['required'],
            'password'=>['required'],
        ]);

        $user = new Registration();
        $user->user_name = $validatedData['user_name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);

        if(str_contains($user->email, '@admin.com')){
            $user->role = 'Admin';
        }elseif(str_contains($user->email,'@creator.com')){
            $user->role = 'Creator';
        }else{
            $user->role = 'Guest';
        }

        $user->save();
        
        return redirect(route('Login'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect(route('Home'));
        }
    }
}
