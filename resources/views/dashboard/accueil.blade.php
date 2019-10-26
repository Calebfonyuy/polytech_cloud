@extends('layouts.dashboard',['section'=>'Accueil'])

@section('add-css')
    <style>
        body{
            background-image: url("../images/acceuil.png");
            background-repeat: no-repeat;
            background-size: cover
        }
        #page-title{
            background-image: linear-gradient(to right,rgba(255,255,255,0.5),rgba(255,255,255,0.5));
        }
        #page-title>div:nth-child(1){
            font-size: 40pt;
        }
        #page-title>div:nth-child(2){
            font-size: 30pt;
        }
        #page-title>div:nth-child(3){
            font-size: 20pt;
        }
        #shortcuts{
            text-align: center;
            height: 110pt;
        }
        #shortcuts div{
            height: 50pt;
            margin: 5pt auto;
            color: #fff;
            text-transform: uppercase;
            background-color: #c0c0c0;
            vertical-align: middle;
            padding: 20px;
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
            <div class="col-lg-2 col-md-2 d-none d-lg-block d-md-block">
                <img src="{{ asset('images/logo.jpg') }}" class="w-25" alt="LOGO EQUIPE">
            </div>
            <div class="col-lg-9 col-md-9 m-auto text-center text-danger font-weight-bold" id="page-title">
                <div class="d-none d-lg-block">
                    BIENVENU SUR LE CLOUD
                </div>
                <div class="d-none d-lg-none d-md-block">
                    BIENVENU SUR LE CLOUD
                </div>
                <div class="d-blocks d-sm-none">
                    BIENVENU SUR LE CLOUD
                </div>
            </div>
        </div>
        <div class="col-lg-10 m-auto p-2 text-dark h6 row" id="headlines">
            <div class="col-12 m-2 d-block d-md-none" id="shortcuts">
                <a href="{{ route('gen_dept') }}" class="w-100">
                    <div>
                        Departements
                    </div>
                </a>
                <a href="{{ route('statistics') }}" class="w-100">
                    <div>
                        Statistiques
                    </div>
                </a>
            </div>
            <div class="col-12" style="height=12pt">&nbsp;</div>
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