<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
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
    public function getQuestionsWithCategories()
    {
        $questions = $this->model->with('category')->get();
        return $questions;
    }
    public function findQuestion($id)
    {
        return $this->model->where('id',$id)->with('category')->get();
    }
    public function destroyQuestion($id)
    {
        return $this->model->destroy($id);
    }
}