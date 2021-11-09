<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $profiles = DB::table('users')->where('id', '=', $id)->get();

        foreach ($profiles as $p) {
            if ($p->id == $id) {
                break;
            }
        }

        $positions = DB::table('jabatan')->where('id', '=', $p->id_jabatan)->get();

        foreach ($positions as $j) {
            if ($j->id == $p->id) {
                break;
            }
        }

        return view('profile/profile', ['title' => 'Profile', 'profile' => $p, 'jabatan' => $j]);
    }
}
