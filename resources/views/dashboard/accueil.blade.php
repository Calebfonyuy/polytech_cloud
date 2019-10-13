@extends('layouts.dashboard',['section'=>'Accueil'])

@section('add-css')
    <style>
        body{
            background-image: url("../images/acceuil.png");
            background-repeat: no-repeat;
            background-size: cover
        }
        #page-title{
            font-size: 40pt;
            background-image: linear-gradient(to right,rgba(255,255,255,0.5),rgba(255,255,255,0.5));
        }
        #description{
            height: 100px;
            width: 100%;
            background-image: linear-gradient(to right,rgba(255,255,255,0.5),#ffc0c0,rgba(255,255,255,0.5));
            border-radius: 25px;
        }
        #headlines{
            background-image: linear-gradient(to right,rgba(255,255,255,0.5),#ffc0c0,rgba(255,255,255,0.5));
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
            border-radius: 25px;
        }
        #headlines ul{
            list-style-image: radial-gradient(green,black);
        }
        img{
            border-radius: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-lg-10 m-auto row">
            <div class="col-lg-2 col-md-2">
                <img src="{{ asset('images/logo.jpg') }}" class="w-25" alt="LOGO EQUIPE">
            </div>
            <div class="col-lg-9 col-md-9 m-auto text-center text-danger" id="page-title">
                BIENVENUE SUR LE CLOUD
            </div>
        </div>
        <div class="col-lg-10 m-auto p-5 text-dark h6 row" id="headlines">
            <div class="m-auto text-right h5">
                <a href="{{ route('gen_dept') }}" class="text-uppercase text-success">Commencer Ici</a>
            </div>
            <div class="col-12 m-2">
                Retrouver ici vos epreuves et corrections pour les ann&eacute;es:
            </div>
            <ul class="col-10 m-auto">
                @foreach ($years as $year)
                    <li>{{ $year->annee }}</li>
                @endforeach
            </ul>
        </div>
        <div style="height:100px;">&nbsp;</div>
    </div>
@endsection