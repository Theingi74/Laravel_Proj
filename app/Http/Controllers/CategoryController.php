<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$categoryData = Category::paginate(5);
    	return view('category.category_home',compact('categoryData'));
    }

    public function show(Category $category) {
    	/*$this->authorize('view',$category);*/
        return view('category.show_category',compact('category'));
    }

    public function create() {
    	$category = Category::all();
    	return view('category.create_category',compact('category'));
    }

    public function store(Request $request,Category $category) {
    	$validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);
    	$category =Category::create($validatedData);
       return redirect('category')->with("session_message","Category has been Successfully Inserted!!");;
    }

    public function edit($id) {
    	$data = Category::find($id);
    	return view('category.edit_category',compact('data'));
    }

    public function update(Category $category, Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
       ]);

        $category->update($validatedData);
        return redirect('category')->with("session_message","Category has been Successfully Updated!!");

    }

    public function destroy(Category $category) {
        $category->delete();
        session()->flash("session_message","Category has been Successfully Deleted!");
        return redirect('category');
    }
}
