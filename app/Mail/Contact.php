<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $data)
    {
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Dados do formulário',
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'email',
        );
    }

    public function attachments(): array
    {
        $data = $this->data['arquivo'];

        return [
            Attachment::fromPath($data)->as($data->getClientOriginalName())->withMime($data->getMimeType())
        ];
    }
}
