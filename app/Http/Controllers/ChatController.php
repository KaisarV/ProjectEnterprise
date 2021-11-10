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
        // $id = [];
        $idAuth = Auth::user()->id;
        $chat = DB::table('chats')->where('id_pengirim', '=', $idAuth)
            ->orWhere('id_penerima', '=',  $idAuth)
            ->orderBy('id', 'DESC')->get();

        // $tmpId = 0;

        // foreach ($chat as $c) {
        //     $cek = 0;
        //     if ($c->id_penerima != $idAuth) {
        //         $tmpId = $c->id_penerima;
        //     }
        //     if ($c->id_pengirim != $idAuth) {
        //         $tmpId = $c->id_pengirim;
        //     }

        //     for ($i = 0; $i < count($id); $i++) {
        //         if ($tmpId == $id[$i]) {
        //             //Bila id ada di dalam array $id maka cek berubah menjadi 1
        //             $cek = 1;
        //         }
        //     }

        //     if ($cek == 0) {
        //         array_push($id, $tmpId);
        //     }
        // }

        return view('chat/chats', [
            'title' => "Chat",
            'chat' => $chat,
            'myId' => Auth::user()->id
        ]);
    }

    public function getChat($id)
    {

        $chat = DB::table('chats')->where('id_pengirim', '=', $id)
            ->where('id_penerima', '=', Auth::user()->id)
            ->orWhere('id_penerima', '=', $id)
            ->where('id_pengirim', '=', Auth::user()->id)
            ->paginate();

        $person =  DB::table('users')->where('id', '=', $id)->where('id', '!=', null)
            ->paginate();

        $myId = Auth::user()->id;
        return view('chat/chat', [
            'title' => 'Chat',
            'chat' => $chat,
            'person' => $person[0]->name,
            'id' => $id,
            'myId' => $myId
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

        $person =  DB::table('users')->where('id', '=', $id)
            ->paginate();


        return redirect()->action(
            [ChatController::class, 'getChat'],
            ['id' => $id]
        );
    }
}
