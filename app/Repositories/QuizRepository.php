<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use App\Models\Question;

class QuizRepository extends BaseRepository implements QuizRepositoryInterface
{
    public function __construct(Question $model)
    {
        parent::__construct($model);   
    }

    function getMainQuestions(){
        $questions = Question::where('parent_id', null)->with('choices')->get();
        return $questions;
    }
    public function getChoicesByQuestion($id){
        return "jsuh";
    }
}