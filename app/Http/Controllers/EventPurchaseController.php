<?php

namespace App\Http\Controllers;

use App\Models\EventPurchase;
use Illuminate\Http\Request;
use App\Services\EventPurchaseService;
class EventPurchaseController extends Controller
{
    private $eventpurchaseService;
    public function __construct(EventPurchaseService $eventpurchaseService)
    {
        $this->eventpurchaseService = $eventpurchaseService;
    }

    public function purchaseTicket(int $eventId){
        $userId = auth()->id(); 
        $eventPurchase = $this->eventpurchaseService->getUserTicket($userId,$eventId);
        // dd($eventPurchase);
        return view('Tiket',compact('eventPurchase'));
    }
}
