<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Category\AddCategoryRequest;
use App\Http\Requests\Web\Category\UpdateCategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoryRepo;
    public function __construct(CategoryRepositoryInterface $cateRepoInter)
    {
        $this->categoryRepo = $cateRepoInter;
    }
    public function index()
    {
        $categories = $this->categoryRepo->all();
        
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(AddCategoryRequest $request)
    {
        $category = $this->categoryRepo->create($request->all());
        if($category)
        {
            return redirect()->route('categories.index')->with('success','category added succeffuly');
        }else{
            return redirect()->route('categories.index')->with('error','category didn\'t added ... try again');
        }    
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $category = $this->categoryRepo->findCategory($id);
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $attributes = $request->all();
        $category = $this->categoryRepo->update($attributes , $id , $request);
        if($category)
        {
            return redirect()->route('categories.index')->with('success','category updated succeffuly');
        }else{
            return redirect()->route('categories.index')->with('error','category didn\'t updated ... try again');
        }
    }

    public function destroy($id)
    {
        $category = $this->categoryRepo->destroyCategory($id);
        if($category)
        {
            return redirect()->route('categories.index')->with('success','category deleted succeffuly');
        }else{
            return redirect()->route('categories.index')->with('error','category didn\'t deleted ... try again');
        }
    }
}
