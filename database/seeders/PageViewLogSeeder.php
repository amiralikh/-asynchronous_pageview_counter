<?php

namespace Database\Seeders;

use App\Models\PageViewLog;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Ulid\Ulid;

class PageViewLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // define arrays of several urls
        $urlList = ['home', 'about', 'team','products'];

        // set date period from now to 6 months ago
        $startDate = Carbon::now()->subMonths(6);

        // continue seeding till date is reached
        while ($startDate->lt(Carbon::now())) {

            // seeding for each url
            foreach ($urlList as $url) {

                // seeding randomly between authenticate users and guests
                $user = rand(0, 1) ? Auth::user() : null;
                // create log
                PageViewLog::query()->create([
                    'ulid' => (string) Ulid::generate(),
                    'url' => $url,
                    'user_id' => optional($user)->id,
                    'created_at' => $startDate,
                ]);
            }

            // Incrementing date
            $startDate->addDay();
        }
    }
}
