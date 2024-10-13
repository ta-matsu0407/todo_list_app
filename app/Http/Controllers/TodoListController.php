<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;


class TodoListController extends Controller
{
    public function index()
    {
        $values = TodoList::all();

        //dd($values);
        //phpのdie + var_dump のようなもの(dieで処理を止めて、var_dumpで内容を確認)

        return view('todo_list.index', compact('values'));
        //resources/views/todoLists/todoList.blade.php
        //compact関数で変数に入れたものをView側に渡す(変数ではなく、文字列で渡す)
    }

}
