<?php

namespace App\Http\Controllers;

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
        $people = DB::table('users')->get();

        return view('findpeople/find', [
            'title' => 'Find',
            'listpeople' => $people
        ]);
    }

    public function getPeople(Request $request)
    {

        $name = $request->people;

        $people = DB::table('users')->where('name', 'like', '%' . $name . '%')->paginate();
        return view('findpeople/find', [
            'title' => 'Find',
            'listpeople' => $people
        ]);
    }
}
