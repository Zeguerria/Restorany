<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    public function index()
    {
        //
        $data['TableTotal']= Table::where('supprimer','=',0)->orderBy('nombre_place')->count();
        $data['TabletotalC']= Table::where('supprimer','=',1)->orderBy('nombre_place')->count();
        $data ['tables'] = Table::where('supprimer','=',0)->orderBy('nombre_place')->get();
        return view('admins.gestions.tables.table')->with($data);
    }

    public function store(Request $request)
    {
        //
        $nombre_place = $request->nombre_place;
        $prix=$request->prix;


        try{
            Table::create([
                'nombre_place'=>$nombre_place,
                'prix' => $prix,
            ]);
            toast('Table ajoutée avec success','success');

        }
        catch(Exception $e){
            toast("Hoops😨 !!! Désolé😞😞 ... Nous avons rencotré un problemme lors de l'ajout de la table",'danger');
        }
        return back();
    }
    public function update(Request $request)
    {

        //
        $table = Table::findOrFail($request->id);
        $nombre_place= isset($request->nombre_place)?$request->nombre_place:$table->nombre_place;
        $prix= isset($request->prix)?$request->prix:$table->prix;

        try{
            $table->update([
                'nombre_place'=>$nombre_place,

                'prix'=>$prix,

            ]);
            toast("Super ! Modifiaction de la table éffectuée avec success 👌",'warning');
        }
        catch(Exception $e){
            toast("Modification de la table impossible",'danger');
        }
        return back();
    }
    public function corbeille(Request $request)
    {
        //
        $table = Table::findOrFail($request->id);
        try{
            $table->update([
                'supprimer' =>1
            ]);
            toast('Table supprimé avec success👍','danger');
        }
        catch(Exception $e){
            toast("Suppression de la table impossible😞",'danger');
        }
        return back();
    }
    public function destroy(Request $request)
    {
        //
        $table = Table::findOrFail($request->id);
        try{
            $table->delete();
            toast('Table supprimée avec success','success');
        }
        catch(Exception $e){
            toast("Impossible d'effectuer la suppression de cette table ",'Error Message');

        }
        return back();
    }
    public function corbeille_all(){
        $tables = Table::where('supprimer', 0)->get();
        try{
            foreach($tables as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Tables supprimées avec success','danger');
        }
        catch(Exception $e){
            toast('suppression impossible','danger');
        }
        return back();
    }
    public function recup_corbeille(Request $request){
        $table = Table::findOrFail($request->id);
        try{
            $table->update([
                'supprimer' =>0
            ]);
            toast('Table restaurée avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function recup_all(Request $request){
        $tables = Table::where('supprimer', 1)->get();
        try{
            foreach($tables as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Tables restaurés avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function delete_all(Request $request){
        $tables = Table::where('supprimer', 1)->get();
        try{
            foreach($tables as $value){
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
