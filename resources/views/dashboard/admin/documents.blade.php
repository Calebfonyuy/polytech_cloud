@extends('layouts.dashboard',['section'=>'Documents'])

@section('add-css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
@endsection

@section('second_header')
    @include('dashboard.admin.admin_head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-10 text-center m-auto h3">
            <b>Gestion des Documents</b>
        </div>
        <div class="m-auto p-3 border bg-secondary">
            <div class="text-left m-auto h5 pl-4">
                Nouveau Document
            </div>
            <form action="{{ route('document.store') }}" method="post" class="form" onsubmit="return checkForm()">
                {{ csrf_field() }}
                <div class="row m-1">
                    <div class="col-12 p-2 border">
                        <label for="dept" class="form-label">Departement</label>
                        <select name="dept" id="dept" class="form-control">
                            <option value="00">--Choisir--</option>
                            @foreach ($departements as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->nom }}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback">Obligatoire</span>
                    </div>
                    <div class="col-lg-4 col-md-4 p-2 border">
                        <label for="class" class="form-label">Niveau</label>
                        <select name="class" id="class" class="form-control">
                            <option value="00">--Choisir--</option>
                        </select>
                        <span class="invalid-feedback">Obligatoire</span>
                    </div>
                    <div class="col-lg-4 col-md-4 p-2 border">
                        <label for="mat" class="form-label">Matiere</label>
                        <select name="mat" id="mat" class="form-control">
                            <option value="00">--Choisir--</option>
                        </select>
                        <span class="invalid-feedback">Obligatoire</span>
                    </div>
                    <div class="col-lg-4 col-md-4 p-2 border">
                        <label for="annee" class="form-label">Ann&eacute;e Academique</label>
                        <select name="annee" id="annee" class="form-control">
                            <option value="00">--Choisir--</option>
                            @for ($i = 2000; $i <= (int)date('Y'); $i++)
                                <option value="{{ $i."-".($i+1) }}">{{ $i."-".($i+1) }}</option>
                            @endfor
                        </select>
                        <span class="invalid-feedback">Obligatoire</span>
                    </div>
                    <div class="col-lg-4 col-md-4 p-2 border">
                        <label for="type" class="form-label">Type du document</label>
                        <select name="type" id="type" class="form-control">
                            <option value="99">--Choisir--</option>
                            <option value="0">Epreuve</option>
                            <option value="1">Correction</option>
                        </select>
                        <span class="invalid-feedback">Obligatoire</span>
                    </div>
                    <div class="col-lg-4 col-md-4 p-2 border">
                        <label for="nom" class="form-label">Nom du document</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="col-lg-4 col-md-4 p-2 border">
                        <label for="lien" class="form-label">Lien du document</label>
                        <input type="text" name="lien" id="lien" class="form-control" required>
                    </div>
                </div>
                <div class="col-12 text-center m-auto pt-3">
                    <input type="submit" value="Ajouter" class="w-50 btn btn-warning" id="submit">
                </div>
            </form>
        </div>
        <div class="m-2">&nbsp;</div>
        <div class="m-auto border">
            <legend class="text-center h3">Tous les documents</legend>
            <table class="table table-bordered table-hover" id="document-table">
                <thead class="thead-light">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Matiere</th>
                    <th>Ann&eacute;e</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($documents as $doc)
                        <tr>
                            <td>{{ str_pad($doc->id,7,'0',STR_PAD_LEFT) }}</td>
                            <td>{{ $doc->nom }}</td>
                            <td>
                                @if ($doc->type)
                                    {{ "Correction" }}
                                @else
                                    {{ "Epreuve" }}
                                @endif
                            </td>
                            <td>
                                @foreach ($matieres as $mat)
                                    @if ($mat->id==$doc->matiere)
                                        {{ $mat->nom }}
                                        @break
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $doc->annee }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="//{{ $doc->lien }}" target="_blank" class="btn btn-success" download>Telecharger</a>
                                    </div>
                                    <div class="col-6">
                                        @if ($doc->status)
                                            <form action="{{ route('document.destroy',$doc) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="Supprimer" class="form-control btn btn-danger" id="submit">
                                            </form>
                                        @else
                                            <i>Supprim&eacute;</i>
                                        @endif
                                    </div>
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
        const classes = {!! json_encode($classes) !!};
        $('#document-table').dataTable({language: languageArr});

        $('#dept').change(function () {
            $('#mat').html('<option value="00">--Choisir--</option>');
            if ($(this).val()=="00") {
                $('#class').html('<option value="00">--Choisir--</option>');
            }else{
                let value = '<option value="00">--Choisir--</option>';
                for (let i = 0; i < classes.length; i++) {
                    const element = classes[i];
                    if (element.id==$(this).val()) {
                        value += '<option value="'+element.id+'">'+element.nom+'</option>'
                    }
                }
                $('#class').html(value);
            }
        });

        $('#class').change(function () {
            if ($(this).val()=='00') {
                $('#mat').html('<option value="00">--Choisir--</option>');
            }else{
                $.ajax({
                    url: "{{ route('document.index') }}/"+$(this).val(),
                    method: "GET",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                      data = JSON.parse(data);
                      let value = '<option value="00">--Choisir--</option>';
                      for (let i = 0; i < data.length; i++) {
                          const element = data[i];
                          value += '<option value="'+element.id+'">'+element.nom+'</option>'
                      }
                      $('#mat').html(value);
                    },
                    error: function (data) {
                        $('#mat').html('');
                    }
                });
            }
        });

        function checkForm() {
            let valid = true;
            $('.is-invalid').removeClass('is-invalid');
            if ($('#dept').val()=='00') {
                $('#dept').addClass('is-invalid');
                valid = false;
            }
            if ($('#class').val()=="00") {
                $('#class').addClass('is-invalid');
                valid = false;
            }
            if ($('#mat').val()=="00") {
                $('#mat').addClass('is-invalid');
                valid= false;
            }

            if ($('#annee').val()=="00") {
                $('#annee').addClass('is-invalid');
                valid = false;
            }

            if ($('#type').val()=="99") {
                $('#type').addClass('is-invalid');
                valid = false;
            }

            return valid;
        }
    </script>
@endsection