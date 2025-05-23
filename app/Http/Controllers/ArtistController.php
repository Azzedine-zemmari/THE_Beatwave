<?php

namespace App\Http\Controllers;

use App\Services\ArtistService;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    private $artistService;

    public function __construct(ArtistService $artistService)
    {
        $this->artistService = $artistService;
    }
    public function index(){
        $data = $this->artistService->get();
        return view('Artists',compact('data'));
    }
    public function getArtistProfile(int $id){
        $data = $this->artistService->getArtist($id);
        return view('ArtistProfile',compact('data'));
    }
    public function search(Request $request){
        $data = $this->artistService->searchByname($request->name);
        return view('Artists',compact('data'));
    }
}
