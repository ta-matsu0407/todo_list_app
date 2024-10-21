<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretodoRequest;
use App\Http\Requests\UpdatetodoRequest;
use App\Models\todo;
use Inertia\Inertia;
use Carbon\Carbon;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::select('id', 'title', 'status', 'due_date')
        ->get();
        //get()で型が確定

        return Inertia::render('Todos/Index', [
            'todos' => $todos
        ]); //第一引数にコンポーネント名,第二引数に連想配列で、変数でデータを渡す
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Todos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretodoRequest $request)
    {
        // 日付のフォーマットを確認（YYYY-MM-DD）
        $formattedDueDate = Carbon::parse($request->due_date)->format('Y-m-d');

        Todo::create([
            'title' => $request->title,
            'memo' => $request->memo,
            'due_date' => $formattedDueDate
        ]);

        return to_route('todos.index')
        //to_routeは、Laravel9で導入されたヘルパーメソッド、指定されたルートにリダイレクト
        ->with([
            'message' => '登録しました。',
            'status' => 'success'
        ]);
        // リダイレクトに続けて、フラッシュメッセージ
        // 連想配列にすれば、複数のキーとバリューをMiddlewareに渡す事ができる
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        return Inertia::render('Todos/Show', [
            'todo' => $todo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        return Inertia::render('Todos/Edit', [
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetodoRequest  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetodoRequest $request, todo $todo)
    {
        // dd($todo->title, $request->title);
        // todoにデータベースの値、requestに入力した値が入ってくる

        $todo->title = $request->title;
        $todo->memo = $request->memo;
        $todo->due_date = $request->due_date;
        $todo->status = $request->status;
        $todo->save();

        return to_route('todos.index')
        ->with([
            'message' => '更新しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        //
    }
}
