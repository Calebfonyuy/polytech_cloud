@extends('layouts.dashboard',['section'=>'Utilisateurs'])

@section('add-css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
@endsection

@section('second_header')
    @include('dashboard.admin.admin_head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-10 m-auto text-center h3">
            <b>Gestion des utilisateurs</b>
        </div>
        <div class="col-10 m-auto">
            Nombre total des utilisateurs: <b class="h3">{{ count($users) }}</b>
        </div>
        <hr>
        <div class="m-auto">
            <table class="table table-bordered table-hover" id="userTbl">
                <thead class="thead-light">
                    <th>ID</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Inscrit le</th>
                    <th>Type</th>
                    <th>Etat</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ str_pad($user->id,5,'0',STR_PAD_LEFT) }}</td>
                            <td>{{ $user->matricule }}</td>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        @if ($user->admin)
                                            {{ "Administrateur" }}
                                        @else
                                            {{ "Normale" }}
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <form action="{{ route('user.show',$user) }}" method="get" class="form form-inline">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-info" id="activer" 
                                            {{ ($user->delete||($user->id==Auth::user()->id))?"disabled":"" }}>
                                                Changer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($user->delete)
                                    {{ "Supprimé" }}
                                @else
                                    @if ($user->disable)
                                        {{ "Desactivé" }}
                                    @else
                                        {{ "Actif" }}
                                    @endif
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-{{ $user->delete?"12":"6" }} col-md-{{ $user->delete?"12":"6" }}">
                                        <form action="{{ route('user.update',$user) }}" method="post" class="form form-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <button type="submit" class="btn {{ $user->disable?"btn-secondary":"btn-success" }} activer" data-id="{{ $user->id }}" {{ $user->admin?"disabled":"" }}>
                                                {{ $user->disable ?"Activer":"Desactiver" }}
                                            </button>
                                        </form>
                                    </div>
                                    @if (!$user->delete)
                                        <div class="col-lg-6 col-md-6">
                                            <form action="{{ route('user.destroy',$user) }}" method="post" class="form form-inline" >
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger supprimer" {{ $user->admin?"disabled":"" }}>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('add-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script>
        $('#userTbl').dataTable({language: languageArr});
    </script>
@endsection