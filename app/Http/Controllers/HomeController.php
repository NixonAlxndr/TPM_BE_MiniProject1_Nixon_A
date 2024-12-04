<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $data = array();
        if(Session::has('loginId')){
            $data = Registration::where('id', '=', Session::get('loginId'))->first();
        }
        return view('home', compact('data'));
    }

    public function showBook() {
        $book = Post::all();
        return view('showBook', compact('book'));
    }
}
