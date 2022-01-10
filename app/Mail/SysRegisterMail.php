<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SysRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $cuser ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $cuinfo)
    {
        //
        $this->cuser = $cuinfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sysregister@virtualex.ma', 'Virtualex Inscription ')
                    ->subject("Vérification d'adresse")
                    ->view('/email/codeverification')
                    ->with($this->cuser);
    }
}
