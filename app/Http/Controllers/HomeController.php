<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function showBook() {
        $book = Post::all();
        return view('showBook', compact('book'));
    }
}
