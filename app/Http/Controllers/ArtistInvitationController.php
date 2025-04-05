<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArtistInvitationService;

class ArtistInvitationController extends Controller
{
    private $artistInvitationService;
    public function __construct(ArtistInvitationService $artistInvitationService)
    {
        $this->artistInvitationService = $artistInvitationService;
    }
    public function show(){
        $data = $this->artistInvitationService->showInvitation();
        return view('artist.invitations',compact('data'));
    }
    public function accepte(int $id){
        $this->artistInvitationService->acceptInvitation($id);
        return redirect()->back()->with('success','invitation accepted successfully');
    }
    public function refuse(int $id){
        $this->artistInvitationService->refuseInvitation($id);
        return redirect()->back()->with('success','invitation refused');
    }
    public function availlable(){
        $data = $this->artistInvitationService->availlability();
        $calendarData = $data->map(function($event){
            return [
                'title' => $event->Event,
                'start' => $event->date,
                'color' => "#FF5733"
            ];
        });
        return response()->json($calendarData);
    }
}
