<?php

namespace App\Http\Controllers;

use App\Clicks;
use App\CountryStats;
use App\RefferStats;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LinkController extends Controller
{

    //Méthode de redirection vers la vrai url
    public function redirectToUrl($id_link){

        //Check si le lien est accessible en bdd
        $link = Link::where('id', $id_link)->where('enable', 1)->first();

        //Si oui, on met à jour les stats, on vérifie si l'url vient d'un serveur ou de l'url google (Direct)
        if (isset($link)){
            $geoLocal = file_get_contents("http://api.hostip.info/country.php?ip=".$_SERVER['REMOTE_ADDR']);
            DB::table('links')
                ->where('id', $id_link)
                ->update(['clicks' => DB::raw('clicks+1')]);
            Clicks::updateOrCreate(['id_link' => $id_link, 'date' => Carbon::today()])->increment('clicks');
            CountryStats::updateOrCreate(['country' => $geoLocal, 'id_link' => $id_link])->increment('clicks');
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'Direct';
            RefferStats::updateOrCreate(['reffer' => $referer, 'id_link' => $id_link])->increment('clicks');
            return redirect($link->url);
        }

        //Sinon on renvoi une page d'erreur
        return abort(404);
    }

    public function createLink(){

        //On vérifie que le formulaire est rempli, car le javascript peut être désactivé
        if (!empty(Input::get('name')) and !empty(Input::get('url'))){

            //Création d'un nouvel id à 5 charactères, puis insertion dans la base de donnée
            $newUrlId = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 5);
            $link = Link::create(['id' => $newUrlId, 'name' => Input::get('name'), 'url' => Input::get('url'), 'id_user' => Auth::id()]);

            //Insertion des statistiques dans base de donnée (lignes crées)
            $geoLocal = file_get_contents("http://api.hostip.info/country.php?ip=".$_SERVER['REMOTE_ADDR']);
            Clicks::create(['id_link' => $newUrlId, 'date' => Carbon::today()]);
            CountryStats::create(['country' => $geoLocal, 'id_link' => $newUrlId]);
            RefferStats::create(['reffer' => $_SERVER['HTTP_REFERER'], 'id_link' => $newUrlId]);

            //Récupérer tout les liens de l'utilisateur authentifié
            $userLinks = DB::table('links')->where('id_user', Auth::id())->orderBy('created_at', 'desc')->get();
            $lastOne = Link::where('id_user', Auth::id())->orderBy('created_at', 'desc')->first();
            return view('dashboard', ['userLinks' => $userLinks, 'link' => $link, 'state' => 'success', 'lastOne' => $lastOne]);
        }

        //Sinon renvoi sur le dashboard avec un message d'erreur
        $userLinks = DB::table('links')->where('id_user', Auth::id())->orderBy('created_at', 'desc')->get();
        $lastOne = Link::where('id_user', Auth::id())->orderBy('created_at', 'desc')->first();

        return view('dashboard', array('name' => Input::get('name'), 'url' => Input::get('url')), ['state' => 'cancel', 'lastOne' => $lastOne, 'userLinks' => $userLinks]);
    }

    //Méthode de désactivation d'un lien
    public function disableLink($id){
        Link::where('id', $id)->update(['enable' => 0]);
        return redirect('/');
    }

    //Méthode de d'activation d'un lien
    public function enableLink($id){
        Link::where('id', $id)->update(['enable' => 1]);
        return redirect('/');
    }

    //Supprime toutes les stats et le lien en bdd
    public function deleteLink($id){
        Link::where('id', $id)->delete();
        Clicks::where('id_link', $id)->delete();
        CountryStats::where('id_link', $id)->delete();
        RefferStats::where('id_link', $id)->delete();
        return redirect('/');
    }
}
