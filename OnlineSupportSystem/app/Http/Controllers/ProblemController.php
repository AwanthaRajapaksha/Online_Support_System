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

        $random ='INC'.rand();

        $problem = new Problem;
        $problem->name = $request->name;
        $problem->email = $request->email;
        $problem->phone = $request->phone;
        $problem->problem = $request->problem;
        $problem->answer = '0';
        $problem->token = $random;
        $saveSuccess = $problem->save();

        if ($saveSuccess) {

            Session::flash('success', 'Problem saved successfully!Your Problem Token Number is: '.$random);

            $email_data = [
                'name' =>$request->name,
                'email' =>$request->email,
                'phone'=>$request->phone,
                'problem'=>$request->problem,
                'token'=> $random
            ];
            
            // start email send function
            $recipientEmail = env('MAIL_FROM_ADDRESS');
            Mail::to($recipientEmail)->send(new ProblemSubmited($email_data));

            return redirect()->back();
            //dd($request);
        } else {

            Session::flash('error', 'Failed to save data.');
        }

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
