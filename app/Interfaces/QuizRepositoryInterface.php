<?php

namespace App\Interfaces;



interface QuizRepositoryInterface
{
    function getMainQuestions();
    public function getChoicesByQuestion($id);
}