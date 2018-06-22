<?php

namespace App\Listeners;

use App\Events\CreatedLandMarkEven;
use App\Jobs\FlickrJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatedLandMarkListener
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
     * @param  CreatedLandMarkEven  $event
     * @return void
     */
    public function handle(CreatedLandMarkEven $event)
    {
        FlickrJob::dispatch($event->landMark->toArray());
    }
}
