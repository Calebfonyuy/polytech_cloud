@extends('layouts.default',['section'=>'Inscription'])


@section('add-css')
    <style>
        body{
            background-image: url("../images/acceuil.png");
            background-repeat: no-repeat;
            background-size: cover
        }
        #register-area{
            background-color: rgba(240, 230, 230, 0.76);
            border-radius: 30px;
        }
    </style>
@endsection

@section('header')
    @include('partials.default_header',['state'=>2])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-lg-8 col-md-8 col-sm-10 m-auto border border-danger" id="register-area">
            <div class="text-center h4 text-capitalize">
                Inscription sur la plateforme des epreuves de l'ENSP
            </div>
            <form action="{{ route('inscription') }}" method="post" class="form">
                {{ csrf_field() }}
                <div class="form-group text-center text-danger">
                    @if (isset($message))
                        {{ $message }}
                    @endif
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3">
                        <label for="matricule" class="form-label">Matricule</label>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <input type="text" name="matricule" id="matricule" class="form-control" autocomplete="off" value="{{ old('matricule') }}" required>
                        {!! $errors->first('matricule','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3">
                        <label for="nom" class="form-label">Noms</label>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <input type="text" name="nom" id="nom" class="form-control" autocomplete="off" value="{{ old('nom') }}" required>
                        {!! $errors->first('nom','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3">
                        <label for="nom" class="form-label">Prenoms</label>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <input type="text" name="prenom" id="prenom" class="form-control" autocomplete="off" value="{{ old('prenom') }}" required>
                        {!! $errors->first('prenom','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3">
                        <label for="email" class="form-label">Adresse Mail</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="email" name="email" id="email" class="form-control" autocomplete="off" value="{{ old('email') }}" required>
                        {!! $errors->first('email','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3">
                        <label for="password" class="form-label">Mot&nbsp;de&nbsp;passe</label>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
                        {!! $errors->first('password','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3">
                        <label for="confirmation" class="form-label">Confirmation</label>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <input type="password" name="confirmation" id="confirmation" class="form-control" value="{{ old('confirmation') }}" required>
                        {!! $errors->first('confirmation','<span class="alert alert-danger form-check">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group text-center mt-3">
                    <input type="submit" class="btn btn-dark w-75" id="submit" name="submit" value="Je m'inscris"">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <div style="height: 250px;"></div>
@endsection