<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmPass extends Mailable
{
    use Queueable, SerializesModels;
    protected $code;
    protected $defaultPass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code, $defaultPass = null)
    {
        $this->code = $code;
        $this->defaultPass = $defaultPass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('mails.confirm_pass', [
                'code' => $this->code,
                'defaultPass' => $this->defaultPass,
            ]);
    }
}
