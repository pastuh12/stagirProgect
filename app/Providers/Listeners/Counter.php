<?php

namespace App\Providers\Listeners;

use App\Providers\Events\NewsHasViewed;
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
    public function handle(NewsHasViewed $event): void
    {
        $event->news->increment('views');
    }
}
