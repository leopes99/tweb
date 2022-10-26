@extends('layouts.homepageLayout')
@section('title', 'Aggiungi STAFF')
@section('AggiungiStaff')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Aggiungi STAFF</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi creare un nuovo membro dello STAFF. </h4>
    <br>
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="form_tab_container">
          <div class="tab-content text-center">
            <div class="tab-pane active" id="rent">
              

                {{ Form::open(array('route' => 'AddStaff', 'class' => 'contact-form')) }}
                  <div class="form-row"> <!-- Nome e Cognome -->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                            </div>
                          </div>
                          {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome', 'placeholder'=>'Nome', 'style' => 'width:350px' ]) }}
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
                          {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome', 'placeholder'=>'Cognome', 'style' => 'width:350px']) }}
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
                          {{ Form::text('username', '', ['class' => 'input','id' => 'username','placeholder'=>'Username', 'style' => 'width:350px']) }}
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
                          {{ Form::text('email', '', ['class' => 'input','id' => 'email', 'placeholder'=>'E-mail', 'style' => 'width:350px']) }}
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
                          {{ Form::password('password', ['class' => 'input','id' => 'password','placeholder'=>'Password', 'style' => 'width:350px']) }}
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
                          {{ Form::date('datanascita','',['class' => 'input', 'id' => 'datanascita', 'style' => 'width:250px', 'min'=>"1900-01-01", 'max'=>"2004-01-01"]) }}
                                @if ($errors->first('datanascita'))
                                <ul id="errore">
                                    @foreach ($errors->get('datanascita') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="form-group">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/genere.png') }}" alt="Gender Image" max width="26"/>
                            </div>
                          </div>
                          {{Form::select('genere',['maschio'=>'Maschio', 'femmina'=>'Femmina'])}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <center>
                     <!-- Telefono-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="background-color:#B1D8FF">
                                <img src="{{ URL('images/icon/phone.png') }}" alt="Phone Image" />
                              </div>
                            </div>
                            {{ Form::text('telefono', '', ['class' => 'input', 'id' => 'telefono', 'placeholder'=>'Telefono', 'style' => 'width:350px']) }}
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
                    
                  </center>
                <div style="display:none;">{{Form::select('role',['staff'=>'Staff'])}}</div>
                  <center>
                        {{ Form::submit('Crea', ['class' => 'form-btn1', 'id'=>"pulsante"]) }}
                  </center>
                {{ Form::close() }}  
            </div>
          </div>
        </div>
      </div>
    </div>
  
    
    
    <br><br>
</div>  

@endsection
