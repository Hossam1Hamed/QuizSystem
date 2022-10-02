<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Question\AddQuestionRequest;
use App\Http\Requests\Web\Question\UpdateQuestionRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $questionRepo;
    private $categoryRepo;
    public function __construct(QuestionRepositoryInterface $questionRepoInterface,CategoryRepositoryInterface $categoryRepoInterface)
    {
        $this->questionRepo = $questionRepoInterface;
        $this->categoryRepo = $categoryRepoInterface;
    }   
    public function index()
    {
        $questions = $this->questionRepo->getQuestionsWithCategories();
        return view('dashboard.questions.index',compact('questions'));
    }

    public function create()
    {
        $categories = $this->categoryRepo->all();
        return view('dashboard.questions.create',compact('categories'));
    }

    public function store(AddQuestionRequest $request)
    {
        $question = $this->questionRepo->create($request->all());
        if($question)
        {
            return redirect()->route('questions.index')->with('success','Question Added Sucessefully');
        }else{
            return redirect()->route('questions.index')->with('error','Question didn\'t Added');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $question = $this->questionRepo->findQuestion($id);
        $categories = $this->categoryRepo->all();
        return view('dashboard.questions.edit',compact('question','categories'));
    }

    public function update(UpdateQuestionRequest $request, $id)
    {
        $attributes = $request->all();
        $question = $this->questionRepo->update($attributes , $id , $request);
        if($question)
        {
            return redirect()->route('questions.index')->with('success','Question Updated Sucessefully');
        }else{
            return redirect()->route('questions.index')->with('error','Question didn\'t Updated');
        }
    }

    public function destroy($id)
    {
        $question = $this->questionRepo->destroyQuestion($id);
        if($question)
        {
            return redirect()->route('questions.index')->with('success','Question Deleted Sucessefully');
        }else{
            return redirect()->route('questions.index')->with('error','Question didn\'t Deleted');
        }
    }
}
