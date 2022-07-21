@extends('layouts.homepageLayout')

@section('profile')

<section class="find_section layout_padding">
    <div class="container">
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
                                                            <h3 class="h2 mr-auto">provausername
                                                                    <a href="#" style="font-size:16px;">&nbsp;Modifica il profilo</a></h3>
                                                        </div>
                                                        <div class="account-info">
                                                            <div class="row py-2">
                                                                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Nome</div>
                                                                <div class="col-12 col-md-8 col-xl-9 dd"><span>provanome</span></div>
                                                            </div>
                                                            <hr>
                                                            <div class="row py-2">
                                                                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Cognome</div>
                                                                <div class="col-12 col-md-8 col-xl-9 dd"><span>provacognome</span></div>
                                                            </div>
                                                            <hr>
                                                            <div class="row py-2">
                                                                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Genere</div>
                                                                <div class="col-12 col-md-8 col-xl-9 dd">provadata</div>
                                                            </div>
                                                            <hr>
                                                                <div class="row py-2">
                                                                    <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Data di nascita</div>
                                                                    <div class="col-12 col-md-8 col-xl-9 dd">provagenere</div>

                                                                </div>
                                                                <hr>

                                                                <div class="row py-2">
                                                                    <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Email</div>
                                                                    <div class="col-12 col-md-8 col-xl-9 dd">provaemail</div>
                                                                </div>
                                                                <hr>
                                                                <div class="row py-2">
                                                                    <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Numero</div>
                                                                    <div class="col-12 col-md-8 col-xl-9 dd">+39&nbsp;provanumero</div>
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

@endsection