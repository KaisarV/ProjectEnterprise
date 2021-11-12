<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->id_jabatan == 1) {
            $people = DB::table('users')
                ->where('users.id', '!=', Auth::user()->id)
                ->where('users.id_jabatan', '!=', 2)
                ->join('jabatan', 'jabatan.id', '=', 'users.id_jabatan')
                ->select('users.*', 'jabatan.jabatan')
                ->get();

            return view('deleteemployee/delete', [
                'title' => 'Delete Employee',
                'listpeople' => $people
            ]);
        }
    }

    public function getPeople(Request $request)
    {
        if (Auth::user()->id_jabatan == 1) {
            $name = $request->people;

            $people = DB::table('users')->where('name', 'like', '%' . $name . '%')
                ->where('users.id', '!=', Auth::user()->id)
                ->where('users.id_jabatan', '!=', 2)
                ->join('jabatan', 'jabatan.id', '=', 'users.id_jabatan')
                ->select('users.*', 'jabatan.jabatan')
                ->paginate();

            return view('deleteemployee/delete', [
                'title' => 'Delete Employee',
                'listpeople' => $people
            ]);
        }
    }

    public function deletePeople($id)
    {

        if (Auth::user()->id_jabatan == 1) {
            $delete = DB::table('users')->where('id', '=', $id)
                ->delete();
            return redirect()->action(
                [DeleteEmployeeController::class, 'index']
            );
        }
    }
}
