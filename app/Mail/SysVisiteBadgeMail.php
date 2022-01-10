<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\PDFController as  PDF;

class SysVisiteBadgeMail extends Mailable
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
        // $pdfCreator = new PDF();
        // $pdf_badge = $pdfCreator->create('/email/envoie-badge', $this->user);
        // ->attachData($pdf_badge, 'Badge.pdf', ['mime' => 'application/pdf',])

        return $this->from('sysregister@virtualex.ma', 'Virtualex Inscription ')
                    ->subject("Badge visiteur")
                    ->view('/email/email-badge2')
                    ->with($this->user);
    }
}
