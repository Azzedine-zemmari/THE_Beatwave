<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Dashboard;
class DashboardController extends Controller
{
    private $dashboardService;
    public function index(){
        
        return view('admin.Dashboard');
    }
}
