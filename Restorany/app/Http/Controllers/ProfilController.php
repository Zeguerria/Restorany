<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;

class ProfilController extends Controller
{
    public function index()
    {
        //
        $data['ProfilTotal']= Profil::where('supprimer','=',0)->orderBy('code')->count();
        $data['ProfilTotalC']= Profil::where('supprimer','=',1)->orderBy('code')->count();
        $data ['profils'] = Profil::where('supprimer','=',0)->orderBy('code')->paginate(10);
        return view('admins.gestions.access.profils.profil')->with($data);
    }
    public function store(Request $request)
    {
        //
        $code= $request->code;
        $libelle= $request->libelle;
        $description= $request->description;
        try {
            Profil::create([
                'code'=>$code,
                'libelle'=>$libelle,
                'description'=>$description
            ]);
            toast('Profil ajouté avec success','success');

        }
        catch(Exception $e) {
            toast('Ajout du profil impossible','danger');

        }
        return back();
    }

    public function update(Request $request)
    {
        //
        $profil = Profil::findOrFail($request->id);
        $code= $request->code;
        $libelle= $request->libelle;
        $description= $request->description;
        try {
           $profil->update([
                'code'=>$code,
                'libelle'=>$libelle,
                'description'=>$description
            ]);
            toast('Modifiaction éffectuée avec success','warning');

        }
        catch(Exception $e) {
            toast('Modification du profil impossible','danger');

        }
        return back();
    }
    public function corbeille(Request $request){
        //aller faire la modification de l'element
        $profil = Profil::findOrFail($request->id);

        try {
            $profil->update([
                'supprimer'=>1

            ]);
            toast('Profil supprimé avec success','danger');

        }
        catch(Exception $e) {
            toast('Supression du profil impossible','danger');
        }
        return back();
    }
}
