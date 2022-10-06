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
    public function getAllCatsWithQuestionsWithOptions()
    {
        return $this->model->with(['questions'=>function($query){
            $query->inRandomOrder()
                ->with(['options' => function($query){
                    $query->inRandomOrder();
                }]);
        }])->whereHas('questions')->get();
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