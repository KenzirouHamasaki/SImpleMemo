<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ListController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id')->get();

        return view('list', compact('items'));
    }

    public function createForm()
    {
        $categories = Category::all();
        $selectedCategories = [];

        return view('create', compact('categories', 'selectedCategories'));
    }

    public function create(Request $request)
    {
        dd($request->all());
        $action = $request->input('action');
        $inputs = $request->except('action');

        if ($action !== 'submit') {
            return redirect()
                ->route('list.createForm')
                ->withInput($inputs);
        } else {
            $item = new Item();
            $item->name = $request->input('name');
            $item->name2 = $request->input('name2');
            $item->review = $request->input('review');
            $item->comment = $request->input('comment');
            $item->callNumber = $request->input('callNumber');
            $item->save();

            $categoryIds = $request->input('categories[]');
            $item->categories()->sync($categoryIds);

            return redirect('/list')->with('success', 'Item created successfully!');
        }
    }

    public function confirm(Request $request)
    {


        $inputs = $request->all();

        return view('confirm', ['inputs' => $inputs,]);
    }

    public function content($id)
    {
        $item = Item::findOrFail($id);
        return view('content', compact('item'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('create', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = Item::findOrFail($id);
        $item->name = $request->input('name');
        $item->name2 = $request->input('name2');
        $item->review = $request->input('review');
        $item->comment = $request->input('comment');
        $item->callNumber = $request->input('callNumber');

        $item->save();

        $categoryIds = $request->input('categories', []);
        $item->categories()->sync($categoryIds);

        return redirect('/list')->with('success', 'Item updated successfully!');
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('/list')->with('success', 'Item deleted successfully!');
    }
}
