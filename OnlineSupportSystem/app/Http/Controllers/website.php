<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProblemSubmited;

class website extends Controller
{
    public function index()
    {
    $recipientEmail = 'awanthacodewox@gmail.com';

    Mail::to($recipientEmail)->send(new ProblemSubmited());

    return redirect()->back();
    }
}
