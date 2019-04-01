<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\News;
use App\User;

class NewsShared extends Mailable
{
    use Queueable, SerializesModels;
    public $listing;
    public $sender;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(News $listing,User $sender,$body=null)
    {
        $this->listing=$listing;
        $this->sender=$sender;
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.news.email.shared-email')
        ->subject("{$this->sender->name} shared a News with you")
        ->from('hallow@fresh.com');
    }
}
