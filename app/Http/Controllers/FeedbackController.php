<?php


namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback/feedback', ['title' => 'Feedback']);
    }

    public function sendFeedback(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
        $nama_file = "";
        $curTime = new \DateTime();
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

        $insert = DB::table('feedback')->insert([
            'id_user' => Auth::user()->id,
            'photo' => $nama_file,
            'text' => $request['keterangan'],
            'tipe' => $request['type'],
            'date' => $curTime->format("Y-m-d")
        ]);

        return redirect()->back()->with('success', 'success message');
    }
}
