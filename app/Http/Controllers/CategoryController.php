<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategorieServices;
use Illuminate\Validation\ValidationException;
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
    public function create(){
        return view('admin.createCategorie');
    }
    public function insert(Request $request){
        try{
            $data = $request->all();
            $this->categorieService->addCategorie($data);
            return redirect()->back()->with('success','categorie created successfully');
        }catch(ValidationException $e){
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }
    public function modifier(int $id){
        $data = $this->categorieService->findCategory($id);
        return view('admin.createCategorie',compact('data'));
    }
    public function update(Request $request){
        try{
            $data = $request->all();
            $this->categorieService->UpdateCategory($data);
            return redirect()->back()->with('success','categorie updated successfully');
        }catch(ValidationException $e){
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }
    public function delete(int $id){
        $categorie = $this->categorieService->destroy($id);
        if($categorie){
            return redirect()->back()->with('success','categorie deleted successfully');
        }
        else{
            return redirect()->back()->with('error','something went wrong');
        }
    }
}
