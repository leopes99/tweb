@extends('layouts.homepageLayout')
@section('title', 'Modifica profilo')
@section('profileEdit')

<!-- edit section starts -->
<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Modifica profilo</h2>
    </div>
</div>
 <br>  
  <div class="container"> 
    <h4>In questa sezione puoi modificare i tuoi dati personali. Raccomandiamo di camibare la password ogni mese
    per maggiore sicurezza.</h4>
    
  <!-- ProfileEdit section starts -->
<section class="find_section layout_padding">
  
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="form_tab_container">
          <div class="tab-content text-center">
            <div class="tab-pane active" id="rent">
              

                {{ Form::open(array('route' => 'profileEdit', 'class' => 'contact-form')) }}
                  
                  <div class="form-row"> <!-- Nome e Cognome -->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                            </div>
                          </div>
                          {{ Form::text('nome', Auth::user()->nome, ['class' => 'input', 'id' => 'nome', 'style' => 'width:350px' ]) }}
                            @if ($errors->first('nome'))
                                <ul id="errore">
                                    @foreach ($errors->get('nome') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                            </div>
                          </div>
                          {{ Form::text('cognome', Auth::user()->cognome, ['class' => 'input', 'id' => 'cognome', 'placeholder'=>'Cognome', 'style' => 'width:350px']) }}
                            @if ($errors->first('cognome'))
                            <ul id="errore">
                                @foreach ($errors->get('cognome') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row"> <!-- Username e Email-->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/user.png') }}" alt="User Image" />
                            </div>
                          </div>
                          {{ Form::text('username', Auth::user()->username, ['class' => 'input','id' => 'username','placeholder'=>'Username', 'style' => 'width:350px']) }}
                            @if ($errors->first('username'))
                            <ul id="errore">
                                @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/email.png') }}" alt="Email Image" />
                            </div>
                          </div>
                          {{ Form::text('email', Auth::user()->email, ['class' => 'input','id' => 'email', 'placeholder'=>'E-mail', 'style' => 'width:350px']) }}
                            @if ($errors->first('email'))
                            <ul id="errore">
                                @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row"> <!-- Username e Email-->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/pass.png') }}" alt="Password image"/>
                            </div>
                          </div>
                          {{ Form::password('password', ['class' => 'input','id' => 'password','placeholder'=>'Nuova password', 'style' => 'width:350px']) }}
                            @if ($errors->first('password'))
                            <ul id="errore">
                                @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/pass.png') }}" alt="Password image"/>
                            </div>
                          </div>
                          {{ Form::password('password_confirmation',['class' => 'input', 'id' => 'password-confirm', 'placeholder'=>'Conferma Password', 'style' => 'width:350px']) }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row"> <!-- Data di nascità e Codice Fiscale-->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/calendario.png') }}" alt="Calendar Image" />
                            </div>
                          </div>
                          {{ Form::date('data_nascita',Auth::user()->data_nascita,['class' => 'input', 'id' => 'datanascita', 'style' => 'width:250px', 'min'=>"1900-01-01", 'max'=>"2004-01-01"]) }}
                                @if ($errors->first('data_nascita'))
                                <ul id="errore">
                                    @foreach ($errors->get('data_nascita') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                        </div>
                      </div>
                    </div>
                    <!-- Telefono-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="background-color:#B1D8FF">
                                <img src="{{ URL('images/icon/phone.png') }}" alt="Phone Image" />
                              </div>
                            </div>
                            {{ Form::text('telefono', Auth::user()->telefono, ['class' => 'input', 'id' => 'telefono', 'placeholder'=>'Telefono', 'style' => 'width:350px']) }}
                            @if ($errors->first('telefono'))
                            <ul id="errore">
                                @foreach ($errors->get('telefono') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                          </div>
                        </div>
                      </div>  
                  </div>
                <br>
                      <p>Decidi se far apparire il tuo profilo nelle ricerche di nuovi amici da parte di altri utenti.</p>
                                {{ Form::select('visibile', ["si" => 'Sì' , "no" => 'No'], ['id' => 'visibile'])}}
                                @if ($errors->first('visibile'))
                            <ul id="errore">
                                @foreach ($errors->get('visibile') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                                
                <hr>
                  <center>
                    <div class="col-md-6 px-0">
                        <p> Immettere la password attuale(o vecchia nel caso sia stata inserita una nuova password) per salvare le modifiche.</p>
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend" >
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/pass.png') }}" alt="Password image"/>
                            </div>
                          </div>
                        {{ Form::password('password_attuale', ['class' => 'input', 'id' => 'password_attuale','placeholder' => 'Password attuale' , 'style' => 'width:350px', 'required']) }}
                        @if ($message = Session::get('errore'))
                        <ul id="errore">
                            <strong>{{ $message }}</strong>
                        </ul>
                        @endif
                        
                        </div>
                      </div>
                    </div>
                      
                  </center>
                <center>
                    
                    {{ Form::submit('Salva', ['class' => 'form-btn1', 'id'=>"pulsante", 'onclick' => 'return confirm("Sicuro di voler modificare i dati?")']) }}
                </center>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  
</section>
  
</div>
<!-- profileEdit section ends -->

@endsection

