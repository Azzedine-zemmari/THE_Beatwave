<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventSubmissionService;

class EventsSubmissionController extends Controller
{
    private $eventSubmissionService;
    public function __construct(EventSubmissionService $eventSubmissionService)
    {
        $this->eventSubmissionService = $eventSubmissionService;
    }
    public function show(){
        $data = $this->eventSubmissionService->showEvents();
        return view('admin.EventSubmission',compact('data'));
    }
}
