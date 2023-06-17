<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Validation\Rule;
use App\Http\Requests\CreateForm;

class ListController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id')->get();

        return view('list', compact('items'));
    }

    public function createForm()
    {
        $itemData = session('item', [
            'name' => '',
            'name2' => '',
            'category' => [],
            'review' => '',
            'comment' => '',
            'callNumber' => ''
        ]);

        return view('create')->with('itemData', $itemData);
    }

    public function create(CreateForm $request)
    {
        $itemData = $request->validated();

        session(['item' => $itemData]);

        return redirect()->route('show.confirm');
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
        $item->category = implode(',', $request->input('category'));
        $item->review = $request->input('review');
        $item->comment = $request->input('comment');
        $item->callNumber = $request->input('callNumber');

        $item->save();

        return redirect('/list')->with('success', 'Item updated successfully!');
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('/list')->with('success', 'Item deleted successfully!');
    }

    public function showConfirm()
    {
        // セッションからアイテムデータを取得する
        $itemData = session('item');

        // 確認画面ビューを表示する
        return view('confirm')->with('itemData', $itemData);
    }

    public function confirm(CreateForm $request)
    {
        $itemData = session('item');

        // $itemData が null の場合にエラーハンドリングを行う
        if ($itemData === null) {
            return redirect()->back()->with('error', 'アイテムデータが見つかりませんでした。');
        }

        $item = new Item;
        $item->name = $itemData['name'];
        $item->name2 = $itemData['name2'];
        $item->category = $itemData['category'];
        $item->review = $itemData['review'];
        $item->callNumber = $itemData['callNumber'];
        $item->comment = $itemData['comment'];

        // レコードの保存
        $item->save();

        // データの保存が完了したらセッションからアイテムデータを削除する
        session()->forget('item');

        // 保存完了ページにリダイレクトする
        return redirect()->route('list.index');
    }
}
