<?php

namespace App\Repositories;

use App\Interfaces\OptionRepositoryInterface;
use App\Models\Option;
class OptionRepository extends BaseRepository implements OptionRepositoryInterface
{
    public function __construct(Option $model)
    {
        parent::__construct($model);
    }

    public function getOptionsWithQuestions()
    {
        $options = $this->model->with('question')->get();
        return $options;
    }
    public function getOneOptionWithQuestion($id)
    {
        return $this->model->where('id',$id)->with('question')->get();
    }
}