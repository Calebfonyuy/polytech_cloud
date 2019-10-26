<div class="nav navbar fixed-top bg-dark">
    <div class="navbar navbar-expand-lg navbar-expand-md">
        <div class="collapse navbar-collapse">
            <a href="{{ route('accueil') }}" class="text-dark">
                <img src="{{ asset('images/logo.jpg') }}" height="50" alt="LOGO ENSP">
                CLOUD ENSP
            </a>
        </div>
    </div>
    <div>
        <div class="text-truncate">
            {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="{{ route('deconnexion') }}">Deconnexion</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="#" class="p-2">A&nbsp;propos</a>
            </div>
        </div>
    </div>
    <div id="main-nav">
        <div class="m-auto text-center row navbar navbar-expand-lg">
            <button class="bg-light navbar-toggler collapsed btn btn-light"
            data-toggle="collapse" data-target="#navdata" aria-controls="navdata"
            aria-expanded="false">
                <span class="icon-bar">Menu</span>
            </button>
            <div class="collapse navbar-collapse row" id="navdata">
                <ul class="m-auto nav navbar-nav">
                    <li class="btn-link m-2">
                        <a href="{{ route('accueil') }}">
                            Accueil
                        </a>
                    </li>
                    <li class="btn-link m-2">
                        <a href="{{ route('gen_dept') }}">
                            Departements
                        </a>
                    </li>
                    <li class="btn-link m-2">
                        <a href="{{ route('statistics') }}">
                            Statistiques
                        </a>
                    </li>
                    @if (Auth::user()->admin)
                        <li class="btn-link m-2">
                            <a href="{{ route('admin_home') }}">
                                Administration
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>