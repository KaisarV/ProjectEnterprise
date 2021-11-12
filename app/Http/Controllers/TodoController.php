<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

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
        $todo = DB::table('todolists')->where('id_user', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();

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
        $curTime = new \DateTime();
        $query = Todolist::insert([
            "title" => $request['title'],
            "text" => $request['todo'],
            'date' => $curTime->format("Y-m-d"),
            'time' => $curTime->format("H:i"),
            "id_user" => Auth::user()->id
        ]);
        return redirect('/todo');
    }

    public function deleteTodo($id)
    {

        $todo2 = Todolist::all()->where('id', '=', $id);
        $idUserNow = Auth::user()->id;
        $cek = 0;

        for ($i = 0; $i < count($todo2); $i++) {
            if ($todo2[$i]->id_user == $idUserNow) {
                $cek = 1;
            }
        }

        if ($cek == 1) {
            $todo2 = DB::table('todolists')
                ->where('id', '=', $id)
                ->delete();
        }

        $todo = Todolist::all()->where('id_user', '=', Auth::user()->id);

        return view('todo/todo', ['todo' => $todo, 'title' => 'Todo List', 'Method' => '']);
    }
}
