@extends('layouts.dashboard',['section'=>'Tous les departements'])

@section('content')
    <div class="container-fluid">
        <div class="text-center m-3 h3">
            <b>Departements</b>
        </div>
        <div class="row depts">
            @foreach ($departements as $dept)
                <div class="col-lg-5 col-md-5 mr-auto ml-auto mt-auto mb-4 p-3 border border-danger bg-dark">
                    <a href="{{ route('dept_class',$dept->id) }}" class="row">
                        <div class="col-3">
                            <img src="{{ asset('images/'.$dept->photo) }}" alt="{{ $dept->nom }}" class="w-100 h-100">
                        </div>
                        <div class="col-9">
                            <legend class="h4">{{ $dept->nom }}</legend>
                            <div class="text-truncate tiny">
                                {{ $dept->description }}
                            </div>
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
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection