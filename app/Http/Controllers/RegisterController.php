<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jabatanlist = DB::table('jabatan')->get();
        $storelist = DB::table('data_toko')->get();
        return view('register/register', ['title' => 'Register Employee', 'jabatan' => $jabatanlist, 'store' => $storelist]);
    }


    public function insertData(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'nik' => $request['nik'],
            'kota' => $request['city'],
            'alamat' => $request['address'],
            'no_hp' => $request['phone'],
            'id_jabatan' => $request['position']
        ]);

        $employeeId = DB::getPdo()->lastInsertId();

        DB::table('discussion_member')->insert([
            'id_discussion' => 8,
            'id_user' => $employeeId,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        if ($request['position'] > 3) {
            DB::table('data_user_cabang')->insert([
                'id_user' => $employeeId,
                'id_toko' => $request['store']
            ]);

            $toko = DB::table('data_toko')->where('id', '=', $request['store'])->get();

            $idDiskusi = 0;
            for ($i = 0; $i < count($toko); $i++) {
                if ($toko[$i]->id == $request['store']) {
                    $idDiskusi = $toko[$i]->id_diskusi;
                    break;
                }
            }

            DB::table('discussion_member')->insert([
                'id_discussion' => $idDiskusi,
                'id_user' => $employeeId,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }

        return redirect()->action(
            [HomeController::class, 'index']
        );
    }
}
