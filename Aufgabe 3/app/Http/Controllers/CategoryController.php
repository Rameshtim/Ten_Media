<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		// dd();
		$categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }
	
    /**
	 * Show the form for creating a new resource.
     */
	public function create()
    {
		return view('categories.create');
    }
	
    /**
	 * Store a newly created resource in storage.
     */
	public function store(StoreCategoryRequest $request)
    {
		$data = $request->only(['name']);
		$category = Category::create($data);
		return redirect()->route('category.index', $category)->with('success', 'Neue Category gespeichert');
    }


    /**
	 * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
	public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
		$data = $request->only(['name']);
        $category->update($data);
		return redirect(route('category.index'))->with('success', 'Erfolgreich Aktualisiert');
    }
	
    /**
	 * Remove the specified resource from storage.
     */
	public function destroy(Category $category)
    {
		$category->delete();
		return redirect(route('category.index'))->with('success', 'Erfolgreich gelöscht');
    }
}
