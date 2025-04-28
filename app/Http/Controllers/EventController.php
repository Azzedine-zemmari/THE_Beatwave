<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;
use App\Services\CommentaireService;
use App\Services\ShareEvent;
use App\Services\EventPurchaseService;

class EventController extends Controller
{
    private $eventService;
    private $eventPurchaseService;
    private $commentService;
    public function __construct(EventService $eventService,EventPurchaseService $eventPurchaseService,CommentaireService $commentService)
    {
        $this->eventService = $eventService;
        $this->eventPurchaseService = $eventPurchaseService;
        $this->commentService = $commentService;
    }
    public function index(){
        $data = $this->eventService->all();
        $inscriptionCounter = $this->eventService->inscriptionCount();
        $eventCounter = $this->eventService->eventCount();
        $revenu = $this->eventService->revenuCount();
        return view('organisateur.Events',compact('data','eventCounter','inscriptionCounter','revenu'));
    }
    public function showform(){
        $category = $this->eventService->getCategories();
        $artists = $this->eventService->getArtists();

        return view('organisateur.addEvent',compact('category','artists'));
    }
    public function store(Request $request){
        $data = $request->all();
        $event= $this->eventService->createEvent($data);
        return redirect()->back()->with('success','event created successfully');
    }
    public function edit(int $id){
        $category = $this->eventService->getCategories();
        $artists = $this->eventService->getArtists();
        $data = $this->eventService->findEvent($id);
        return view('organisateur.EditEvent',compact('data','category','artists'));
    }
    public function update(Request $request){
        $data = $request->all();
        $this->eventService->update($data);
        return redirect()->route('showAllEvent')->with('success','event update successfully');
    }
    public function delete(int $id){
        $this->eventService->destroy($id);
        return redirect()->route('showAllEvent')->with('success','event deleted successfully');
    }
    // to show all events for admin
    public function showAll(){
        $data = $this->eventService->showEvents();
        return view('admin.EventSubmission',compact('data'));

    }
    public function accept(int $id){
        $this->eventService->acceptEvent($id);
        return redirect()->back()->with('success','event published successfully');
    }
    public function refuse(int $id){
        $this->eventService->refuseEvent($id);
        return redirect()->back()->with('success','event canceled successfully');
    }
    public function events(){
        $data = $this->eventService->showSubmitedEvents();
        $categories = $this->eventService->getCategories();
        return view('Events',compact('data','categories'));
    }
    public function eventDetails(int $id,ShareEvent $Shareservice){
        $data = $this->eventService->EventDetail($id);
        $userId = auth()->id();
        $eventPurchase = $this->eventPurchaseService->getUserTicket($userId,$id);
        $comments = $this->commentService->show($id);
        $shareButtons = $Shareservice->share($id);
        return view('EventDetails',compact('data','eventPurchase','comments','shareButtons'));
    }
    // search in the events page
    public function search(Request $request){
        $name = $request->input('name');
        if($name){
            $data = $this->eventService->search($name);
            return view('Events',compact('data'));
        }
        return null;
    }
    // filtre the events
    public function filtrage(Request $request){
        $category = $request->query('category');
        // to show the categories in the blade 
        $categories = $this->eventService->getCategories();
        $data = $this->eventService->filter($category);
        return view('Events',compact('data','categories'));
    }
}
