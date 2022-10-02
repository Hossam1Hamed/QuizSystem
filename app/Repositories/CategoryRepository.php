<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    public function getAllCatsWithQuestions()
    {
        
    }
    public function findCategory($id)
    {
        return $this->model->find($id);
    }
    public function destroyCategory($id)
    {
        return $this->model->destroy($id);
    }
}