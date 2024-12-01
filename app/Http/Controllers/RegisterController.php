<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Registration;

class RegisterController extends Controller
{
    public function index(){
        return view('register.register');
    }

    public function registration(Request $request){
        $validatedData = $request->validate([
            "user_name"=>['required'],
            'password'=>['required'],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        Registration::create($validatedData);
        
        return redirect(route('Home'));
    }
}
