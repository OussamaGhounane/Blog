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
        $categories = Category::all();
        return view('admin.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'cover' => 'mimes:png,jpg,jpeg|max:5048',
        ]);

        $category = new Category();


        if ($request->hasFile('cover')) {
            $category->cover = $request->file('cover')->store('categories');
        }
        $category->name = $request->name;

        $category->save();

        return redirect()->route('categorie.index');

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
        $category = Category::findOrfail($id);
        return view('admin.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'cover' => 'mimes:png,jpg,jpeg|max:5048',
        ]);
        $category = new Category();
        $category = Category::findOrfail($id);

        if ($request->hasFile('cover')) {
            $category->cover = $request->file('cover')->store('categories');
        }
        $category->name = $request->name;

        $category->save();

        
        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->route('categorie.index');
    }
}
