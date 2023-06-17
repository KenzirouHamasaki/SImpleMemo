<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    // カテゴリー管理/登録ページの表示
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    // カテゴリーの新規登録
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('category.index')->with('success', 'カテゴリーを登録しました');
    }

    // カテゴリー編集ページの表示
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    // カテゴリーの更新
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('category.index')->with('success', 'カテゴリーを更新しました');
    }

    // カテゴリーの削除
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'カテゴリーを削除しました');
    }
}
