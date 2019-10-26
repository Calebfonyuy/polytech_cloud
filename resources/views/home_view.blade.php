@extends('layouts.default')

@section('header')
    @include('partials.default_header',['state'=>0])
@endsection

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
            <div class="col-lg-4 col-md-4">
                <img src="{{ asset('images/logo.jpg') }}" class="w-75" alt="LOGO EQUIPE">
            </div>
            <div class="col-lg-7 col-md-7 m-auto text-center text-danger" id="page-title">
                LE CLOUD DE L'ENSP
            </div>
        </div>
        <div class="col-lg-10 m-auto p-3 text-center text-success h4" id="description">
            <b>Le bon endroit pour preparer son controle continu et son examen</b>
        </div>
        <div class="col-lg-10 m-auto p-5 text-dark h6 row" id="headlines">
            <div class="col-12 m-2">
                Vos documents sont class&eacute;s par:
            </div>
            <ul class="col-lg-5 col-md-5 m-auto">
                <li>Type: &eacute;preuve ou correction</li>
                <li>Ann&eacute;e</li>
                <li>Semestre</li>
            </ul>
            <ul class="col-lg-5 col-md-5 m-auto">
                <li>Mati&egrave;re</li>
                <li>Niveau</li>
                <li>Departement</li>
            </ul>
        </div>
        <div style="height:100px;">&nbsp;</div>
    </div>
@endsection