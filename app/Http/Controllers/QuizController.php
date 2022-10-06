<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\Quiz\AddQuizRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\OptionRepositoryInterface;
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
    private $categoryRepo;
    private $optionRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepoInterface, OptionRepositoryInterface $optionRepoInterface, QuestionRepositoryInterface $questionRepoInterface, UserRepositoryInterface $userRepoInterface, QuizRepositoryInterface $quizRepoInterface)
    {
        $this->categoryRepo = $categoryRepoInterface;
        $this->optionRepo = $optionRepoInterface;
        $this->questionRepo = $questionRepoInterface;
        $this->userRepo = $userRepoInterface;
        $this->quizRepo = $quizRepoInterface;
    }
    public function index()
    {
        $categories = $this->categoryRepo->getAllCatsWithQuestionsWithOptions();
        return view('web.pages.quiz.index', compact('categories'));
    }
    public function create()
    {
        return view('web.pages.quiz.create');
    }
    public function store(AddQuizRequest $request)
    {
        $quiz = $this->quizRepo->create($request->all());

        return redirect()->route('question.create')->with('success', 'quiz added succeffuly ... please fill your questions');
    }
    public function sendResult(Request $request)
    {

        $options = $this->optionRepo->getOptionsAnswers(array_values($request->input('questions')), $request);
        $result = auth()->user()->results()->create([
            'total_points' => $options->sum('points')
        ]);
        $questions = $options->mapWithKeys(function ($option) {
            return [
                $option->question_id => [
                    'option_id' => $option->id,
                    'points' => $option->points
                ]
            ];
        })->toArray();
        $result->questions()->sync($questions);
        return redirect()->route('results.show', $result->id);
    }
    public function correct_quiz(Request $request)
    {
        $answers = $request->all();
        $marks = 0;
        foreach ($answers as $key => $answer) {
            if ($key == 1 && $answer == 2) {
                $marks++;
            }
            if ($key == 6 && $answer == 7) {
                $marks++;
            }
            if ($key == 11 && $answer == 12) {
                $marks++;
            }
        }
        if ($marks >= 1) {
            if ($marks > $marks / 2) {
                return "Accepted";
            } else {
                return "Rejected";
            }
        } else {
            return "Rejected";
        }
    }
}
