<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::get();

    

        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255|string',
            'description'=>'required|max:255|string',
            'is_active'=>'sometimes'
        ]);

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_active' => $request->has('is_active')
        ]);

        return redirect('categories/create')->with('status','Category Created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category=Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name'=>'required|max:255|string',
            'description'=>'required|max:255|string',
            'is_active'=>'sometimes'
        ]);

        Category::FindOrFail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->back()->with('status','Category Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category=Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('status','Category Deleted !');
    }
}
