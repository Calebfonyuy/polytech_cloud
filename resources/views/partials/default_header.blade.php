<div class="nav navbar fixed-top bg-dark">
    @if ($state!=0)
        <div class="col-lg-6 col-md-6 row">
            <div class="col-2">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.jpg') }}" height="60" alt="LOGO EQUIPE">
                </a>
            </div>
            <div class="col-9 h-100 mr-auto mt-auto mb-auto p-auto text-white h3" id="school-name">
                LE CLOUD
            </div>
        </div>
    @endif
    <div class="{{ $state==0?"col-12":"col-lg-6 col-md-6" }} text-right">
        @if ($state!=1)
            <a href="{{ route('req_connexion') }}" class="m-2 p-2">Se&nbsp;Connecter</a>
        @endif
        @if ($state!=2)
            <a href="{{ route('req_inscription') }}" class="m-2 p-2">S'inscrire</a>
        @endif
        <a href="{{ route('about') }}" class="m-2 p-2">A&nbsp;propos</a>
    </div>
</div>