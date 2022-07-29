@extends('layouts.homepageLayout')
@section('title', 'Profilo utente')
@section('profile')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Profilo</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi visualizzare i tuoi dati utente. </h4>
<section class="find_section layout_padding">
    
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="form_tab_container">
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="rent">
                            <div class="Rent_form find_form">
                                    <div>
                                        <div class="content">
                                            <div class="individual__section">
                                                <center>
                                                    <div class="d-none d-md-block col-md-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h3 class="h2 mr-auto">Ciao {{Auth::user()->username}} !</h3>
                                                                    @can('isUtente')<a href="{{ route('profileEdit') }}" id="PulsanteModProf">&nbsp;Modifica il profilo</a>@endcan
                                                        </div><br>
                                                        <div class="account-info">
                                                            <div class="row py-2">
                                                                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Nome</div>
                                                                <div class="col-12 col-md-8 col-xl-9 dd"><span>{{Auth::user()->nome}}</span></div>
                                                            </div>
                                                            <hr>
                                                            <div class="row py-2">
                                                                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Cognome</div>
                                                                <div class="col-12 col-md-8 col-xl-9 dd"><span>{{Auth::user()->cognome}}</span></div>
                                                            </div>
                                                            <hr>
                                                            <div class="row py-2">
                                                                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Data di nascita</div>
                                                                <div class="col-12 col-md-8 col-xl-9 dd">{{Auth::user()->data_nascita}}</div>
                                                            </div>
                                                            <hr>
                                                                <div class="row py-2">
                                                                    <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Genere</div>
                                                                    <div class="col-12 col-md-8 col-xl-9 dd">{{Auth::user()->genere}}</div>

                                                                </div>
                                                                <hr>

                                                                <div class="row py-2">
                                                                    <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Email</div>
                                                                    <div class="col-12 col-md-8 col-xl-9 dd">{{Auth::user()->email}}</div>
                                                                </div>
                                                                <hr>
                                                                <div class="row py-2">
                                                                    <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Numero</div>
                                                                    <div class="col-12 col-md-8 col-xl-9 dd">+39&nbsp;{{Auth::user()->telefono}}</div>
                                                                </div>
                                                        </div>


                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
</section>


                       <center> <div class="col-lg-2 col-sm-2 col-lg-offset-0 col-sm-offset-3">
                           @auth
                           <button title="Esci dal sito" id="PulsanteModProf" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                           @endauth
                           <!-- <button type="submit" class="btn btn-primary" name="Submit">Logout</button>-->
                        </div></center><br>

@endsection