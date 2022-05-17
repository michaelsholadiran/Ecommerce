<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SucessfulOrderMail extends Mailable
{
    use Queueable, SerializesModels;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $order_id)
    {
        $this->order_id=  $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->subject('Purchase')
                 ->view('frontend.includes.sucessful_order')->with(['order_id' => $this->order_id]);
    }
}
