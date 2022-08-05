@extends('layouts.homepageLayout')
@section('title', 'Profilo utente')
@section('profile')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Profilo di {{$utente[0]->nome}} {{$utente[0]->cognome}}</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi visualizzare il profilo di un altro utente. </h4>
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
                                                        <h3 class="h2 mr-auto">{{$utente[0]->username}}</h3> <a href="#" id="pulsanteVediBlog">Aggiungi + </a>
                                                    </div>
                                                    <div class="account-info">
                                                        <div class="row py-2">
                                                            <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Nome</div>
                                                            <div class="col-12 col-md-8 col-xl-9 dd"><span>{{$utente[0]->nome}}</span></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row py-2">
                                                            <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Cognome</div>
                                                            <div class="col-12 col-md-8 col-xl-9 dd"><span>{{$utente[0]->cognome}}</span></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row py-2">
                                                            <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Data di nascita</div>
                                                            <div class="col-12 col-md-8 col-xl-9 dd">{{$utente[0]->data_nascita}}</div>
                                                        </div>
                                                        <hr>
                                                        <div class="row py-2">
                                                            <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Genere</div>
                                                            <div class="col-12 col-md-8 col-xl-9 dd">{{$utente[0]->genere}}</div>

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

                @endsection