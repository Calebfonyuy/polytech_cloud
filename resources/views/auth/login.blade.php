@extends('layouts.default',['section'=>'Login'])

@section('add-css')
    <style>
        body{
            background-image: url("../images/acceuil.png");
            background-repeat: no-repeat;
            background-size: cover
        }
        #login-area{
            background-color: rgba(240, 230, 230, 0.76);
            border-radius: 30px;
        }
    </style>
@endsection

@section('header')
    @include('partials.default_header',['state'=>1])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 m-auto border border-danger"  id="login-area">
                <div class="text-center border border">
                    <div class="text-center h3">Se Connecter</div>
                    Profiter de l'ensemble des resources pour une meilleure reussite
                </div>
                <form action="{{ route('connexion') }}" class="form" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group m-3 text-center text-danger">
                        @if (isset($message))
                            {{ $message }}
                        @endif
                    </div>
                    <div class="form-group m-3">
                        <label for="matricule" class="form-label">Matricule</label>
                        <input type="text" name="matricule" id="matricule" class="form-control" autocomplete="off" required>
                        {!! $errors->first('matricule','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                    <div class="form-group m-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                        {!! $errors->first('password','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                    <div class="form-group m-3 text-center">
                        <button type="submit" class="form-control btn btn-dark form-check" id="submit" name="submit">
                            Connexion
                        </button>
                    </div>
                </form>
                <div class="text-center m-auto pt-4">
                    Vous n'avez pas encore de compte?<br>
                    <a href="{{ route('req_inscription') }}">Cr&eacute;er votre compte ici</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div style="height: 250px;"></div>
@endsection