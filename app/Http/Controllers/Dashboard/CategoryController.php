<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Category;
use Illuminate\Http\Request;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('dashboard.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $message = [
            'name.required' => 'Name is required'
        ];
        $this->validate($request, $rules, $message);

        Category::create($request->all());
        return Redirect::route('category.index')->with('success', 'Governorate Created success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $rules = [
            'name' => 'required'
        ];
        $message = [
            'name.required' => 'Name is required'
        ];
        $this->validate($request, $rules, $message);

        $category->update($request->all());
        return Redirect::route('category.index')->with('success', 'Category Updated success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return Redirect::route('category.index')->with('success', 'Category Deleted success');
    }
}
