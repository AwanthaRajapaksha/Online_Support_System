<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Http\Request;

class ProblemSubmited extends Mailable
{
    use Queueable, SerializesModels;

    public $requestData;


    public function __construct(array  $request)
    {
        $this->requestData = $request;

    }


    public function build()
    {
        return $this->view('email.emailbody');
    }


}
