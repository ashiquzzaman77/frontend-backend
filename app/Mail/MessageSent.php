<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public $data;  // The data array

    /**
     * Create a new data instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;  // Assign the data array
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Company Hr')
            ->view('emails.message_sent', ['data' => $this->data]);
    }
}

