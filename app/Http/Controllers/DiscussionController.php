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

        $chatDiscussion = DB::table('discussion_chat')->where('id_discussion', '=', $id)->join('users', 'discussion_chat.id_user', '=', 'users.id')->select('discussions.*')->select('discussion_chat.*', 'users.name')->get();

        $getName = DB::table('discussions')->where('id', '=', $id)->get();
        $name = $getName[0]->discussion_name;

        $myId = Auth::user()->id;

        return view('discussion/chatdiscussion', ['title' => 'Discussion', 'discussion' => $chatDiscussion, 'name' => $name, 'myId' =>  $myId, 'idDiscussion' => $id]);
    }

    public function sendChat(Request $request)
    {
        $idDiscussion = $request->id;
        $chat = $request->message;
        $idPengirim = Auth::user()->id;
        $curTime = new \DateTime();

        $insert = DB::table('discussion_chat')->insert([
            'id_user' => $idPengirim,
            'id_discussion' => $idDiscussion,
            'chat' => $chat,
            'date' => $curTime->format("Y-m-d"),
            'time' => $curTime->format("H:i")
        ]);

        return redirect()->action(
            [DiscussionController::class, 'getChat'],
            ['id' => $idDiscussion]
        );
    }
}
