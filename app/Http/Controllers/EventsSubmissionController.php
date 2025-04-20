<?php

namespace App\Http\Controllers;

use App\Services\EventPurchaseService;
use Illuminate\Http\Request;
use App\Services\EventSubmissionService;
use App\Services\CommentaireService;
use App\Services\ShareEvent;

class EventsSubmissionController extends Controller
{
    private $eventSubmissionService;
    private $eventPurchaseService;
    private $commentService;
    public function __construct(EventSubmissionService $eventSubmissionService,EventPurchaseService $eventPurchaseService,CommentaireService $commentService)
    {
        $this->eventSubmissionService = $eventSubmissionService;
        $this->eventPurchaseService = $eventPurchaseService;
        $this->commentService = $commentService;
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
    public function eventDetails(int $id,ShareEvent $Shareservice){
        $data = $this->eventSubmissionService->showSubmitedEvent($id);
        $userId = auth()->id();
        $eventPurchase = $this->eventPurchaseService->getUserTicket($userId,$id);
        $comments = $this->commentService->show($id);
        $shareButtons = $Shareservice->share($id);
        return view('EventDetails',compact('data','eventPurchase','comments','shareButtons'));
    }
}
