<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email extends Mailable
{
    use Queueable, SerializesModels;

    private $token;
    private $view;

    public function __construct($token, $view)
    {
        $this->token = $token;
        $this->view = $view;
    }

    public function build()
    {
        return $this->view($this->view, $this->token);
    }
}
