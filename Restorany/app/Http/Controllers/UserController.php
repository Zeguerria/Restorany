<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function index(){
        $data['UserTotal']= User::where('supprimer','=',0)->where('profil_id','!=',1)->orderBy('name')->count();
        $data['UserTotalC']= User::where('supprimer','=',1)->where('profil_id','!=',1)->orderBy('name')->count();
        $data['profils']= Profil::where('supprimer','=',0)->where('id','!=','1')->orderBy('libelle')->get();
        $data['users'] =User::where('supprimer','=',0)->where('profil_id','!=',1)->orderBy('name', 'ASC')->get();
        return view('admins.gestions.users.personnels.personnel')->with($data);
    }
    public function indexCorbeille()
    {
        //
        $data['profils']= Profil::where('supprimer','=',0)->where('id','!=',1)->orderBy('libelle')->get();
        $data['UserTotal']= User::where('supprimer','=',0)->where('profil_id','!=',1)->where('profil_id','!=',1)->orderBy('name')->count();
        $data['UserTotalC']= User::where('supprimer','=',1)->where('profil_id','!=',1)->orderBy('name')->count();
        $data['users']= User::where('supprimer','=',1)->where('profil_id','!=',1)->orderBy('name')->get();
        return view('admins.gestions.users.personnels.corbeillepersonnel')->with($data);
    }

    public function store(Request $request)
    {
        //
        if(isset($request->photo) and !empty($request->photo)){

            $photo = Storage::putFile('public/stockages/images/users', $request->file('photo'));
        }else{
            $photo = "storage/stockages/images/users/user1.png";
        }
        $name = $request->name;
        $prenom = $request->prenom;
        $email=$request->email;
        $profil_id=$request->profil_id;
        $phone=$request->phone;
        $quartier=$request->quartier;
        $password=$request->password;


        try{
            User::create([
                'name'=>$name,
                'profil_id' => $profil_id,
                'phone' => $phone,
                'quartier' => $quartier,
                'prenom' => $prenom,
                'photo'=>$photo,
                'email'=>$email,
                'password' => Hash::make($request['password']),
            ]);
            toast('Utilisateur ajouteé avec success','success');

        }
        catch(Exception $e){
            toast("Hoops😨 !!! Désolé😞😞 ... Nous avons rencotré un problemme lors de l'ajout de l'utilisateur😞",'danger');
        }
        return back();
    }
    public function update(Request $request)
    {

        //
        $user = User::findOrFail($request->id);
        if(isset($request->photo) and !empty($request->photo)){
            $photo = Storage::putFile('public/stockages/images/users', $request->file('photo'));
        }else{
            $photo = $user->photo;
        }
        $name= isset($request->name)?$request->name:$user->name;
        $profil_id= isset($request->profil_id)?$request->profil_id:$user->profil_id;
        $prenom= isset($request->prenom)?$request->prenom:$user->prenom;
        $phone= isset($request->phone)?$request->phone:$user->phone;
        $quartier= isset($request->quartier)?$request->quartier:$user->quartier;
        $email= isset($request->email)?$request->email:$user->email;

        if(!isset($request->password)){
            $password = $user->password;
        }
        else{
            $password = Hash::make($request->password);
        }

        try{
            $user->update([
                'name'=>$name,
                'prenom' => $prenom,
                'profil_id' => $profil_id,
                'photo'=>$photo,
                'phone'=>$phone,
                'quartier'=>$quartier,
                'email'=>$email,
                'password' => $password,

            ]);
            toast("Super ! Modifiaction de l'utilisateur éffectuée avec success 👌",'warning');
        }
        catch(Exception $e){
            toast("Modification de l'utilisateur impossible",'danger');
        }
        return back();
    }
    public function corbeille(Request $request)
    {
        //
        $user = User::findOrFail($request->id);
        try{
            $user->update([
                'supprimer' =>1
            ]);
            toast('Utilisateur supprimé avec success👍','danger');
        }
        catch(Exception $e){
            toast("Suppression de l'utilisateur impossible😞",'danger');
        }
        return back();
    }
    public function destroy(Request $request)
    {
        //
        $user = User::findOrFail($request->id);
        try{
            $user->delete();
            toast('Utilisateur supprimé avec success','success');
        }
        catch(Exception $e){
            toast("Impossible d'effectuer la suppression de cette utilisateur ",'Error Message');

        }
        return back();
    }
    public function corbeille_all(){
        $users = User::where('supprimer', 0)->where('profil_id','!=',1)->orderBy('name')->get();
        try{
            foreach($users as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Utilisateurs supprimés avec success','danger');
        }
        catch(Exception $e){
            toast('suppression impossible','danger');
        }
        return back();
    }
    public function recup_corbeille(Request $request){
        $users = User::findOrFail($request->id);
        try{
            $users->update([
                'supprimer' =>0
            ]);
            toast('Utilisateur restauré avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function recup_all(Request $request){
        $user = User::where('supprimer', 1)->where('profil_id','!=',1)->orderBy('name')->get();
        try{
            foreach($user as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Utilisateurs restaurés avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function delete_all(Request $request){
        $id=Auth::user()->id;
        $users = User::where('supprimer', 1)->where('id','!=',$id)->where('profil_id','!=',1)->get();
        try{
            foreach($users as $value){
                $value->delete();
            }
            toast('Supression éffectué avec success','danger');
        }
        catch(Exception $e){
            toast('Supression impossible','danger');
        }
        return back();
    }
    public function profilAdmin()
    {

        $data['profil']= Profil::where('supprimer','=',0)->orderBy('libelle')->get();
        $data['users']= User::where('supprimer','=',0)->where('id','=',Auth::user()->id)->get();
        return view('admins.profils.profil')->with($data);


    }


    //PARTIE CLIENT DEBUT
        public function indexClient(){
            $data['UserTotal']= User::where('supprimer','=',0)->where('profil_id','=',1)->orderBy('name')->count();
            $data['UserTotalC']= User::where('supprimer','=',1)->where('profil_id','=',1)->orderBy('name')->count();
            $data['profil']= Profil::where('supprimer','=',0)->where('id','=',1)->orderBy('libelle')->get();
            $data['users']= User::where('supprimer','=',0)->where('profil_id','=',1)->orderBy('name')->get();
            return view('admins.gestions.users.clients.clients')->with($data);
        }
        public function indexCorbeilleClient(){
            $data['UserTotal']= User::where('supprimer','=',0)->where('profil_id','=',1)->orderBy('name')->count();
            $data['UserTotalC']= User::where('supprimer','=',1)->where('profil_id','=',1)->orderBy('name')->count();
            $data['profil']= Profil::where('supprimer','=',0)->where('id','=',1)->orderBy('libelle')->get();
            $data['users']= User::where('supprimer','=',1)->where('profil_id','=',1)->orderBy('name')->get();
            return view('admins.gestions.users.clients.corbeilleclient')->with($data);
        }
        public function storeClient(Request $request){
            if(isset($request->photo) and !empty($request->photo)){

                $photo = Storage::putFile('public/stockages/images/clients', $request->file('photo'));
            }else{
                $photo = "storage/stockages/images/clients/user1.png";
            }
            $name = $request->name;
            $prenom = $request->prenom;
            $email=$request->email;
            $profil_id=$request->profil_id;
            $phone=$request->phone;
            $quartier=$request->quartier;
            $password=$request->password;
            try{
                User::create([
                    'name'=>$name,
                    'profil_id' => 1,
                    'phone' => $phone,
                    'quartier' => $quartier,
                    'prenom' => $prenom,
                    'profil_id' => 1,
                    'photo'=>$photo,
                    'email'=>$email,
                    'password' => Hash::make($request['password']),
                ]);
                toast('Client ajouté avec success','success');

            }
            catch(Exception $e){
                toast('ajout impossible','danger');
            }
            return back();
        }
        public function updateClient(Request $request){
            $user = User::findOrFail($request->id);
            if(isset($request->photo) and !empty($request->photo)){
                $photo = Storage::putFile('public/stockages/images/clients', $request->file('photo'));
            }else{
                $photo = $user->photo;
            }
            $name= isset($request->name)?$request->name:$user->name;
            $profil_id= isset($request->profil_id)?$request->profil_id:$user->profil_id;
            $prenom= isset($request->prenom)?$request->prenom:$user->prenom;
            $pseudo= isset($request->pseudo)?$request->pseudo:$user->pseudo;
            $phone= isset($request->phone)?$request->phone:$user->phone;
            $quartier= isset($request->quartier)?$request->quartier:$user->quartier;
            $email= isset($request->email)?$request->email:$user->email;

            if(!isset($request->password)){
                $password = $user->password;
            }
            else{
                $password = Hash::make($request->password);
            }

            try{
                $user->update([
                    'name'=>$name,
                    'prenom' => $prenom,
                    'profil_id' => 1,

                    'photo'=>$photo,
                    'phone'=>$phone,
                    'quartier'=>$quartier,
                    'email'=>$email,
                    'password' => $password,

                ]);
                toast('Modifiaction éffectuée avec success','warning');
            }
            catch(Exception $e){
                toast('Modification impossible','danger');
            }
            return back();
        }
        public function recup_all_Client(Request $request){
            $user = User::where('supprimer', 1)->where('profil_id','=',1)->orderBy('name')->get();
            try{
                foreach($user as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Clients restaurés avec success','primary');
            }
            catch(Exception $e){
                toast('Restauration impossible','danger');
            }
            return back();
        }
        public function corbeille_all_Client(Request $request){
            $users = User::where('supprimer', 0)->where('profil_id','=',1)->orderBy('name')->get();
            try{
                foreach($users as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Clients supprimés avec success','danger');
            }
            catch(Exception $e){
                toast('suppression impossible','danger');
            }
            return back();
        }
        public function delete_all_Client (Request $request){
            $users = User::where('supprimer', 1)->where('profil_id','=',1)->get();
            try{
                foreach($users as $value){
                    $value->delete();
                }
                toast('Supression du client éffectué avec success','danger');
            }
            catch(Exception $e){
                toast('Supression du client impossible','danger');
            }
            return back();
        }

    //PARTIE CLIENT FIN

}
