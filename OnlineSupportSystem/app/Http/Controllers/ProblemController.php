<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProblemSubmited;

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

        $email_data = [
            'name' =>$request->name,
            'email' =>$request->email,
            'phone'=>$request->phone,
            'problem'=>$request->problem,
            'token'=> $random
        ];

        Session::flash('success', 'Problem saved successfully!Your Problem Token Number is: '.$random);

        // Mail::send('emailtem',$email_data, function($message) use ($email_data){
        //     $message->to($email_data['email'])
        //             ->from($email_data['fromemail'],$email_data['formname'])
        //             ->subject($email_data['subject']);
        //     });

        $recipientEmail = 'awanthacodewox@gmail.com';

        Mail::to($recipientEmail)->send(new ProblemSubmited($email_data));

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
