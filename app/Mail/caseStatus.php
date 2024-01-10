<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class caseStatus extends Mailable
{
    use Queueable, SerializesModels;


    public $caseStatus;


    /**
     * Create a new message instance.
     */
    public function __construct($caseStatus)
    {
        $this->caseStatus = $caseStatus;
    }
    public function build()
    {
        return $this->subject('Emergency in Isabela State University Santiago Extension')
            ->view('mail.caseStatus')
            ->with(['caseStatus' => $this->caseStatus]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Emergency in Isabela State University Santiago Extension',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.caseStatus_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
