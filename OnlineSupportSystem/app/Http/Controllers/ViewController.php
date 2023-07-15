<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){

        $problems = Problem::all();
        return view('home', compact('problems'));
        //dd($request);

    }

    public function all(){

        $problems = Problem::all();
        return view('welcome', compact('problems'));
        //dd($request);

    }


}
