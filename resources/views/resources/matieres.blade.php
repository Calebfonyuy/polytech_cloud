@extends('layouts.dashboard',['section'=>'Matieres-'.$class->nom.'-'.$departement->nom])

@section('add-css')
    <style>
        .item{
            border-radius: 25px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="text-center m-3 h3">
            <b>Mati&egrave;res de {{ $class->nom }}-{{ $departement->nom }}</b>
        </div>
        <div class="col-11 m-auto row">
            <div class="col-12  text-capitalize h4">
                Premiere semestre
                <hr>
            </div>
            @foreach ($matieres as $mat)
                @if ($mat->semester==1)
                    <div class="col-lg-3 col-md-3 col-sm-5 h-100 card bg-dark text-white item">
                        <div class="card-header h5">{{ $mat->nom }}</div>
                        <div class="card-body text-center">
                            {{ $mat->description }}
                        </div>
                        <div class="card-footer text-center">
                            <div>
                                <i>Ann&eacute;es disponibles</i>
                            </div>
                            <div>
                                <ul>
                                    @foreach ($mat->years as $year)
                                        <li>
                                            <a href="{{ route('gen_docs',[$departement->id,$class->id,$mat->id,$year->annee]) }}">
                                                {{ $year->annee }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="col-12 text-capitalize h4 mt-4">
                Second semestre
                <hr>
            </div>
            @foreach ($matieres as $mat)
                @if ($mat->semester==2)
                    <div class="col-lg-3 col-md-3 col-sm-5 h-100 card bg-dark text-white item">
                        <div class="card-header h5">{{ $mat->nom }}</div>
                        <div class="card-body text-center">
                            {{ $mat->description }}
                        </div>
                        <div class="card-footer text-center">
                            <div>
                                <i>Ann&eacute;es disponibles</i>
                            </div>
                            <div>
                                <ul>
                                    @foreach ($mat->years as $year)
                                        <li>
                                            <a href="{{ route('gen_docs',[$departement->id,$class->id,$mat->id,$year->annee]) }}">
                                                {{ $year->annee }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection