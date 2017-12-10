<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Requests;

class MailMe extends Mailable
{
    use Queueable, SerializesModels;

      protected $myname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($myname)
    {
        $myname = $myname;
    }

    /**
     * Build the message.

     *
     * @return $this
     */
    public function build()
    {

    $address = 'ignore@batcave.io';
   $name = 'Ignore Me';
   $subject = 'Css mail working';
   $myname = Auth::user()->email;

   return $this->view('email.sendmail')
               ->from($address, $name)
               ->cc($address, $name)
               ->bcc($address, $name)
               ->replyTo($address, $name)
               ->with($myname , $this->$myname)
               ->subject($subject);
    }
}
