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
        $selectedCategories = session('selectedCategories', []);

        return view('create', compact('categories', 'selectedCategories'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'name2' => 'required',
            'review' => 'required',
            'comment' => 'required',
            'callNumber' => 'required',
        ]);

        $item = new Item();
        $item->name = $request->input('name');
        $item->name2 = $request->input('name2');
        $item->review = $request->input('review');
        $item->comment = $request->input('comment');
        $item->callNumber = $request->input('callNumber');
        $item->save();

        $request->session()->put('item', $item);


        $categoryIds = $request->input('categories', []);
        $item->categories()->sync($categoryIds);

        return redirect('/list/confirm')->with('item', $item);
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
        $request->validate([
            'name' => 'required',
            'name2' => 'required',
            'review' => 'required',
            'comment' => 'required',
            'callNumber' => 'required',
        ]);

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

    public function confirm(Request $request)
    {
        $item = $request->session()->get('item');
        $selectedCategories = $request->session()->get('selectedCategories', []);

        $categories = Category::all();

        return view('confirm', compact('item', 'categories', 'selectedCategories'));
    }

    public function confirmForm(Request $request)
    {
        $item = $request->session()->get('item');
        $selectedCategories = $request->session()->get('selectedCategories', []);

        $categories = Category::all();

        return view('confirm', compact('item', 'categories', 'selectedCategories'));
    }

    public function store()
    {
        $itemData = session('itemData');

        $item = new Item();
        $item->name = $itemData['name'];
        $item->name2 = $itemData['name2'];
        $item->review = $itemData['review'];
        $item->comment = $itemData['comment'];
        $item->callNumber = $itemData['callNumber'];
        $item->save();

        $categoryIds = $itemData['categories'] ?? [];
        $item->categories()->sync($categoryIds);

        session()->forget('itemData');

        return redirect('/list')->with('success', 'Item created successfully!');
    }
}
