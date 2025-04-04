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
}
