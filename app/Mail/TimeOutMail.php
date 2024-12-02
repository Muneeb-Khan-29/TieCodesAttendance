<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TimeOutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $innTime, $outTime, $hoursWorked;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $innTime, $outTime, $hoursWorked)
    {
        $this->name = $name;
        $this->innTime = $innTime;
        $this->outTime = $outTime;
        $this->hoursWorked = $hoursWorked;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Attendance Update Notification')
            ->markdown('emails.TimeOutMail');
    }
}
