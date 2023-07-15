<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;

class ViewController extends Controller
{
    public function index(){

        $problems = Problem::all();
        return view('home', compact('problems'));
        //dd($request);

    }
}
