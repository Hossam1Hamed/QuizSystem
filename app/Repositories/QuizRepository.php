<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;

class QuizRepository extends BaseRepository implements QuizRepositoryInterface
{
    public function __construct(Quiz $model)
    {
        parent::__construct($model);
    }
    public function getLastQuiz()
    {
        $quiz = DB::table('quizzes')->latest()->first();
        return $quiz;
    }
}