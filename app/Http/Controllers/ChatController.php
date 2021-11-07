<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    }

    public function getChat($id)
    {

        $chat = DB::table('chats')->where('id_pengirim', '=', $id)
            ->orWhere('id_penerima', '=', $id)
            ->paginate();

        $person =  DB::table('users')->where('id', '=', $id)
            ->paginate();

        return view('chat/chat', [
            'title' => 'Chat',
            'chat' => $chat,
            'person' => $person[0]->name,
            'id' => $id
        ]);
    }

    public function sendChat(Request $request)
    {

        $id = $request->id;
        $chat = $request->message;
        $curTime = new \DateTime();

        $insert = DB::table('chats')->insert([
            'id_pengirim' => Auth::user()->id,
            'id_penerima' => $id,
            'chat' => $chat,
            'date' => $curTime->format("Y-m-d"),
            'time' => $curTime->format("H:i")
        ]);

        $person =  $people = DB::table('users')->where('id', '=', $id)
            ->paginate();


        return redirect()->action(
            [ChatController::class, 'getChat'],
            ['id' => $id]
        );
    }
}
