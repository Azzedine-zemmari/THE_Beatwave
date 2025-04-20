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
}
