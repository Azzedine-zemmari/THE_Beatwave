<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategorieInterface;

class CategorieRepository implements CategorieInterface{
    public function getAll()
    {
        return Category::all();
    }
    public function create(array $data)
    {
        return Category::create([
            'nom'=>$data['nom'],
            "description" => $data['description']
        ]);
    }
}