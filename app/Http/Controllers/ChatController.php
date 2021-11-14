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

        $idAuth = Auth::user()->id;
        $chat = DB::table('chats')->where('id_pengirim', '=', $idAuth)
            ->orWhere('id_penerima', '=',  $idAuth)
            ->join('users as A', 'chats.id_pengirim', '=', 'A.id')
            ->join('users as B', 'chats.id_penerima', '=', 'B.id')
            ->orderBy('id', 'DESC')->select('chats.*', 'A.name as nama_pengirim', 'B.name as nama_penerima')->get();

        return view('chat/chats', [
            'title' => "Chat",
            'chat' => $chat,
            'myId' =>  $idAuth
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



        // menyimpan data file yang diupload ke variabel $file
        $nama_file = "";

        $file = $request->file('file');
        if ($file != null) {
            $this->validate($request, [
                'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $nama_file = time() . "_" . $file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'chat_file';
            $file->move($tujuan_upload, $nama_file);
        }

        $insert = DB::table('chats')->insert([
            'id_pengirim' => Auth::user()->id,
            'id_penerima' => $id,
            'chat' => $chat,
            'dir' => $nama_file,
            'date' => $curTime->format("Y-m-d"),
            'time' => $curTime->format("H:i")
        ]);

        $person =  DB::table('users')->where('id', '=', $id)
            ->paginate();


        return redirect()->back();
    }
}
