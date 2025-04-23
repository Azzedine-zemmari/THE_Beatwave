<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventPurchaseService;
class HomeController extends Controller
{
    private $purchaseService;
    public function __construct(EventPurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function index(){
        $top3 = $this->purchaseService->ToPthree();
        return view('Home',compact('top3'));
    }
}
