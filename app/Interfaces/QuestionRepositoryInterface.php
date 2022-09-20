<?php

namespace App\Interfaces;



interface QuestionRepositoryInterface
{
    function getMainQuestions();
    public function getChoicesByQuestion($id);
}