<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Event;

class EventAdded extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $event;


    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          $address = 'noreply@horsebeach.co.uk';
        $name = 'Horsebeach Calendar';
        $subject = 'Event Added';

    return $this->view('email.event-added')
                ->from($address, $name)
                ->replyTo($address, $name)
                ->subject($subject);

    }
}
