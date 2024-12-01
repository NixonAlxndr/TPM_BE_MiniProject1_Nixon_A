<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view("post.postCategory");
    }

    public function createCategory(Request $request) {
        $request->validate([
            "CategoryName" => ['required', 'min:1']
        ]);

        Category::create([
            "CategoryName" => $request->CategoryName
        ]);
        return redirect(route("Post.Book"));
    }
}
