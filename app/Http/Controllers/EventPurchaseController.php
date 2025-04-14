<?php

namespace App\Http\Controllers;

use App\Models\EventPurchase;
use Illuminate\Http\Request;
use App\Services\EventPurchaseService;
use Barryvdh\DomPDF\Facade\Pdf;
class EventPurchaseController extends Controller
{
    private $eventpurchaseService;
    public function __construct(EventPurchaseService $eventpurchaseService)
    {
        $this->eventpurchaseService = $eventpurchaseService;
    }

    public function purchaseTicket(int $eventId){
         // Clear previous tiket from session if it exists
        session()->forget('tiket');

        $userId = auth()->id(); 
        $eventPurchase = $this->eventpurchaseService->getUserTicket($userId,$eventId);

        // dd($eventPurchase);
        return view('Tiket',compact('eventPurchase'));
    }
    public function downloadTicket(int $eventId){
        $userId = auth()->id();
        $eventPurchase = $this->eventpurchaseService->getUserTicket($userId,$eventId);
        $pdf = Pdf::loadView('pdf.ticket',compact('eventPurchase'));
        return $pdf->download('ticket.pdf');
    }
}
