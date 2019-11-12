@extends('layouts.dashboard',['section'=>'Academie'])

@section('add-css')
    <style>
        .card-footer div{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 250px;
        }
        .card img{
            max-width: 200px;
        }
    </style>
@endsection

@section('second_header')
    @include('dashboard.admin.admin_head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-10 m-auto text-center h3">
            <b>Academie</b>
        </div>
        <hr>
       <div class="col-12 m-auto border">
            <b class="h4" class="text-underline">
                <a href="{{ route('departement.index') }}">Departements</a>
            </b>
            <div class="mt-4 row">
                @foreach ($departements as $depart)
                    <a href="{{ route('departement.show',$depart) }}">
                        <div class="card m-1 ">
                            <div class="card-header text-center h3">
                                {{ $depart->nom }}
                            </div>
                            <div class="card-body text-center h-100">
                                <img src="{{ asset('images/'.$depart->photo) }}" height="150" width="150" alt="{{ $depart->nom }}">
                            </div>
                            <div class="card-footer text-center">
                                <div>
                                    {{ $depart->description }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
       </div>
       <div class="col-12 border mt-3">
           <b class="h4">
                <a href="{{ route('class.index') }}">
                    Niveaux
                </a>
            </b>
            <div class="mt-4 row">
                @foreach ($classes as $class)
                    <div class="card m-1">
                        <a href="{{ route('class.show',$class) }}">
                            <div class="card-header text-center">
                                <div class="h3">
                                    {{ $class->nom }}
                                </div>
                                <div class="h5">
                                    @foreach ($departements as $dept)
                                        @if ($dept->id==$class->departement)
                                            {{ $dept->nom }}
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body text-center h-100">
                                <img src="{{ asset('images/'.$class->photo) }}" height="150" width="150" alt="{{ $class->nom }}">
                            </div>
                            <div class="card-footer text-center">
                                <div>
                                    {{ $class->description }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
       </div>
    </div>
@endsection