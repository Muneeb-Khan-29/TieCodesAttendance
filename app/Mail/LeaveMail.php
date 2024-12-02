<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeaveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $leaveDate;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $leaveDate)
    {
        $this->name = $name;
        $this->leaveDate = $leaveDate;
    }

    public function build()
    {
        return $this
            ->subject('Attendance Update Notification')
            ->markdown('emails.LeaveMail');
    }
}
