<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InscriptionService;

class InscriptionController extends Controller
{
    private $inscriptionService;
    public function __construct(InscriptionService $inscriptionService)
    {
        $this->inscriptionService = $inscriptionService;
    }
    public function index(){
        $data = $this->inscriptionService->show();
        return view('organisateur.Inscription',compact('data'));
    }
    public function exportCSV(){
        return $this->inscriptionService->exportCSV();
    }
    public function show(){
        $data = $this->inscriptionService->showAll();
        return view('admin.AllInscriptionTable',compact('data'));
    }
    public function exportAllCSV(){
        return $this->inscriptionService->exportAllCSV();
    }
}
