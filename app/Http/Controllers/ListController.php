<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id')->get();

        return view('list', compact('items'));
    }

    public function createForm()
    {
        return view('create');
    }

    public function create(Request $request)
    {
        // バリデーションなどの処理を追加することができます

        $item = new Item();
        $item->name = $request->input('name');
        $item->name2 = $request->input('name2');
        $item->category = implode(',', $request->input('category'));
        $item->review = $request->input('review');
        $item->comment = $request->input('comment');
        $item->callNumber = $request->input('callNumber');
        $item->save();

        return redirect('/list')->with('success', 'Item created successfully!');
    }
}
