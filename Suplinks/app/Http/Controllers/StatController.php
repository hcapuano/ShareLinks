<?php

namespace App\Http\Controllers;

use App\Clicks;
use App\CountryStats;
use App\Link;
use App\RefferStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    //Méthode qui renvoi vers la view 'stats' tous les élements de la base de donnée de l'id choisi
    public function stats($id_link){
        $link = Link::where('id', $id_link)->first(); //renvoi l'id

        //Renvoi les 7 derniers jours de stats de clicks pour le graph sur le temps(1 semaine)
        $clicks = Clicks::where('id_link', $id_link)->orderBy('date', 'desc')->limit(7)->get();
        $refererStats = RefferStats::where('id_link', $id_link)->get();
        $countryStats = CountryStats::where('id_link', $id_link)->get();
        return view('stats', ['link' => $link, 'clicks' => $clicks, 'referers' => $refererStats, 'countries' => $countryStats, 'idLink' => $id_link]);
    }
}
