<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    //
    //les redirections
    public function lesdirections(Request $request){
        //client totats
        $profil=Auth::user()->profil_id;

        if($profil=='3'){
            //SUPERADMIN
            return redirect()->route('HomeAdmin');
            // return redirect()->route('HomeAdmin')->with($data);

        }elseif($profil=='2'){
            //Admin
            return redirect()->route('HomeAdmin');
            // return redirect()->route('HomeAdmin')->with($data);

        }else{
            return redirect()->route('HomeSite');
            // return redirect()->route('HomeSite')->with($data);
        }
    }


    public function adminacceuil(Request $request){

        return view('admins.menus.home');
    }
    public function restorantacceuil(Request $request){
        $data['restaurants'] = Restaurant::where('supprimer','=',0)->get();

        return view('restaurants.homes.home')->with($data);
    }
}
