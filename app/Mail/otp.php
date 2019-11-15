<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class otp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
      public $email_data;
    public function __construct($request)
    {
        //
         $this->email_data = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $data = $this->from("support@kloudportal.com")
        ->subject($this->email_data['subject']);
        return $data->view('otp');
    }
}
