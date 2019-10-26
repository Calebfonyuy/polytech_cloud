@extends('layouts.dashboard',['section'=>'Statistics'])

@section('content')
    <div class="container-fluid row">
        <div class="col-10 m-auto text-center h3">
            <b>Statistiques generales du site</b>
        </div>
        
        <div class="col-12">
            <legend>Departements</legend>
            <hr>
            <div class="row">
                
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <th>No</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Nombre des niveaux</th>
                    <th>Nombre des matieres</th>
                    <th>Nombre des documents</th>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($departements as $dept)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $dept->nom }}</td>
                            <td>{{ $dept->description }}</td>
                            <td>{{ $dept->classes }}</td>
                            <td>{{ $dept->matieres }}</td>
                            <td>{{ $dept->documents }}</td>
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
                    <th>Description</th>
                    <th>Nombre des matieres</th>
                    <th>Nombre des documents</th>
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
                            <td>{{ $class->description }}</td>
                            <td>{{ $class->matieres }}</td>
                            <td>{{ $class->documents }}</td>
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
                    <th>Description</th>
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
                        <td>{{ $mat->description }}</td>
                        <td>{{ $mat->semester }}</td>
                        <td>{{ $mat->documents }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection