{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}


@extends('admins.menus.menu')
@section('titre')
    restaurants
@endsection
@section('header')
@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header pb-5">
            <div class="col-md-12 moncard" >
                <div class="title pt-2">
                    <h4 class="mb-0 bread " style="color:#D9B8F7;"><img src="{{asset('glbal/icon/restaurant.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Restaurants</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/adminaccueils"  style="color: #60528A;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#D097BF;">Restaurants</li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#FCF2E9;" >Restaurant</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header moncard" >
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn" data-bs-toggle="tooltip" title="Ajouter" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus msicons" style="font-size: 30px; color:#7bff00;"></i></button>
                                            {{-- MODAL AJOUTER DEBUT --}}
                                                <div class="modal fade" id="modal-default">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title fw-bold titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-utensils msicons"></i></span>&ensp;Ajouter un Restaurant</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                <form method="post" action="{{route('ajouterRestaurant')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div>
                                                                        <!--corp du formulaire debut-->
                                                                        <div class="row">
                                                                            <div class=" col-12 col-md-6  col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                    <input type="text" class="form-control" id="" name="nom" placeholder="Entrer le nom" >
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12 col-md-6  col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                    <input type="text" class="form-control" id="" name="quartier" placeholder="Entrer le Quartier">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6  col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                    <input type="text" class="form-control" id="" name="phone" placeholder="Entrer le phone">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6  col-ml-6 col-lg-6">
                                                                                <label><i class="fas fa-camera-retro msicons"></i>&ensp;Photo du restaurant</label>
                                                                                <div class="form-group">
                                                                                    <div class="custom-file">
                                                                                    <input type="file" class="custom-file-input" name="photo" id="customFile" accept=".png,.gpg,.gpeg, .jpg,.avif">
                                                                                    <label class="custom-file-label" for="customFile" style=" color: var(--color-t); font-family: italic;"> <i class="fas fa-image"></i>&ensp;</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Description </label><br>
                                                                                    <textarea name="description" id="" cols="100" rows="2"></textarea>
                                                                                    {{-- <input type="text" class="form-control" id="" name="prenom" placeholder="Entrer le Prenom"> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                        <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
                                                                        <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-save"></i>&ensp; Enregistrer</button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- MODAL AJOUTER FIN --}}

                                        </div>
                                        <div class="col-md-9 pt-4 d-flex nav justify-content-end">
                                            <div class="form-group">
                                                <label for=""><a href="./restaurant" class="btn " id="" data-bs-toggle="tooltip" title="total restaurants" ><i class="fa fa-user msicons" style="color :#D9B8F7; font-size: 20px;"></i></a><sup style="color :#D9B8F7;">{{$RestaurantTotal}}</sup></label>
                                            <label for=""><a href="./restaurantcorbeille" class="btn " id="" data-bs-toggle="tooltip" data-placement="bottom" title="total restaurants en corbeille"><i class="fa fa-trash msicons" style="color :#D9B8F7; font-size: 20px;"></i></a><sup style="color :#D9B8F7;">{{$RestaurantTotalC}}</sup></label>
                                            </div>

                                            <a href="#" class="btn " id="A" data-bs-toggle="tooltip" title="Option"><i class="fa fa-ellipsis-v" style="color :#D9B8F7; font-size: 20px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                <tr class="text-center">
                                  <th>#</th>
                                  <th>photo</th>
                                  <th>Noms </th>
                                  <th>Description</th>
                                  <th>Contact</th>
                                  <th>Quartier</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody >
                                    @foreach($restaurants as $key => $value)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            @if($value->photo!=null)
                                            <td class="text-center">
                                                <center>
                                                    <img src="{{asset($value->le_profil)}}" alt="" class="img img-circle" width="50" height="50">
                                                </center>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <span class="text-danger">
                                                    Ce Restaurant n'a pas de photo
                                                </span>
                                            </td>

                                            @endif

                                            <td class="text-center"> {{$value->nom}}</td>
                                            <td class="text-center"> {{$value->phone}}</td>


                                            <td class="text-center">{{$value->description}}</td>
                                            <td class="text-center">{{$value->quartier}}</td>
                                            <td style="" class="sorting_1 text-center">
                                                <div class="btn-group">
                                                    <div style="">
                                                        <div class="">
                                                            <div class="btn-group btn-block">
                                                              <a type="button" class="btn btn-success" data-bs-toggle="tooltip" title="Consulter" data-toggle="modal" data-target="#consulter{{$value->id}}"><i class="fas fa-eye" style="font-size: 20px; color:#050034;"></i></a>
                                                              <a type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" data-placement="bottom" title="Modifier" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fas fa-edit" style="font-size: 20px; color:#050034;"></i></a>
                                                              <a type="button" class="btn btn-danger"  data-bs-toggle="tooltip" title="Supprimer" data-toggle="modal" data-target="#corbeille{{$value->id}}"><i class="fas fa-trash" style="font-size: 20px; color:#050034;"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <div class="s">
                                                <!--CONSULTER-->
                                                <div class="modal fade" id="consulter{{$value->id}}">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content"><i class="">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900;"><span><i class="fas fa-book-reader"></i></span>&ensp;Consulter le Restaurant : {{$value->nom}} </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                <form>
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                    <input type="text" class="form-control" value="{{$value->nom}}" readonly id="" name="name" placeholder="Entrer le nom">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                    <input type="text" class="form-control" id="" value="{{$value->phone}}" readonly name="phone" placeholder="Entrer le phone">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-12  col-ml-612col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                    <input type="text" class="form-control" id="" value="{{$value->quartier}}" readonly name="quartier" placeholder="Entrer le quartier">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col m-2" style="background-image: url({{asset($value->le_profil)}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                            {{-- <img src="{{asset($value->le_profil)}}" alt="" srcset="" class="img-fluid"> --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Description </label>
                                                                                    <textarea name="description" disabled id="" cols="100" rows="2"name="description"  placeholder="{{$value->description}}" value="{{$value->description}}" readonly></textarea>

                                                                                    {{-- <input type="text" class="form-control" id="" value="{{$value->description}}" readonly name="prenom" placeholder="Entrer le Prenom"> --}}
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--MODIFFIER-->
                                                <div class="modal fade" id="modifier{{$value->id}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-user-edit"></i></span>&ensp;Modifier  le Restaurant: {{$value->nom}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color :#B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                <form method="post" action="{{route('modifierRestaurant')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                                        <!--corp du formulaire debut-->
                                                                        <div>
                                                                            <div class="container-fluid">
                                                                                <div class="row">

                                                                                    <div class="col">
                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature"></i>&ensp;Nom </label>
                                                                                                <input type="text" class="form-control" value="{{$value->nom}}"  id="" name="nom" placeholder="Entrer le nom">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;&ensp;Contact</label>
                                                                                                <input type="text" class="form-control" id="" value="{{$value->phone}}"  name="phone" placeholder="Entrer phone">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                                <input type="text" class="form-control" id="" value="{{$value->quartier}}" name="quartier" placeholder="Entrer le quartier">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <label><i class="fas fa-camera-retro msicons"></i>&ensp;Photo du restaurant</label>
                                                                                            <div class="form-group">
                                                                                                <div class="custom-file">
                                                                                                <input type="file" class="custom-file-input" name="photo" id="customFile" accept=".png,.gpg,.gpeg, .jpg,.avif">
                                                                                                <label class="custom-file-label" for="customFile" style=" color: var(--color-t); font-family: italic;"> <i class="fas fa-image"></i>&ensp;</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col m-2" style="background-image: url({{asset($value->le_profil)}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                                        {{-- <img src="{{asset($value->le_profil)}}" alt="" srcset="" class="img-fluid"> --}}
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">

                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit"></i>&ensp;Description </label>
                                                                                         <textarea name="description"  id="" cols="100" rows="2"name="description"  placeholder="{{$value->description}}" value="{{$value->description}}" ></textarea>
                                                                                        </div>
                                                                                    </div>



                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                            <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                            <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-save"></i>&ensp;Modifier et Fermer</button>
                                                                        </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--CORBEILLE-->

                                                <div class="modal fade" id="corbeille{{$value->id}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-utensils"></i></span>&ensp;Supprimer le Restaurant : {{$value->nom}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color :#B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                <form method="post" action="{{route('corbeilleRestaurant')}}" nctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                                        <div class="">
                                                                            <div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                                <input type="text" class="form-control" value="{{$value->nom}}" readonly id="" name="name" placeholder="Entrer le nom">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                                <input type="text" class="form-control" id="" value="{{$value->phone}}" readonly name="phone" placeholder="Entrer le phone">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12  col-ml-612col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                                <input type="text" class="form-control" id="" value="{{$value->quartier}}" readonly name="quartier" placeholder="Entrer le quartier">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col m-2" style="background-image: url({{asset($value->le_profil)}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                                        {{-- <img src="{{asset($value->le_profil)}}" alt="" srcset="" class="img-fluid"> --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Description </label>
                                                                                                <textarea name="description" disabled id="" cols="100" rows="2"name="description"  placeholder="{{$value->description}}" value="{{$value->description}}" readonly></textarea>

                                                                                                {{-- <input type="text" class="form-control" id="" value="{{$value->description}}" readonly name="prenom" placeholder="Entrer le Prenom"> --}}
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                                <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-trash-alt"></i>&ensp;Supprimer et Fermer</button>
                                                                            </div>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--SUPPRIMER-->
                                                <div class="modal fade" id="supprimer{{$value->id}}">
                                                    <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                            <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900; color :#D9B8F7;"><span><i class="fas fa-utensils"></i></span>&ensp;Supprmer le Restaurant : {{$value->nom}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color :#B460B5;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                            <form method="post" action="{{route('supprimerRestaurant')}}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$value->id}}">
                                                                    <!--corp du formulaire debut-->

                                                                    <div class="">
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                            <input type="text" class="form-control" value="{{$value->nom}}" readonly id="" name="name" placeholder="Entrer le nom">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                            <input type="text" class="form-control" id="" value="{{$value->phone}}" readonly name="phone" placeholder="Entrer le phone">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12  col-ml-612col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                            <input type="text" class="form-control" id="" value="{{$value->quartier}}" readonly name="quartier" placeholder="Entrer le quartier">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col m-2" style="background-image: url({{asset($value->le_profil)}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                                    {{-- <img src="{{asset($value->le_profil)}}" alt="" srcset="" class="img-fluid"> --}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Description </label>
                                                                                            <textarea name="description" disabled id="" cols="100" rows="2"name="description"  placeholder="{{$value->description}}" value="{{$value->description}}" readonly></textarea>

                                                                                            {{-- <input type="text" class="form-control" id="" value="{{$value->description}}" readonly name="prenom" placeholder="Entrer le Prenom"> --}}
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                            <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                            <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-trash-alt"></i>&ensp;Supprimer et Fermer</button>
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </div>


                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                {{-- <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
                                </tr> --}}
                                </tfoot>
                              </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="sumenu card-footer" id="" style="background-color: #050034;">
                                <hr class="text-dander">
                                <div class="code-box" >
                                    <div class="clearfix p-1">
                                        <div class="container-fluid pt-2">
                                            <div class="row">
                                                    <div class="col" >
                                                        <a href="corbeilleAllrestaurant" data-bs-toggle="tooltip" title="Tout Supprimer" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
                                                        <a href="restaurantspdf" data-bs-toggle="tooltip" title="Imprimer" data-placement="bottom" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-print" style="font-size: 20px; color:#0682dab4;"></i></a>
                                                    </div>
                                                <div class="col d-flex nav justify-content-end">
                                                    <a href="#basic-table" data-bs-toggle="tooltip" title="fermer" id="T" class="btn btn-sm pull-right" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash" style="font-size: 20px; color:#D9B8F7;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection
 @section('footer')
 @endsection








