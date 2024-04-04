<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['RestaurantTotal']= Restaurant::where('supprimer','=',0)->orderBy('nom')->count();
        $data['RestaurantotalC']= Restaurant::where('supprimer','=',1)->orderBy('nom')->count();
        $data ['restaurants'] = Restaurant::where('supprimer','=',0)->orderBy('nom')->get();
        return view('admins.gestions.restaurants.restaurants')->with($data);
    }
    public function indexCorbeille()
    {
        $data['RestaurantTotal']= Restaurant::where('supprimer','=',0)->orderBy('nom')->count();
        $data['RestaurantotalC']= Restaurant::where('supprimer','=',1)->orderBy('nom')->count();
        $data ['restaurants'] = Restaurant::where('supprimer','=',1)->orderBy('nom')->get();
        return view('admins.gestions.restaurants.corbeillerestaurant')->with($data);
    }

    public function store(Request $request)
    {

        if(isset($request->photo) and !empty($request->photo)){

            $photo = Storage::putFile('public/stockages/images/restaurants', $request->file('photo'));
        }else{
            $photo = "storage/stockages/images/restaurants/user1.png";
        }
        $nom = $request->nom;
        $description=$request->description;
        $phone=$request->phone;
        $quartier=$request->quartier;


        try{
            Restaurant::create([
                'nom'=>$nom,
                'description' => $description,
                'phone' => $phone,
                'quartier' => $quartier,
                'photo'=>$photo,
            ]);
            toast('Restaurant ajouté avec success','success');

        }
        catch(Exception $e){
            toast("Hoops😨 !!! Désolé😞😞 ... Nous avons rencotré un problemme lors de l'ajout du Restaurant",'danger');
        }
        return back();
    }
    public function update(Request $request)
    {

        //
        $restaurant = Restaurant::findOrFail($request->id);
        if(isset($request->photo) and !empty($request->photo)){
            $photo = Storage::putFile('public/stockages/images/restaurants', $request->file('photo'));
        }else{
            $photo = $restaurant->photo;
        }
        $nom= isset($request->nom)?$request->nom:$restaurant->nom;
        $description= isset($request->description)?$request->description:$restaurant->description;
        $phone= isset($request->phone)?$request->phone:$restaurant->phone;
        $quartier= isset($request->quartier)?$request->quartier:$restaurant->quartier;

        try{
            $restaurant->update([
                'nom'=>$nom,
                'description' => $description,
                'photo'=>$photo,
                'phone'=>$phone,
                'quartier'=>$quartier,

            ]);
            toast("Super ! Modifiaction du restaurant éffectuée avec success 👌",'warning');
        }
        catch(Exception $e){
            toast("Modification du restaurant impossible",'danger');
        }
        return back();
    }
    public function corbeille(Request $request)
    {
        //
        $restaurant = Restaurant::findOrFail($request->id);
        try{
            $restaurant->update([
                'supprimer' =>1
            ]);
            toast('Restaurant supprimé avec success👍','danger');
        }
        catch(Exception $e){
            toast("Suppression du restaurant impossible😞",'danger');
        }
        return back();
    }
    public function destroy(Request $request)
    {
        //
        $restaurant = Restaurant::findOrFail($request->id);
        try{
            $restaurant->delete();
            toast('Restaurant supprimé avec success','success');
        }
        catch(Exception $e){
            toast("Impossible d'effectuer la suppression de ce restaurant ",'Error Message');

        }
        return back();
    }

    public function corbeille_all(){
        $restaurants = Restaurant::where('supprimer', 0)->orderBy('name')->get();
        try{
            foreach($restaurants as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Restaurants supprimés avec success','danger');
        }
        catch(Exception $e){
            toast('suppression impossible','danger');
        }
        return back();
    }
    public function recup_corbeille(Request $request){
        $restaurant = Restaurant::findOrFail($request->id);
        try{
            $restaurant->update([
                'supprimer' =>0
            ]);
            toast('Restaurant restauré avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function recup_all(Request $request){
        $restaurants = Restaurant::where('supprimer', 1)->get();
        try{
            foreach($restaurants as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Restaurants restaurés avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function delete_all(Request $request){
        $restaurants = Restaurant::where('supprimer', 1)->get();
        try{
            foreach($restaurants as $value){
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
