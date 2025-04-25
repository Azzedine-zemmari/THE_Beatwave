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
    public function findById(int $id)
    {
        return Category::where('id',$id)->first();
    }
    public function update(int $id, array $data)
    {
        $category = $this->findById($id);
        return $category->update($data);
    }
}