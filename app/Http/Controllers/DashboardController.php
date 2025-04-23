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
        return view('admin.Dashboard',compact('users','events','purchaseCount'));
    }
    public function getChartData(){
        $chartData = $this->dashboardService->getEventsByCategoryForChart();
        return response()->json([
            'success' => true,
            'data' => $chartData
        ]);
    }
}
