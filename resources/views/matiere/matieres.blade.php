@extends('layouts.dashboard',['section'=>$class->nom])

@section('second_header')
    @include('dashboard.admin.admin_head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-10 m-auto text-center h3">
            <b>Gestion des matieres de {{ $class->nom }} - {{ $departement->nom }}</b>
        </div>
        <div class="row m-auto">
            <div class="col-lg-5 col-md-5 border">
                <span class="h4">Liste des matieres</span>
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <th>Nom</th>
                        <th>Cr&eacute;dits</th>
                        <th>Semestre</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        @foreach ($matieres as $mat)
                            <tr>
                                <td>{{ $mat->nom }}</td>
                                <td>{{ $mat->credits }}</td>
                                <td>{{ $mat->semester }}</td>
                                <td>{{ $mat->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-md-6 m-auto border">
                <legend class="text-center h4">Ajouter une matiere</legend>
                <form action="{{ route('matiere.store') }}" method="post" class="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="class" id="class" value="{{ $class->id }}">
                    <input type="hidden" name="dept" id="dept" value="{{ $departement->id }}">
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom de la matiere</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="credit" class="form-label">Cr&eacute;dits</label>
                        <select name="credit" id="credit" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="form-label">Semestre</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="1">Semestre 1</option>
                            <option value="2">Semestre 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="7" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ajouter" class="form-control btn btn-warning" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection