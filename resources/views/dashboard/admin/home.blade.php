@extends('layouts.dashboard',['section'=>'Administration'])

@section('second_header')
    @include('dashboard.admin.admin_head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-10 m-auto text-center h3">
            <b>Statistiques generales du site</b>
        </div>
        <hr>
        <div class="col-12 row m-auto">
            <legend>Utilisateurs</legend>
            <br>
            <br>
            <table class="table table-hover">
                <tr>
                    <th>Nombre total des Utilisateurs</th>
                    <td>{{ $users['admins']+$users['others'] }}</td>
                </tr>
                <tr>
                    <th>Administrateurs</th>
                    <td>{{ $users['admins'] }}</td>
                </tr>
                <tr>
                    <th>Autres Utilisateurs</th>
                    <td>{{ $users['others'] }}</td>
                </tr>
                <tr>
                    <th>Utilisateurs desactiv&eacute;s</th>
                    <td>{{ $users['inactive'] }}</td>
                </tr>
                <tr>
                    <th>Utilisateurs en pseudo-suppresssion</th>
                    <td>{{ $users['deleted'] }}</td>
                </tr>
            </table>
        </div>
        <div class="col-12">
            <legend>Departements</legend>
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <th>No</th>
                    <th>Nom</th>
                    <th>Nombre des niveaux</th>
                    <th>Nombre des matieres</th>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($departements as $dept)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $dept->nom }}</td>
                            <td>{{ $dept->classes }}</td>
                            <td>{{ $dept->matieres }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <legend>Niveaux</legend>
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <th>No</th>
                    <th>Nom</th>
                    <th>Departement</th>
                    <th>Nombre des matieres</th>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $class->nom }}</td>
                            <td>{{ $class->departement }}</td>
                            <td>{{ $class->matieres }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-12">
            Matieres
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <th>No</th>
                    <th>Nom</th>
                    <th>Niveau</th>
                    <th>Semestre</th>
                    <th>Nombre des documents</th>
                </thead>
                @php
                    $i=1;
                @endphp
                @foreach ($matieres as $mat)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $mat->nom }}</td>
                        <td>{{ $mat->nom_clas }}<br>{{ $mat->nom_dept }}</td>
                        <td>{{ $mat->semester }}</td>
                        <td>{{ $mat->documents }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection