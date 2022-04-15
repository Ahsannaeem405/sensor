<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notfy extends Mailable
{
    use Queueable, SerializesModels;
public $a;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($a)
    {
$this->a=$a;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notfy_mail');
    }
}
