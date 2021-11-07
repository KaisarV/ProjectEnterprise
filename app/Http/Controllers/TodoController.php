<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $todo = Todolist::all()->where('id_user', '=', Auth::user()->id);
        return view('todo/todo', [
            'title' => 'Todo List',
            'todo' => $todo

        ]);
    }

    public function create()
    {
        return view('todo/create', [
            'title' => 'Todo List',
        ]);
    }


    public function insertTodo(Request $request)
    {
        $query = Todolist::insert([
            "title" => $request['title'],
            "text" => $request['todo'],
            "id_user" => Auth::user()->id
        ]);
        return redirect('/todo');
    }

    public function deleteTodo($id)
    {

        $todo2 = Todolist::all()->where('id', '=', $id);

        if (Auth::user()->id == $todo2[0]->id_user) {
            $todo2 = DB::table('todolists')
                ->where('id', '=', $id)
                ->delete();
        }

        $todo = Todolist::all()->where('id_user', '=', Auth::user()->id);

        return view('todo/todo', ['todo' => $todo, 'title' => 'Todo List', 'Method' => '']);
    }
}
