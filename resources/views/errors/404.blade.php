@extends('layouts.default',['section'=>$section??''])

@section('header')
    
    <div class="nav navbar fixed-top bg-warning row m-0">
        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 navbar navbar-expand-lg navbar-expand-md">
            <div class="collapse navbar-collapse">
                <a href="{{ route('accueil') }}" class="text-dark">
                    <img src="{{ asset('images/logo.jpg') }}" height="50" alt="LOGO ENSP">
                    CLOUD ENSP
                </a>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 text-right row">
            <div class="col-lg-8 col-md-8 col-sm-3 col-xs-3">
                <div class="m-auto text-center row navbar navbar-expand-lg">
                    <button class="bg-light navbar-toggler collapsed btn btn-light"
                    data-toggle="collapse" data-target="#navdata" aria-controls="navdata"
                    aria-expanded="false">
                        <span class="icon-bar">Menu</span>
                    </button>
                    <div class="collapse navbar-collapse row" id="navdata">
                        <ul class="m-auto nav navbar-nav bg-light">
                            <li class="btn-link m-2">
                                <a href="{{ route('accueil') }}">
                                    Accueil
                                </a>
                            </li>
                            <li class="btn-link m-2">
                                Departements
                            </li>
                            <li class="btn-link m-2">
                                Classes
                            </li>
                            <li class="btn-link m-2">
                                Statistiques
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8">
                <div class="text-truncate">
                    
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="{{ route('deconnexion') }}">Deconnexion</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="#" class="m-2 p-2">A&nbsp;propos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="container">
        <h1>Page Introuvable!!</h1>
        <hr>
        <div class="h3">
            Nous n'avons pas pu trouver la page demand&eacute; sur ce serveur. Veuillez verifier l'adresse entr&eacute;e.
        </div>
    </div>
@endsection