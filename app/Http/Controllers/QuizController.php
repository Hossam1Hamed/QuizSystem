<?php

namespace App\Http\Controllers;

use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;

class QuizController extends Controller
{
    use HelperTrait;
    private $quizRepo;
    private $userRepo;
    
    public function __construct(QuizRepositoryInterface $quizRepoInterface,UserRepositoryInterface $userRepoInterface)
    {
        $this->quizRepo = $quizRepoInterface;
        $this->userRepo = $userRepoInterface;
    }
    public function index(){
        $questions = $this->quizRepo->getMainQuestions();
        
        return view('web.pages.quiz.index',compact('questions'));
    }
    public function sendResult(Request $request){
        $user = $this->userRepo->find($request->id , $request);
        $this->sendMailToTeacher($user,$user->name);
        $result = $this->correct_quiz($request);
        $this->sendMailToStudent($user,$result);
        session()->flash('check your email to get result');
        return redirect('/home');
    }
    public function correct_quiz(Request $request){
        $answers = $request->all();
        $marks = 0 ;
        foreach($answers as $key => $answer){
            if($key == 1 && $answer == 2 ){$marks++;}
            if($key == 6 && $answer == 7 ){$marks++;}
            if($key == 11 && $answer == 12 ){$marks++;}
        }
        if($marks >= 1){
            if($marks > $marks/2){
                return "Accepted";
            }else{
                return "Rejected";
            }
        }else{
            return "Rejected";
        }
    }
}
