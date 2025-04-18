<?php

namespace App\Http\Controllers;

use App\Services\CommentaireService;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    private $commentarieService;
    public function __construct(CommentaireService $commentarieService)
    {
        $this->commentarieService = $commentarieService;
    }
    // create a comment
    public function comment(Request $request){
        $data = $request->all();
        $data['userId'] = auth()->id();
        // dd($data);
        $this->commentarieService->create($data);
        return redirect()->back();
    }
    public function getAll(int $eventId){
        $comments = $this->commentarieService->show($eventId);
        dd($comments);
        return view('EventDetails',compact('comments'));
    }
}
