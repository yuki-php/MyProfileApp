<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $content;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items)
    {

        
    $this->name = $items['name'];
    $this->email = $items['email'];
    $this->content = $items['content'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('お問い合わせ完了しました！')
            ->text('/contact.thanks');
    
      
    }
}
