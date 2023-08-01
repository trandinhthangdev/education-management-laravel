<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeacherConfirmMail extends Mailable
{
    use Queueable, SerializesModels;
    public $teacher_code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($teacher_code)
    {
        $this->teacher_code = $teacher_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.teacher-confirm');
    }
}
