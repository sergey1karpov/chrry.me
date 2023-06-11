<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EventEmailNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    public Event $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Event $event)
    {
        $this->user = $user;

        $this->event = $event;
    }

    private function mailSubject(): string
    {
        return $this->user->name . ' - ' . $this->event->city . '|' . Carbon::parse($this->event->date)->format('d.m.Y');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('event@chrry.me')
            ->with([
                'user' => $this->user,
                'event' => $this->event,
            ])
            ->subject($this->mailSubject())
            ->view('event.mail.event-mail');
    }
}
