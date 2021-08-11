<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\NewsHasViewed;
use App\Providers\App\Events\PostHasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Counter
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
     * @param  NewsHasViewed  $event
     * @return void
     */
    public function handle(NewsHasViewed $event)
    {
        $event->news->increment('views');
    }
}
