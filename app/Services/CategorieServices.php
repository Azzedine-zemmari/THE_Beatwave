<?php 

namespace App\Services;
use App\Repositories\Contracts\CategorieInterface;

class CategorieServices{
    private $categorieRepository;
    public function __construct(CategorieInterface $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }
    public function get(){
        return $this->categorieRepository->getAll();
    }
}