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
    public function findEvent(int $id){
        $data = $this->eventService->findById($id);
        dd($data);
    }
}
