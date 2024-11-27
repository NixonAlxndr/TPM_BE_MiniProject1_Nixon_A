<?php

namespace App\Http\Controllers;

use App\Models\Mythtale;
use Illuminate\Http\Request;
use App\Models\Culture;

class MythtaleController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function getTales(){
        $tales = Mythtale::with('culture')->get();
        return view('/tales/talesList', compact('tales'));
    }

    public function createTalesPage(){
        $culture = Culture::all();
        return view('tales.createTales', compact('culture'));
    }

    public function createTales(Request $request){
        $request->validate([
           'Title' => ['required' , 'min:1'],
           'Summary' => ['nullable'],
           'Type' => ['nullable'],
            'CultureId' => ['required']
        ], [
            'Title.required' => "Title is required",
            "CultureId.required" => "You need to fill this"
        ]);

        $summary = $request->Summary ?? 'none';
        $type = $request->Type ?? 'none';
        
        Mythtale::create([
            "Title" => $request->Title,
            "Summary" => $summary,
            "Type" => $type,
            "CultureId" => $request->CultureId
        ]);

        return redirect(route('getTales'));
        // response()->json($request->all());
    }
}
