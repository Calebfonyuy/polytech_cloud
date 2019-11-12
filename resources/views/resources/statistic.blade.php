@extends('layouts.dashboard',['section'=>'Statistics'])

@section('add-css')
    <style>
        th, td{
            width: 50%;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-10 m-auto text-center h3">
            <legend><b>Statistiques generales du site</b></legend>
        </div>
        <div class="col-12">
            @foreach ($departements as $dept)
                <div>
                    <legend><b>{{ $dept->nom }}</b></legend>
                    <hr>
                    <ol>
                        @foreach ($dept->classes as $classe)
                            <li class="h4">{{ $classe->nom }}</li>
                            <div class="bg-light">
                                <span class="h5">S&eacute;mestre 1</span>
                                <table class="m-1 table table-hover table-bordered table-sm">
                                    <thead class="thead-dark">
                                        <th>Matiere</th>
                                        <th>Documents</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($classe->sem1 as $mat)
                                            <tr>
                                                <td>{{ $mat->nom }}</td>
                                                <td>{{ $mat->documents }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg-selight">
                                <span class="h5">S&eacute;mestre 2</span>
                                <table class="m-1 table table-hover table-bordered table-sm">
                                    <thead class="thead-dark">
                                        <th>Matiere</th>
                                        <th>Documents</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($classe->sem2 as $mat)
                                            <tr>
                                                <td>{{ $mat->nom }}</td>
                                                <td>{{ $mat->documents }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </div>
@endsection