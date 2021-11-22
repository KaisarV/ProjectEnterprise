<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $discussion = DB::table('discussions')
            ->join('discussion_member', 'discussions.id', '=', 'discussion_member.id_discussion')->where('discussion_member.id_user', '=', Auth::user()->id)->select('discussions.*')
            ->get();



        return view('discussion/discussion', ['title' => 'Discussion', 'discussion' => $discussion]);
    }

    public function getChat($id)
    {
        // $chatDiscussion = DB::table('discussion_chat')->where('id_discussion', '=', $id)->join('discussions', 'discussions.id', '=', 'discussion_chat.id_discussion')->select('discussions.*', 'discussions.discussion_name')->get();

        $cek = DB::table('discussion_member')->where('id_discussion', '=', $id)->where('id_user', '=', Auth::user()->id)->get();

        if ($cek != null) {
            $chatDiscussion = DB::table('discussion_chat')->where('id_discussion', '=', $id)->join('users', 'discussion_chat.id_user', '=', 'users.id')->select('discussions.*')->select('discussion_chat.*', 'users.name', 'users.foto')->get();

            $getName = DB::table('discussions')->where('id', '=', $id)->get();
            $name = $getName[0]->discussion_name;

            $myId = Auth::user()->id;

            return view('discussion/chatdiscussion', ['title' => 'Discussion', 'discussion' => $chatDiscussion, 'name' => $name, 'myId' =>  $myId, 'idDiscussion' => $id]);
        }
    }

    public function sendChat(Request $request)
    {
        $idDiscussion = $request->id;
        $chat = $request->message;
        $idPengirim = Auth::user()->id;
        $curTime = new \DateTime();

        // menyimpan data file yang diupload ke variabel $file
        $nama_file = null;

        $file = $request->file('file');

        if ($file != null) {
            $this->validate($request, [
                'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $nama_file = time() . "_" . $file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'discussion_file';
            $file->move($tujuan_upload, $nama_file);
        }

        $insert = DB::table('discussion_chat')->insert([
            'id_user' => $idPengirim,
            'id_discussion' => $idDiscussion,
            'chat' => $chat,
            'dir' => $nama_file,
            'date' => $curTime->format("Y-m-d"),
            'time' => $curTime->format("H:i")
        ]);

        return redirect()->back();
    }

    public function createPage()
    {
        if (Auth::user()->id_jabatan == 1) {
            return view('discussion/create', ['title' => 'Create Discussion']);
        }
    }

    public function create(Request $request)
    {
        if (Auth::user()->id_jabatan == 1) {
            $curTime = new \DateTime();

            $insert = DB::table('discussions')->insert([
                'discussion_name' => $request->name,
                'description' => $request->description,
                'tanggal_dibuat' => $curTime->format("Y-m-d")
            ]);

            $id = DB::getPdo()->lastInsertId();

            DB::table('discussion_member')->insert([
                'id_discussion' => $id,
                'id_user' => Auth::user()->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            return redirect()->action(
                [DiscussionController::class, 'getChat'],
                ['id' => $id]
            )->with('success', 'your message,here');
        }
    }

    public function delete($id)
    {
        if (Auth::user()->id_jabatan == 1) {
            DB::table('discussion_chat')->where('id_discussion', '=', $id)->delete();

            DB::table('discussion_member')->where('id_discussion', '=', $id)->delete();

            DB::table('discussions')->where('id', '=', $id)->delete();

            return redirect()->back()->with('success', 'your message,here');
        } else {
            return redirect()->back();
        }
    }

    public function deleteMemberPage($id)
    {
        if (Auth::user()->id_jabatan == 1) {
            $people = DB::table('discussion_member')->where('id_discussion', '=', $id)->where('id_user', '!=', Auth::user()->id)->join('users', 'users.id', '=', 'discussion_member.id_user')->get();

            return view('discussion/adddelete', [
                'title' => 'Discussion', 'listpeople' => $people, 'id' => $id,
                'operation' => 'delete'
            ]);
        } else {
            return redirect()->action(
                [DiscussionController::class, 'getChat']
            );
        }
    }

    public function deleteMember($id1, $id2)
    {
        if (Auth::user()->id_jabatan == 1) {
            $people = DB::table('discussion_member')->where('id_discussion', '=', $id1)->where('id_user', '=', $id2)->delete();

            return redirect()->back()->with('success1', 'your message,here');
        } else {
            return redirect()->action(
                [DiscussionController::class, 'getChat'],
                ['id' => $id1]
            );
        }
    }

    public function addMemberPage($id)
    {
        if (Auth::user()->id_jabatan == 1) {
            $people = DB::table('users')->select('id', 'name')->whereNotIn('users.id', DB::table('discussion_member')->select('discussion_member.id_user')->where('discussion_member.id_discussion', '=', $id))->get();

            return view('discussion/adddelete', [
                'title' => 'Discussion', 'listpeople' => $people, 'id' => $id,
                'operation' => 'add'
            ]);
        } else {
            return redirect()->action(
                [DiscussionController::class, 'getChat']
            );
        }
    }
    public function addMember($id1, $id2)
    {
        if (Auth::user()->id_jabatan == 1) {
            DB::table('discussion_member')->insert([
                'id_discussion' => $id1,
                'id_user' => $id2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            return redirect()->back()->with('success2', 'your message,here');
        } else {
            return redirect()->action(
                [DiscussionController::class, 'getChat'],
                ['id' => $id1]
            );
        }
    }
}
