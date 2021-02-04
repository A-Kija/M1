<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailtrap extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($author)
    {
        $this->name = $author->name;
        $this->surname = $author->surname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@super.lt', 'Super')
            ->subject('Super Confirmation')
            ->markdown('mails.super')
            ->with([
                'name' => $this->name.' '.$this->surname,
                'link' => 'https://mailtrap.io/inboxes'
            ]);
        
        // return $this->view('view.name');
    }
}
