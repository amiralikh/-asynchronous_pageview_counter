<?php

namespace App\Listeners;

use App\Events\PageViewed;
use App\Models\PageView;
use App\Models\PageViewLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Ulid\Ulid;

class UpdatePageViewCounter
{
    /**
     * Handle the event.
     */
    public function handle(PageViewed $event): void
    {
        // Create a new PageViewLog entry with the URL and user_id from the event
        PageViewLog::create([
            'ulid' => Ulid::generate(),
            'url' => $event->url,
            'user_id' => $event->user_id,
        ]);

        // Find or create a PageView entry with the given URL
        $pageView = PageView::firstOrCreate(
            ['url' => $event->url],
            ['ulid' => Ulid::generate()]
        );

        // Increment the views_count for the PageView entry
        $pageView->increment('views_count');
    }
}
