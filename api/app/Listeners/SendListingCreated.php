<?php

namespace App\Listeners;

use App\Events\ListingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendListingCreated
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
    public function handle(ListingCreated $event): void
    {
        Log::info('New Listing Added', $event->listing->title);
    }
}
