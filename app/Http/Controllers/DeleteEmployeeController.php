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
            if ($id > 3) {
                $deleteDataUserCabang = DB::table('data_user_cabang')->where('id_user', '=', $id)
                    ->delete();
            }

            $deleteChat = DB::table('chats')->where('id_pengirim', '=', $id)
                ->orWhere('id_penerima', '=', $id)
                ->delete();

            $deleteDiscussionChat = DB::table('discussion_chat')->where('id_user', '=', $id)->delete();

            $deleteMemberDiscussion = DB::table('discussion_member')->where('id_user', '=', $id)->delete();

            $deleteMemberFeedback = DB::table('feedback')->where('id_user', '=', $id)->delete();

            $deleteTodoLists = DB::table('todolists')->where('id_user', '=', $id)
                ->delete();

            $deleteUser = DB::table('users')->where('id', '=', $id)
                ->delete();

            return redirect()->action(
                [DeleteEmployeeController::class, 'index']
            )->with('success', 'The success message!');;
        }
    }
}
