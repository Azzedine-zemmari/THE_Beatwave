<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategorieServices;

class CategoryController extends Controller
{
    private $categorieService;
    public function __construct(CategorieServices $categorieService)
    {
        $this->categorieService = $categorieService;
    }
    public function all(){
        $data = $this->categorieService->get();
        return view('admin.CategorieTable',compact('data'));
    }
}
