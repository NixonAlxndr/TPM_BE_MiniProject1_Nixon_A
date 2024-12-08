<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('post.postBook', compact('category'));
    }

    public function createBook(Request $request){
        $validatedData = $request->validate([
            "Title" => ['required', 'min:1'],
            "AuthorName" => ['required', 'min:1'],
            "Image" => ['nullable', 'image'],
            "Description" => ['nullable'],
            "CategoryId" => ["required"],
        ]);

        if($request->file("Image")){
            $filepath = $request->file('Image')->store('post-images');
            $filename = basename($filepath);
            $validatedData['Image'] = $filename;
        }

        Post::create($validatedData);

        return redirect(route('ShowBook'));
    }

    public function edit(Post $book){
        $category = Category::all();
        return view('edit.editBook', compact('category', 'book'));
    }

    public function update(Post $book, Request $request){
        $request->validate([
            "Title" => ['required', 'min:1'],
            "AuthorName" => ['required', 'min:1'],
            "Image" => ['required', 'image'],
            "Description" => ['nullable'],
            "CategoryId" => ["required"],
        ]);

        if ($book->Image) {
            $oldFilePath = 'post-images/' . $book->Image; 
            Storage::delete($oldFilePath); 
        }

        $filepath = $request->file('Image')->store('post-images');
        $filename = basename($filepath);

        $book->update([
            "Title" => $request->Title,
            "AuthorName" => $request->AuthorName,
            "Image" => $filename,
            "Description" => $request->Description,
            "CategoryId" => $request->CategoryId,
        ]);

        return redirect(route('ShowBook'));
    }

    public function delete(Post $book){
        if ($book->Image) {
            $oldFilePath = 'post-images/' . $book->Image; 
            Storage::delete($oldFilePath); 
        }
        $book->delete();
        $category = Category::all();
        return redirect(route('ShowBook'));
    }
}
