<?php

namespace App\Repository;

use App\Models\PageViewLog;
use Illuminate\Support\Facades\DB;

class VisitRepo
{
    public function dailyVisit()
    {
        return PageViewLog::query()->select(DB::raw('url, DATE(created_at) as date, COUNT(*) as total_views, COUNT(user_id) as authorized_views, COUNT(*) - COUNT(user_id) as unauthorized_views'))
            ->groupBy('url','date')
            ->orderBy('date')
            ->get();
    }

    public function monthlyVisit()
    {
        return PageViewLog::query()->select(DB::raw('url,YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total_views, COUNT(user_id) as authorized_views, COUNT(*) - COUNT(user_id) as unauthorized_views'))
            ->groupBy('url','year', 'month')
            ->orderBy('year','desc')
            ->orderBy('month','desc')
            ->get();
    }
}
