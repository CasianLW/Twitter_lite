<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\TweetCreated;
use App\Notifications\NewTweet;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTweetCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TweetCreated $event): void
    {
        foreach (User::whereNot('id', $event->tweet->user_id)->cursor() as $user) {
            $user->notify(new NewTweet($event->tweet));
        }
    }
}
