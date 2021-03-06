<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FindPeopleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $myId = Auth::user()->id;
        $people = DB::table('users')->where('users.id', '!=', Auth::user()->id)->join('jabatan', 'users.id_jabatan', '=', 'jabatan.id')
            ->select('users.*', 'jabatan.jabatan')->get();



        return view('findpeople/find', [
            'title' => 'Find',
            'listpeople' => $people
        ]);
    }

    public function getPeople(Request $request)
    {

        $name = $request->people;

        $people = DB::table('users')->where('name', 'like', '%' . $name . '%')
            ->where('users.id', '!=', Auth::user()->id)->join('jabatan', 'users.id_jabatan', '=', 'jabatan.id')
            ->select('users.*', 'jabatan.jabatan')->get();

        return view('findpeople/find', [
            'title' => 'Find',
            'listpeople' => $people
        ]);
    }
}
