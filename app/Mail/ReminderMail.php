<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $full_name,$preferred_date)
    {
        $this->email = $email;
         $this->full_name = $full_name;
         $this->preferred_date = $preferred_date;
        //  dd($preferred_date);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            // dd($this->preferred_date);
            $name = $this->full_name;
            $date = $this->preferred_date;
            // dd($date);
            return $this
        ->from('Pinponsuhuj@gmail.com')
        ->to($this->email)
        ->subject('Checkup reminder')
        ->markdown('email.shaba')->with([
            'full_name'=>$name,
            'date'=>$date
        ]);
    }
}
