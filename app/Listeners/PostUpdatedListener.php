<?php

namespace App\Listeners;

use App\User;
use App\Events\PostWasUpdated;
use App\Jobs\NotifyAdminsOfUpdatedPost;

class PostUpdatedListener
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
     * @param  PostWasUpdated  $event
     *
     * @return void
     */
    public function handle(PostWasUpdated $event)
    {
        $admin = User::where('role', 'admin')->first();

        NotifyAdminsOfUpdatedPost::dispatch($admin, $event->post);
    }
}
