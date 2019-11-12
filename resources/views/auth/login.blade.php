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
                <form action="{{ route('connexion') }}" class="form" method="POST" id="main-form">
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
                <div class="m-1 text-center text-danger h6" style="cursor: pointer;">
                    <span class="btn-link" data-toggle="modal" data-target="#change-passwd" id="change-link">
                        Mot de passe oubli&eacute;?
                    </span>
                </div>
                <div class="text-center m-auto pt-4">
                    Vous n'avez pas encore de compte?<br>
                    <a href="{{ route('req_inscription') }}">Cr&eacute;er votre compte ici</a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="change-passwd" aria-hidden="true" aria-labelledby="change-link">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title h3">
                            Changer le Mot de Passe
                        </div>
                    </div>
                    <div class="modal-body">
                        <span class="text-danger" id="notif"></span>
                        <div id="first-step">
                            <legend>V&eacute;rification d'identit&eacute;</legend>
                            <caption>
                                Veuillez remplir les informations avec lesquelles votre compte a &eacute;t&eacute; cr&eacute;&eacute;<br>
                            </caption>
                            <form action="#" class="form inline-form row" id="email-form" onsubmit="return requestInfo()">
                                <div class="col-lg-6 col-md-6">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Adrèsse Mail" required>
                                    <span class="invalid-feedback">Email Invalide</span>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <input type="text" name="matric" id="matric" class="form-control" placeholder="Matricule" required>
                                    <span class="invalid-feedback">Matricule Invalide</span>
                                </div>
                                <div class="col-lg-3 col-md-3 text-center mt-2">
                                    <input type="submit" value="Verifier" class="btn btn-dark">
                                </div>
                            </form>
                        </div>
                        <div id="second-step" hidden="hidden">
                            <legend>Confirmation d'identit&eacute;</legend>
                            <caption>Veillez entrer votre prenom.</caption>
                            <form action="#" class="form form-inline" id="second-form" onsubmit="return checkName()">
                                <div class="input-group m-1">
                                    <input type="text" name="name-check" id="name-check" class="form-control">
                                    <span class="invalid-feedback">Nom Invalide</span>
                                </div>
                                <input type="submit" value="Verifier" class="btn btn-dark m-2">
                            </form>
                        </div>

                        <div id="third-step" hidden="hidden">
                            <legend>Nouveau Mot De Passe</legend>
                            <caption>Veuillez entrer &agrave; pr&eacute;sent votre nouveau mot de passe</caption>
                            <form action="#" class="form" id="third-form" onsubmit="return confirmPassword()">
                                <div class="input-group row">
                                    <label for="npass" class="form-label col-lg-3 col-md-3">Mot de passe</label>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="password" name="npass" id="npass" class="m-1 form-control" required>
                                        <span class="invalid-feedback">Trop court</span>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label for="npass2" class="form-label col-lg-3 col-md-3">Confirmation</label>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="password" name="npass2" id="npass2" class="m-1 form-control" requiredlg->
                                        <span class="invalid-feedback">Trop court</span>
                                    </div>
                                </div>
                                <div class="text-center m-1">
                                    <input type="submit" value="Changer mon mot de passe" class="btn btn-dark">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" id="close-btn">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div style="height: 250px;"></div>
@endsection

@section('add-js')
    <script>
        let user = null;
        $('#change-link').click(function () {
            user = null;
            $('input[type=text], input[type=email], input[type=password]').val('');
            reset();
            $('#first-step').removeAttr('hidden');
            $('#second-step, #third-step').attr('hidden','hidden');
        });

        function requestInfo() {
            reset();
            let mail = $('#email').val();
            let matr = $('#matric').val();

            $.ajax({
                url: "{{ route('pass_reset') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: mail,
                    matricule: matr,
                    step: 1
                },
                success: function (data) {
                    if (data=="mat_err") {
                        $('#matric').addClass('is-invalid');
                    } else if(data=='mail_err') {
                        $('#email').addClass('is-invalid');
                    }else{
                        user = JSON.parse(data);
                        $('#first-step').attr('hidden','hidden');
                        $('#second-step').removeAttr('hidden');
                    }
                },
                error: function (data) {
                    $('#notif').html("Erreur d'obtention des donn&eacute;es. Veuillez essayer &aacute; nouveau.");
                }
            });

            return false;
        }

        function checkName() {
            reset();
            let given = $('#name-check').val();

            if (given.toLowerCase()==user.prenom.toLowerCase()) {
                $('#second-step').attr('hidden','hidden');
                $('#third-step').removeAttr('hidden');
            } else {
                $('#name-check').addClass('is-invalid');
            }

            return false;
        }

        function confirmPassword() {
            reset();
            let pass = $('#npass').val();
            let check = $('#npass2').val();
            if (pass.length!=check.length||!(pass.endsWith(check))) {
                $('#notif').html("Les deux mots de passe ne correspondent pas.");
            } else if(pass.length<6){
                $('#notif').html("Le mot de passe doit avoir au moins 6 caract&egrave;res.");
            } else {
                $.ajax({
                    url: "{{ route('pass_reset') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        matricule: user.matricule,
                        password: pass
                    },
                    success: function (data) {
                        if(data=="OK"){
                            $('#notif').html("Votre mot de passe a &eacute;t&eacute; modifi&eacute; avec success. Vos serez automatiquement connect&eacute dans quelques seconds");
                            $('#close-btn').hide();
                            $('#third-step').hide();
                            setTimeout(signInUser, 2000,user.matricule, pass);
                        }else{
                            $('#notif').html("Erreur d'enregistrement du nouveau mot de passe. Veuillez essayer &agrave; nouveau.");    
                        }
                    },
                    error: function (data) {
                        $('#notif').html("Erreur d'enregistrement du nouveau mot de passe. Veuillez essayer &agrave; nouveau.");
                    }
                });
            }

            return false;
        }

        function signInUser(matricule, password) {
            $('#matricule').val(matricule);
            $('#password').val(password);
            $('#main-form button[type=submit]').click();
        }

        function reset() {
            $('.is-invalid').removeClass('is-invalid');
            $('#notif').html('');
        }
    </script>
@endsection