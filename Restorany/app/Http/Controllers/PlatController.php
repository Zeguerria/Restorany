<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Plat;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlatRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePlatRequest;

class PlatController extends Controller
{
    public function index()
    {
        //
        $data ['restaurants'] = Restaurant::where('supprimer','=',0)->orderBy('nom')->get();
        $data['PlatTotal']= Plat::where('supprimer','=',0)->orderBy('nom')->count();
        $data['PlatotalC']= Plat::where('supprimer','=',1)->orderBy('nom')->count();
        $data ['plats'] = Plat::where('supprimer','=',0)->orderBy('nom')->get();
        return view('admins.gestions.access.profils.profil')->with($data);
    }

    public function store(Request $request)
    {
        //
        if(isset($request->photo) and !empty($request->photo)){

            $photo = Storage::putFile('public/stockages/images/plats', $request->file('photo'));
        }else{
            $photo = "storage/stockages/images/plats/user1.png";
        }
        $nom = $request->nom;
        $restaurant_id = $request->restaurant_id;
        $prix=$request->prix;
        $description=$request->description;


        try{
            Plat::create([
                'nom'=>$nom,
                'restaurant_id' => $restaurant_id,
                'prix' => $prix,
                'description' => $description,
                'photo'=>$photo,
            ]);
            toast('Plat ajouteé avec success','success');

        }
        catch(Exception $e){
            toast("Hoops😨 !!! Désolé😞😞 ... Nous avons rencotré un problemme lors de l'ajout du plat",'danger');
        }
        return back();
    }

    public function update(Request $request)
    {

        //
        $plat = Plat::findOrFail($request->id);
        if(isset($request->photo) and !empty($request->photo)){
            $photo = Storage::putFile('public/stockages/images/plats', $request->file('photo'));
        }else{
            $photo = $plat->photo;
        }
        $nom= isset($request->nom)?$request->nom:$plat->nom;
        $description= isset($request->description)?$request->description:$plat->description;
        $prix= isset($request->prix)?$request->prix:$plat->prix;
        $restaurant_id= isset($request->restaurant_id)?$request->restaurant_id:$plat->restaurant_id;

        try{
            $plat->update([
                'nom'=>$nom,
                'description' => $description,
                'photo'=>$photo,
                'prix'=>$prix,
                'restaurant_id'=>$restaurant_id,

            ]);
            toast("Super ! Modifiaction du plat éffectuée avec success 👌",'warning');
        }
        catch(Exception $e){
            toast("Modification du plat impossible",'danger');
        }
        return back();
    }
    public function corbeille(Request $request)
    {
        //
        $plat = Plat::findOrFail($request->id);
        try{
            $plat->update([
                'supprimer' =>1
            ]);
            toast('Plat supprimé avec success👍','danger');
        }
        catch(Exception $e){
            toast("Suppression du plat impossible😞",'danger');
        }
        return back();
    }
    public function destroy(Request $request)
    {
        //
        $plat = Plat::findOrFail($request->id);
        try{
            $plat->delete();
            toast('Plat supprimé avec success','success');
        }
        catch(Exception $e){
            toast("Impossible d'effectuer la suppression de ce plat ",'Error Message');

        }
        return back();
    }

    public function corbeille_all(){
        $plats = Plat::where('supprimer', 0)->orderBy('name')->get();
        try{
            foreach($plats as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Plats supprimés avec success','danger');
        }
        catch(Exception $e){
            toast('suppression impossible','danger');
        }
        return back();
    }
    public function recup_corbeille(Request $request){
        $plat = Plat::findOrFail($request->id);
        try{
            $plat->update([
                'supprimer' =>0
            ]);
            toast('Plat restauré avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function recup_all(Request $request){
        $plats = Plat::where('supprimer', 1)->get();
        try{
            foreach($plats as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Plats restaurés avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function delete_all(Request $request){
        $plats = Plat::where('supprimer', 1)->get();
        try{
            foreach($plats as $value){
                $value->delete();
            }
            toast('Supression éffectué avec success','danger');
        }
        catch(Exception $e){
            toast('Supression impossible','danger');
        }
        return back();
    }
}
