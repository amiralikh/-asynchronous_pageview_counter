<?php

namespace App\Http\Controllers;

use App\Repository\VisitRepo;
use Illuminate\Http\Request;

class VisitController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
    public function dailyReport(VisitRepo $repo)
    {
        $title = 'DAILY REPORT';
        $visit_report = $repo->dailyVisit();
        return view('report',compact('visit_report','title'));
    }

    public function monthlyReport(VisitRepo $repo)
    {
        $title = 'MONTHLY REPORT';
        $visit_report = $repo->monthlyVisit();
        return view('report-monthly',compact('visit_report','title'));
    }
}
