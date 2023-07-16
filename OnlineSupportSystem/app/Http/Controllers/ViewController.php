<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    // start veiw all problems
    public function index(){

        $problems = Problem::all();
        return view('home', compact('problems'));
        //dd($request);

    }
     // end veiw all problems

    // start veiw all problems
    public function all(){

        $problems = Problem::all();
        return view('welcome', compact('problems'));
        //dd($request);

    }
     // start veiw all problems

}
