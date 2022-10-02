<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\Quiz\AddQuizRequest;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Repositories\QuizRepository;
use Illuminate\Http\Request;
use App\Traits\HelperTrait;

class QuizController extends Controller
{
    use HelperTrait;
    private $questionRepo;
    private $userRepo;
    private $quizRepo;
    
    public function __construct(QuestionRepositoryInterface $questionRepoInterface,UserRepositoryInterface $userRepoInterface,QuizRepositoryInterface $quizRepoInterface)
    {
        $this->questionRepo = $questionRepoInterface;
        $this->userRepo = $userRepoInterface;
        $this->quizRepo = $quizRepoInterface;
    }
    public function index(){
        $questions = $this->questionRepo->getMainQuestions();
        
        return view('web.pages.quiz.index',compact('questions'));
    }
    public function create(){
        return view('web.pages.quiz.create');
    }
    public function store(AddQuizRequest $request){
        $quiz = $this->quizRepo->create($request->all());
        return redirect()->route('question.create')->with('success','quiz added succeffuly ... please fill your questions');
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
