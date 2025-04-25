<?php 

namespace App\Services;
use App\Repositories\Contracts\CategorieInterface;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class CategorieServices{
    private $categorieRepository;
    public function __construct(CategorieInterface $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }
    public function get(){
        return $this->categorieRepository->getAll();
    }
    public function addCategorie(array $data){
        $validate = Validator::make($data,[
            'nom' => 'required|string|max:20',
            'description' => 'required|string'
        ]);

        if($validate->fails()){
            throw new ValidationException($validate);
        }
        return $this->categorieRepository->create($data);
    }
    public function findCategory(int $id){
        return $this->categorieRepository->findById($id);
    }
    public function UpdateCategory(array $data){
        $validate = Validator::make($data,[
            'nom' => "required|string|max:20",
            "description" => "required|string",
        ]);

        if($validate->fails()){
            throw new ValidationException($validate);
        }
        $id = $data['id'];
        return $this->categorieRepository->update($id,$data);
    }
}