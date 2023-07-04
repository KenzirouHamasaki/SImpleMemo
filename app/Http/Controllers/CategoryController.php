<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = $user->categories()->orderBy('id')->get();
        //$categories = Category::orderBy('id')->get();
        return view('categories', compact('categories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Category::create([
        //     'name' => $request->input('category_name'),
        // ]);
        $user = Auth::user();

        $category = new Category([
            'name' => $request->input('category_name'),
        ]);

        $user->categories()->save($category);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categoriesEdit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->input('category_name'),
        ]);

        return redirect()->route('categories.index');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
