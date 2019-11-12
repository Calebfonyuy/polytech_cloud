@extends('layouts.dashboard',['section'=>$departement->nom])

@section('add-css')
    <style>
        .card-footer{
            overflow: hidden;
            text-overflow: wrap;
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
            <b>{{ $departement->nom }}</b>
        </div>
       <div class="col-12 mt-3">
           <div class="row">
               <div class="col-lg-8 col-md-8 m-auto h4">
                    Niveaux
               </div>
               <div class="col-lg-2 col-md-2 m-auto">
                   <a href="{{ route('class.index') }}" class="btn btn-primary">Ajouter un niveau</a>
               </div>
               <div class="col-12">
                   <hr>
               </div>
           </div>
            <div class="row">
                @foreach ($classes as $class)
                    <div class="col-lg-5 col-md-5 card m-auto">
                        <a href="{{ route('class.show',$class) }}">
                            <div class="card-header text-center">
                                <div class="h3">
                                    {{ $class->nom }}
                                </div>
                            </div>
                            <div class="card-body text-center h-100">
                                <img src="{{ asset('images/'.$class->photo) }}" height="150" width="150" alt="{{ $class->nom }}">
                            </div>
                            <div class="card-footer text-center">
                                {{ $class->description }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
       </div>

       <div class="col-12 mt-3">
            <span class="h4">Matieres</span>
            <hr>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <th>Nom</th>
                    <th>Niveau</th>
                    <th>Semestre</th>
                    <th>Cr&eacute;dits</th>
                    <th>Description</th>
                </thead>
                <tbody>
                    @foreach ($matieres as $mat)
                        <tr>
                            <td>{{ $mat->nom }}</td>
                            <td>
                                @foreach ($classes as $class)
                                    @if ($class->id==$mat->classe)
                                        {{ $class->nom }}
                                        @break
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $mat->semester }}</td>
                            <td>{{ $mat->credits }}</td>
                            <td>{{ $mat->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection