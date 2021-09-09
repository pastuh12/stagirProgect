<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Feedback extends Mailable
{
    use Queueable, SerializesModels;

    private string $name;
    private string $text;
    private string $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $text)
    {
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.feedback')
            ->with([
                'userName' => $this->name,
                'userEmail' => $this->email,
                'text' => $this->text,
            ]);
    }
}
