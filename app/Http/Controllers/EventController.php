<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventService;
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }
    public function index(){
        $data = $this->eventService->all();
        $inscriptionCounter = $this->eventService->inscriptionCount();
        $eventCounter = $this->eventService->eventCount();
        return view('organisateur.Events',compact('data','eventCounter','inscriptionCounter'));
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
}
