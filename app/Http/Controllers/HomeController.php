<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get('https://api.kawalcorona.com/indonesia/');
        $data = $response->json();

        $response2 = Http::get('https://api.open-meteo.com/v1/forecast?latitude=-6.1862&longitude=106.8063&hourly=temperature_2m');

        $response2 = Http::get('api.openweathermap.org/data/2.5/weather?q=' . Auth::user()->kota . '&appid=87bcb680997c9aa6eecf132fac82a3db');



        $data2 = $response2->json();
        if (!empty($data2['message'])) {
            $response2 = Http::get('api.openweathermap.org/data/2.5/weather?q=' . 'Jakarta' . '&appid=87bcb680997c9aa6eecf132fac82a3db');

            $data2 = $response2->json();
        }

        $jumlahUser = 0;
        $jumlahGrup = 0;
        $jumlahFeedback = 0;
        $feedback = null;
        $mynote = $todo = DB::table('todolists')->where('id_user', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
        if (Auth::user()->id_jabatan == 1) {
            $jumlahUser = count(DB::table('users')->get());
            $jumlahGrup = count(DB::table('discussions')->get());
            $feedback = DB::table('feedback')->join('users', 'users.id', '=', 'feedback.id_user')->get();
            $jumlahFeedback = count(DB::table('feedback')->get());
        }



        return view('index', [
            'title' => 'Home',
            'greeting' => $this->getGreeting((int) date('H'), $this->getFirstName()),
            'quote' =>  $this->getQuote((int) date('H')),
            'id_jabatan' => Auth::user()->id_jabatan,
            'jumlahUser' =>  $jumlahUser,
            'jumlahGrup' => $jumlahGrup,
            'feedback' => $feedback,
            'mynote' => $mynote,
            'jumlahFeedback' => $jumlahFeedback,
            'data' => $data,
            'data2' => $data2
        ]);
    }

    public function getFirstName()
    {
        $name = Auth::user()->name;
        $names = explode(" ", $name);
        return $names[0];
    }

    public function getGreeting($hour, $name)
    {
        $hour = (int) $hour;

        if ($hour >= 4) {
            $tes = "Good Morning, $name";
        }
        if ($hour >= 12) {
            $tes = "Good Day, $name";
        }
        if ($hour >= 15) {
            $tes = "Good Afternoon, $name";
        }
        if ($hour >= 18) {
            $tes = "Good Evening, $name";
        }
        if ($hour >= 21) {
            $tes = "Good Night, $name";
        }
        if ($hour <= 4) {
            $tes = "Good Night, $name";
        }
        return "<h1 class='display-4' style='font-size: 300%;''>$tes</h1>";
    }

    function getQuote($hour)
    {
        $hour = (int) $hour;

        if ($hour >= 4) {
            $tes = "Let's start this day with a cup of coffee.";
        }
        if ($hour >= 8) {
            $tes = "Hard work beats talent if talent doesn't work hard.";
        }
        if ($hour >= 12) {
            $tes = "Don't forget to eat your lunch.";
        }
        if ($hour >= 15) {
            $tes = "Hope you have an afternoon as lovely as you are.";
        }
        if ($hour >= 18) {
            $tes = "You should like the night. Without the dark, we'd never see the stars.";
        }
        if ($hour <= 4) {
            $tes = "Don't forget to sleep";
        }
        return $tes;
    }
}
