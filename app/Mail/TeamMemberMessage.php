<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamMemberMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $subject;
    public $messageContent;

    public function __construct($name, $subject, $messageContent)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('admin.pages.emails.team_member_message')
            ->with([
                'name' => $this->name,
                'subject' => $this->subject,
                'messageContent' => $this->messageContent,
            ]);
    }
}
