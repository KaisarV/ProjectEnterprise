<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function index()
    {

        $this->middleware('auth');
        $todo = Todolist::all()->where('id_user', '=', Auth::user()->id);
        return view('todo/todo', [
            'title' => 'Todo List',
            'todo' => $todo,

        ]);
    }

    public function create()
    {
        return view('todo/create', [
            'title' => 'Todo List',
        ]);
    }

    public function getTodo()
    {
    }

    public function insertTodo(Request $request)
    {
        $query = Todolist::insert([
            "text" => $request['todo'],
            "id_user" => Auth::user()->id
        ]);


        return redirect('/todo');
    }
}
