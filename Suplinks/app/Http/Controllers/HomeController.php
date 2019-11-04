<?php

namespace App\Http\Controllers;

use App\Clicks;
use App\CountryStats;
use App\RefferStats;
use App\User;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use function Sodium\increment;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Donne le dernier lien enregistré
        $lastOne = Link::where('id_user', Auth::id())->orderBy('created_at', 'desc')->first();

        //Renvoi toute la table 'links' dans la variable
        $userLinks = DB::table('links')->where('id_user', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('dashboard', ['userLinks' => $userLinks, 'lastOne' => $lastOne, 'state' => 'info']);  //On envoi l'utilisateur à la view avec les infos en paramètres
    }

}
