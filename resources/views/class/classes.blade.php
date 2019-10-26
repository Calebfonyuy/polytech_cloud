@extends('layouts.dashboard',['section'=>'Classes'])

@section('second_header')
    @include('dashboard.admin.admin_head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-10 m-auto text-center h3">
            <b>Gestion des niveaux</b>
        </div>
        <div class="row m-auto">
            <div class="col-lg-5 col-md-5 mr-auto">
                <span><u>Liste des niveaux</u></span>
                <ol>
                    @foreach ($classes as $class)
                        <li>
                            {{ $class->nom }} - 
                            @foreach ($departements as $dept)
                                @if ($dept->id==$class->departement)
                                    {{ $dept->nom }}
                                @endif
                            @endforeach
                            <br>{{ $class->description }}
                        </li>
                    @endforeach
                </ol>
            </div>

            <div class="col-lg-5 col-md-5">
                <legend>Ajouter un niveaux</legend>
                <form action="{{ route('class.store') }}" method="post" 
                class="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="dept" class="form-label">Departement</label>
                        <select name="dept" id="dept" class="form-control">
                            @foreach ($departements as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="7" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ajouter" name="submit" class="form-control btn btn-warning" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection