<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{


    public function store(Request $request){

        Problem::create([

            'name' =>$request->name,
            'email' =>$request->email,
            'phone'=>$request->phone,
            'problem'=>$request->problem,
            'answer'=> 0,
            'token'=> rand()

        ]);
        return redirect()->back();
        //dd($request);
    }

    public function getproblem($problem_id){

        $problem = Problem::find($problem_id);
        if($problem){
            return response()->json([
            'status'=> 200,
            'problem'=> $problem
            ]);
        }
        else{
            return response()->json([
                'status'=> 404
                ]);
        }
     }

     public function updateanswer(Request $request, $prob_id){

        //$problem = Problem::find($prob_id);
        //$problem->answer = $request->up_answer;
        //$problem->save();
        //return redirect()->back();

        //return redirect()->route('home');
        //dd($prob_id);

        //Problem::findOrFail($prob_id)->update($request->all());
        //dd($prob_id);

     }
}
