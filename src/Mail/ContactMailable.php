<?php

namespace Viksj\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $firstName;
    public $lastName;

    /**
     * Create a new message instance.
     */
    public function __construct($message, $firstName, $lastName)
    {
        //
        $this->message = $message;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mailable',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'contact::contact.email',
            with:[
                'message' => $this->message,
                'customer_name' => $this->firstName.' '.$this->lastName
            ]
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
