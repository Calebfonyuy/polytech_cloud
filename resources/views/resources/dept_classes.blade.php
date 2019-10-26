@extends('layouts.dashboard',['section'=>'Classes -'.$departement->nom])

@section('content')
    <div class="container-fluid">
        <div class="text-center m-3 h3">
            <b>{{ $departement->nom }}: Niveaux</b>
        </div>
        <div class="row depts">
            @foreach ($classes as $class)
                <div class="col-lg-5 col-md-5 mr-auto ml-auto mt-auto mb-3 p-3 border bg-dark border-danger row">
                    <div class="col-3">
                        @if ($class->photo!=null)
                            <img src="{{ asset('images/'.$class->photo) }}" alt="{{ $class->nom }}" class="w-100">
                        @else
                            <img src="{{ asset('images/class_icon.png') }}" alt="{{ $class->nom }}" class="w-100">
                        @endif
                    </div>
                    <div class="col-9">
                        <a href="{{ route('gen_mats',[$departement->id,$class->id]) }}">
                            <legend class="h4">{{ $class->nom }}</legend>
                        </a>
                        <div class="tiny">
                            {{ $class->description }}
                        </div>
                        <hr>
                        <div class="tiny">
                            Matieres <b>{{ $class->matieres }}</b>
                        </div>
                        <div class="tiny">
                            Documents <b>{{ $class->docs }}</b>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection