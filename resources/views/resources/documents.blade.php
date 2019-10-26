@extends('layouts.dashboard',['section'=>'Documents pour '.$matiere->nom])

@section('add-css')
    <style>
        .doc{
            margin: auto auto 20px auto;
            height: 250px;
            width: 200px;
        }
        .card-img-top{
            height: 80px%;
            width: 100px;
            margin: auto;
        }
        @media(max-width: 992px){
            .doc{
                width: 45%;
                height: 150px;
            }

            .card-img-top{
                height: 70px;
                width: 80%;
                margin: auto;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-11 m-auto row">
            <div class="col-12 text-center h5 pt-4">
                <b>{{ $matiere->nom }}</b><br> <b>{{ $annee }} </b>
            </div>
                @if (count($epreuves)>0)
                    <div class="col-12 pl-5">
                        <b>Epreuves</b>
                        <hr>
                    </div>
                    @foreach ($epreuves as $document)
                        @if ($document->type==0)
                            <div class="card text-center doc">
                                <img src="{{ asset('images/file_icon.png') }}" alt="" class="card-img-top">
                                <div class="card-footer">
                                    <div>
                                        <b>{{ $document->nom }}</b>
                                    </div>
                                    <div>
                                        <a href="//{{ $document->lien }}" target="_blank">Telecharger</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-12">
                        <hr>
                    </div>
                @endif

                @if (count($corrections)>0)
                    <div class="col-12 pl-5">
                        <b>Corrections</b>
                        <hr>
                    </div>
                    @foreach ($corrections as $document)
                        @if ($document->type==1)
                            <div class="col-lg-3 col-md-5 card text-center doc">
                                <img src="{{ asset('images/file_icon.png') }}" alt="" class="card-img-top">
                                <div class="card-footer">
                                    <div>
                                        <b>{{ $document->nom }}</b>
                                    </div>
                                    <div>
                                        <a href="//{{ $document->lien }}" target="_blank">Telecharger</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-12">
                        <hr>
                    </div>
                @endif
        </div>
    </div>
@endsection