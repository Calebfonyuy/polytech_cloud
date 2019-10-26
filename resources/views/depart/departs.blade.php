@extends('layouts.dashboard',['section'=>'Departements'])

@section('second_header')
    @include('dashboard.admin.admin_head')
@endsection

@section('content')
    <div class="container-fluid m-auto">
        <div class="col-10 m-auto text-center h3">
            <b>Gestion des Departements</b>
        </div>
       <div class="row m-auto">
            <div class="col-lg-5 col-md-5 mr-auto">
                <ol>
                    @foreach ($departements as $departement)
                        <li>
                            {{ $departement->nom }}<br>
                            {{ $departement->description }}
                        </li>
                    @endforeach
                </ol>
            </div>
            <div class="col-lg-6 col-md-6 m-auto border">
                <legend>Ajouter Un Departement</legend>
                <form action="{{ route('departement.store') }}" method="post" 
                    class="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom du departement</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Description du departement</label>
                        <textarea class="form-control" id="description" name="description" rows="7" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="form-label">Photo du departement</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ajouter" class="form-control btn btn-warning">
                    </div>
                </form>
            </div>
       </div>
    </div>
@endsection