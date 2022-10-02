<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Option\AddOptionRequest;
use App\Http\Requests\Web\Option\UpdateOptionRequest;
use App\Interfaces\OptionRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    private $optionRepo;
    private $questionRepo;
    public function __construct(OptionRepositoryInterface $optionRepoInterface,QuestionRepositoryInterface $questionRepoInterface)
    {
        $this->optionRepo = $optionRepoInterface;
        $this->questionRepo = $questionRepoInterface;
    }
    public function index()
    {
        $options = $this->optionRepo->getOptionsWithQuestions();
        return view('dashboard.options.index',compact('options'));
    }

    public function create()
    {
        $questions = $this->questionRepo->all();
        return view('dashboard.options.create',compact('questions'));
    }

    public function store(AddOptionRequest $request)
    {
        $option = $this->optionRepo->create($request->all());
        if($option)
        {
            return redirect()->route('options.index')->with('success','Option Added Sucessefully');
        }else{
            return redirect()->route('options.index')->with('error','Option didn\'t Added');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id , Request $request)
    {
        $option = $this->optionRepo->getOneOptionWithQuestion($id);
        $questions = $this->questionRepo->all();
        return view('dashboard.options.edit',compact('option','questions'));
    }

    public function update(UpdateOptionRequest $request, $id)
    {
        $option = $this->optionRepo->update($request->all(),$id,$request);
        if($option)
        {
            return redirect()->route('options.index')->with('success','Option Updated Sucessefully');
        }else{
            return redirect()->route('options.index')->with('error','Option didn\'t Updated');
        }
    }

    public function destroy($id,Request $request)
    {
        $option = $this->optionRepo->destroy($id,$request);
        if($option)
        {
            return redirect()->route('options.index')->with('success','Option Deleted Sucessefully');
        }else{
            return redirect()->route('options.index')->with('error','Option didn\'t Deleted');
        }
    }
}
