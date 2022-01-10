<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SysVisiteRdvMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $userinfo)
    {
        //
        $this->user = $userinfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sysregister@virtualex.ma', 'Virtualex Inscription ')
                    ->subject("Demande de RDV visiteur")
                    ->view('/email/demande-rdv')
                    ->with($this->user);
    }
}
