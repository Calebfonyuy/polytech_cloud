<div class="nav navbar fixed-top bg-dark row m-0">
    <div class="col-lg-2 col-md-0 col-sm-0 col-xs-0 navbar navbar-expand-lg navbar-expand-md">
        <div class="collapse navbar-collapse row">
            <a href="{{ route('accueil') }}" class="text-dark col-4">
                <img src="{{ asset('images/logo.jpg') }}" height="50" alt="LOGO ENSP">
            </a>
            <div class="col-7 text-white">
                LE CLOUD
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 text-right row">
        <div class="text-center row m-auto navbar navbar-expand-lg">
            <button class="btn btn-danger bg-danger navbar-toggler collapsed"
            data-toggle="collapse" data-target="#navdata" aria-controls="navdata"
            aria-expanded="false">
                <span class="icon-bar">
                    <span class="fa fa-align-justify"></span>&nbsp;LE CLOUD
                </span>
            </button>
            <div class="collapse navbar-collapse row" id="navdata">
                <ul class="col-lg-8 col-md-8 m-auto nav navbar-nav">
                    <li class="btn-link m-2 font-weight-bold">
                        <a href="{{ route('accueil') }}">
                            Accueil
                        </a>
                    </li>
                    <li class="btn-link m-2 font-weight-bold">
                        <a href="{{ route('gen_dept') }}">  
                            Departements
                        </a>
                    </li>
                    <li class="btn-link m-2 font-weight-bold">
                        <a href="{{ route('statistics') }}">
                            Statistiques
                        </a>
                    </li>
                    @if (Auth::user()->admin)
                        <li class="btn-link m-2 font-weight-bold">
                            <a href="{{ route('admin_home') }}">
                                Administration
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="col-lg-4 col-md-4 text-truncate text-right">
                    <div class="text-light">
                        {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 font-weight-bold">
                            <a href="{{ route('deconnexion') }}">Deconnexion</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 font-weight-bold">
                            <a href="{{ route('about') }}" class="m-2 p-2">A&nbsp;propos</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>