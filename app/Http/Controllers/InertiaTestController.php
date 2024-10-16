<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
//controllerからviewに渡すときに、Inertia::renderが必要なので、use文が必要
use App\Models\Test;
//DBにデータを保存する際は、modelsを使用した方が使いやすい

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index', [
            'blogs' => Test::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
        return Inertia::render('Inertia/Show',
    [
        'id' => $id,
        'blog' => Test::findOrFail($id)
        //ex:id「１」が渡ってきたら、1番目の情報を取得して、変数blogでview側に渡す
    ]);
    }

    public function store(Request $request)
    //inputタグで入力された内容を$request変数で受け取る
    {

        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);
        //バリデーションに引っ掛かったら、view側にerrorsというオブジェクトが渡る

        $TodoList = new Test;
        $TodoList->title = $request->title;
        $TodoList->content = $request->content;
        $TodoList->save();
        //DBの保存

        return to_route('inertia.index')
        //リダイレクト
        ->with([
            'message' => '登録しました。'
        ]);
        // リダイレクトに続けて、フラッシュメッセージ
        // 連想配列にすれば、複数のキーとバリューをMiddlewareに渡す事ができる
    }

    public function delete($id)
    {
        $book = Test::findOrFail($id);
        $book->delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました。'
        ]);
    }
}
