<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\jobs\ContactUs;
class ContactUsShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $maildata;
    public function __construct($data)
    {
        $this->maildata=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $mail_data=$this->maildata;
        return  $this->from($mail_data['email'])    
                    ->subject('Contact Us')
                    ->view('layouts.email.contactus',['maildata'=>$mail_data]);
    }
}
