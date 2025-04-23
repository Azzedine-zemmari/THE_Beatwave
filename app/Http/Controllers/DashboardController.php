<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Dashboard;
class DashboardController extends Controller
{
    private $dashboardService;
    public function __construct(Dashboard $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }
    public function index(){
        $users = $this->dashboardService->userCount();
        $events = $this->dashboardService->eventCount();
        $purchaseCount = $this->dashboardService->purchaseCount();
        $chartData = $this->dashboardService->getEventsByCategoryForChart();
        dd($chartData);
        return view('admin.Dashboard',compact('users','events','purchaseCount'));
    }
}
