<?php

namespace App\Http\Controllers;

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

        $person =  $people = DB::table('users')->where('id', '=', $id)
            ->paginate();

        return view('chat/chat', [
            'title' => 'Chat',
            'chat' => $chat,
            'person' => $person[0]->name
        ]);
    }
}
