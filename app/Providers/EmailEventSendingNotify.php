<?php

namespace App\Providers;

use App\Mail\EventEmailNotificationMail;
use App\Models\EventsFollow;
use App\Providers\EmailEventSending;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailEventSendingNotify implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\EmailEventSending  $event
     * @return void
     */
    public function handle(EmailEventSending $event)
    {
        $followerEmails = EventsFollow::where('user_id', $event->user->id)->where('city_id', $event->city_id)->get();

        foreach ($followerEmails as $follower) {
            Mail::to($follower->email)->queue(new EventEmailNotificationMail($event->user, $event->event));
        }
    }
}
