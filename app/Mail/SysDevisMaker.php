<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SysDevisMaker extends Mailable
{
    use Queueable, SerializesModels;

    protected $devis;
    protected $numdevis;
    protected $nomEts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $devis, $numerodevis, $nomentreprise)
    {
        $this->devis = $devis;
        $this->numdevis = $numerodevis;
        $this->nomEts  = $nomentreprise;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sysadmin@gssoftai.com', 'S&S PACKAGING Devis ')
                    ->subject("Devis sur mésure ")
                    ->view('/email/devis')
                    ->with('devis', $this->devis)
                    ->with('numero', $this->numdevis)
                    ->with('entreprise', $this->nomEts);
    }
}
