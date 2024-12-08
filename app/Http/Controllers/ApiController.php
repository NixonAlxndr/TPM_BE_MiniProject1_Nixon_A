<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Post;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    function getBook(){
        $book = Post::with('category')->get();
        return BookResource::collection($book);
    }

    function getBookDetail($id){
        $book = Post::with('category')->findOrFail($id);
        return new BookResource($book);
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
        return response()->json(['message' => 'Data berhasil dibuat']);
    }

    public function updateBook(Request $request, $id){
        $filename = '';
        try {
            $request->validate([
                "Title" => ['required', 'min:1'],
                "AuthorName" => ['required', 'min:1'],
                "Image" => ['nullable', 'image'],
                "Description" => ['nullable'],
                "CategoryId" => ["required"],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); 
        }
        
        $book = Post::findOrFail($id);
        if ($book->Image) {
            $oldFilePath = 'post-images/' . $book->Image; 
            Storage::delete($oldFilePath); 
        }

        if($request->file("Image")){
            $filepath = $request->file('Image')->store('post-images');
            $filename = basename($filepath);
        }

        $book->update([
            "Title" => $request->Title,
            "AuthorName" => $request->AuthorName,
            "Image" => $filename,
            "Description" => $request->Description,
            "CategoryId" => $request->CategoryId,
        ]);

        return response()->json(["message"=> "Data berhasil di update"]);
    }

    public function deleteBook($id){
        $book = Post::findOrFail($id);
        $book->delete();
        return response()->json(['message'=> 'Data berhasil di hapus']);
    }















    function register(Request $request){
        $request->validate([
            'email' => ['required'],
            'user_name' => ['required'],
            'password' => ['required'],
        ]);

        if(str_contains($request->email, '@admin.com')){
            $request['role'] = 'Admin';
        }elseif(str_contains($request->email,'@creator.com')){
            $request['role'] = 'Creator';
        }else{
            $request['role'] = 'Guest';
        }

        Registration::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_name' => $request->user_name,
            'role' => $request['role']
        ]);

        return response()->json(['Registrasi Success'], 200);
    }

    function login(Request $request){
        $request->validate([
            "user_name" => ["required"],
            "email" => ["required"],
            "password"=> ["required"], 
        ]);

        $user = Registration::where("email", $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password) || $user->user_name != $request->user_name){
            return response()->json(['Login gagal']);
        }
        return $user->createToken($user->email)->plainTextToken;
    }

    function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(["message" => ['Logout Success']],200);
    }
}
