<?php

namespace App\Http\Controllers;

use App\Services\EventPurchaseService;
use Illuminate\Http\Request;
use App\Services\EventSubmissionService;

class EventsSubmissionController extends Controller
{
    private $eventSubmissionService;
    private $eventPurchaseService;
    public function __construct(EventSubmissionService $eventSubmissionService,EventPurchaseService $eventPurchaseService)
    {
        $this->eventSubmissionService = $eventSubmissionService;
        $this->eventPurchaseService = $eventPurchaseService;
    }
    public function show(){
        $data = $this->eventSubmissionService->showEvents();
        return view('admin.EventSubmission',compact('data'));
    }
    public function accept(int $id){
        $this->eventSubmissionService->acceptEvent($id);
        return redirect()->back()->with('success','event published successfully');
    }
    public function refuse(int $id){
        $this->eventSubmissionService->refuseEvent($id);
        return redirect()->back()->with('success','event canceled successfully');
    }
    public function events(){
        $data = $this->eventSubmissionService->showSubmitedEvents();
        return view('Events',compact('data'));
    }
    public function eventDetails(int $id){
        $data = $this->eventSubmissionService->showSubmitedEvent($id);
        $userId = auth()->id();
        $eventPurchase = $this->eventPurchaseService->getUserTicket($userId,$id);
        return view('EventDetails',compact('data','eventPurchase'));
    }
}
