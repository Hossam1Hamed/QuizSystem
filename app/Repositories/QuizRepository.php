<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use app\Repositories\BaseRepository;
use App\Models\Quiz;

class QuizRepository extends BaseRepository implements QuizRepositoryInterface
{
    public function __construct(Quiz $model)
    {
        parent::__construct($model);
    }

}