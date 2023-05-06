<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GroupMail extends Mailable
{
    use Queueable, SerializesModels;


    private string $content;
    private string $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$title)
    {
        $this->content = $content;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('overnoxlab@gmail.com', 'OvernoxLab')
            ->view('emails.base-group-mail',['content'=>$this->content,'title'=>$this->title]);
    }
}
