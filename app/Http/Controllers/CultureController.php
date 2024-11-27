<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\Culture;

class CultureController extends Controller
{
    use HasFactory;
    public function index(){
        return view("culture.createCulture");
    }

    public function createCulture(Request $request) {
        $request -> validate([
            "Name" => ["required", "min:1"],
            "Region" => ['required', 'min:1']
        ], [
            "Name.required" => "This field is required",
            "Name.min" => "Please enter minimal 1 word",
            "Region.required" => "This field is required",
            "Region.min" => "Please enter minimal 1 word"
        ]);

        Culture::create([
            "Name" => $request->Name,
            "Region" => $request->Region
        ]);
        return redirect(route("getTales"));
    }
}
