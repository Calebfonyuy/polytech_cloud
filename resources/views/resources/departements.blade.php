@extends('layouts.dashboard',['section'=>'Tous les departements'])

@section('content')
    <div class="container-fluid">
        <div class="text-center m-3 h3">
            <b>Departements</b>
        </div>
        <div class="row depts">
            @foreach ($departements as $dept)
                <div class="col-lg-5 col-md-5 mr-auto ml-auto mb-4 p-3 border border-danger bg-dark row">
                    <div class="d-block d-md-none">
                        <a href="{{ route('dept_class',$dept->id) }}">
                            <legend class="h4">{{ $dept->nom }}</legend>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <img src="{{ asset('images/'.$dept->photo) }}" alt="{{ $dept->nom }}" class="w-100">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <a href="{{ route('dept_class',$dept->id) }}" class="d-none d-lg-block d-md-block">
                            <legend class="h4">{{ $dept->nom }}</legend>
                        </a>
                        <div class="tiny">
                            {{ $dept->description }}
                        </div>
                        <hr>
                        <div class="tiny">
                            <b>{{ $dept->classes }}</b> Niveaux
                        </div>
                        <div class="tiny">
                            <b>{{ $dept->matieres }}</b> Matieres
                        </div>
                        <div class="tiny">
                            <b>{{ $dept->docs }}</b> Documents
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection