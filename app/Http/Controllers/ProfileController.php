<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {

        $myId = Auth::user()->id;
        $profiles = DB::table('users')->where('users.id', '=', $id)->join('jabatan', 'users.id_jabatan', '=', 'jabatan.id')
            ->select('users.*', 'jabatan.jabatan')->get();

        foreach ($profiles as $p) {
            if ($p->id == $id) {
                break;
            }
        }

        $cabang = "";
        $c = null;
        if ($p->id_jabatan > 3) {
            $cabang = DB::table('data_user_cabang')->where('id_user', '=', $id)->join('data_toko', 'data_toko.id', '=', 'data_user_cabang.id_toko')->get();


            foreach ($cabang as $c) {
                if ($c->id_user == $id) {
                    break;
                }
            }
        }

        return view('profile/profile', ['title' => 'Profile', 'profile' => $p, 'myId' => $myId, 'cabang' => $c]);
    }

    public function editProfilePage($id)
    {
        $myId = Auth::user()->id;
        $profiles = DB::table('users')->where('users.id', '=', $id)->join('jabatan', 'users.id_jabatan', '=', 'jabatan.id')
            ->select('users.*', 'jabatan.jabatan')->get();

        foreach ($profiles as $p) {
            if ($p->id == $id) {
                break;
            }
        }

        $cabang = "";
        $c = null;
        if ($p->id_jabatan > 3) {
            $cabang = DB::table('data_user_cabang')->where('id_user', '=', $id)->join('data_toko', 'data_toko.id', '=', 'data_user_cabang.id_toko')->get();


            foreach ($cabang as $c) {
                if ($c->id_user == $id) {
                    break;
                }
            }
        }
        if (Auth::user()->id == $id) {
            return view('profile/editprofile', ['title' => 'Profile', 'profile' => $p, 'myId' => $myId, 'cabang' => $c]);
        } else {
            return view('profile/profile', ['title' => 'Profile', 'profile' => $p, 'myId' => $myId, 'cabang' => $c]);
        }
    }

    public function editProfile(Request $request)
    {


        $id = Auth::user()->id;

        $q = DB::table('users')->where('id', '=', $id)->update(['email' => $request['email'], 'kota' => $request['city'], 'alamat' => $request['address'], 'no_hp' => strval($request['phone'])]);

        return redirect()->action(
            [ProfileController::class, 'index'],
            ['id' => $id]
        );
    }
}
