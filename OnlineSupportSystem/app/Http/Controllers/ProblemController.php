<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProblemController extends Controller
{
    // start problem seve
    public function store(Request $request){
        $random = rand();
        Problem::create([

            'name' =>$request->name,
            'email' =>$request->email,
            'phone'=>$request->phone,
            'problem'=>$request->problem,
            'answer'=> 0,

            'token'=> $random

        ]);

        Session::flash('success', 'Data saved successfully!Your Problem Token Number is: '.$random .' Save Your Token Number');
        return redirect()->back();
        //dd($request);
    }
    // end problem seve

    // start view problem
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
     // end view problem

     // start Update Answer
     public function updateanswer(Request $request){

       $problem = Problem::find($request->up_problrm_id);
        $problem->answer = $request->up_answer;
        $problem->save();
        Session::flash('success', 'Answer saved successfully');
        return redirect()->back();
        //dd($request);

     }
     // end Update Answer
}
