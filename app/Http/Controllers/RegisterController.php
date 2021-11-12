<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jabatanlist = DB::table('jabatan')->get();
        $storelist = DB::table('data_toko')->get();
        return view('register/register', ['title' => 'Register Employee', 'jabatan' => $jabatanlist, 'store' => $storelist]);
    }
}
