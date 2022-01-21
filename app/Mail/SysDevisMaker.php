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
    protected $img_src;
    protected $nomContact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $devis, $numerodevis, $nomentreprise, $nomContact)
    {
        $this->devis = $devis;
        $this->numdevis = $numerodevis;
        $this->nomEts  = $nomentreprise;        
        $this->nomContact = $nomContact;
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
                    ->view('email.devis2')
                    ->with('devis', $this->devis)
                    ->with('numero', $this->numdevis)
                    ->with('sommeTotal', 0)
                    ->with('nomcontact',  $this->nomContact)
                    ->with('entreprise', $this->nomEts);
    }
}
