@extends('layouts.homepageLayout')
@section('title', 'Modifica staff')
@section('ModifyStaff')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Modifica profilo STAFF</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi modificare i dati personali del proriflo di uno Staff. </h4><br>
    

  
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="form_tab_container">
          <div class="tab-content text-center">
            <div class="tab-pane active" id="rent">
              

                {{ Form::open(array('route' => 'EditStaff', 'class' => 'contact-form')) }}
                  
                  <div class="form-row"> <!-- Nome e Cognome -->
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                            </div>
                          </div>
                          {{ Form::text('nome', $staff[0]->nome , ['class' => 'input', 'id' => 'nome', 'style' => 'width:350px' ]) }}
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
                          {{ Form::text('cognome',$staff[0]->cognome , ['class' => 'input', 'id' => 'cognome', 'placeholder'=>'Cognome', 'style' => 'width:350px']) }}
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
                    <div style="display:none">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/user.png') }}" alt="User Image" />
                            </div>
                          </div>
                          {{ Form::text('username',$staff[0]->username , ['class' => 'input','id' => 'username','placeholder'=>'Username', 'style' => 'width:350px']) }}
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
                          {{ Form::text('email',$staff[0]->email , ['class' => 'input','id' => 'email', 'placeholder'=>'E-mail', 'style' => 'width:350px']) }}
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
                  <div class="form-row"> 
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:#B1D8FF">
                              <img src="{{ URL('images/icon/calendario.png') }}" alt="Calendar Image" />
                            </div>
                          </div>
                          {{ Form::date('data_nascita',$staff[0]->data_nascita,['class' => 'input', 'id' => 'datanascita', 'style' => 'width:250px', 'min'=>"1900-01-01", 'max'=>"2004-01-01"]) }}
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
                            {{ Form::text('telefono', $staff[0]->telefono, ['class' => 'input', 'id' => 'telefono', 'placeholder'=>'Telefono', 'style' => 'width:350px']) }}
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
                     
                                
                <hr>

                <center>
                    
                    {{ Form::submit('Salva', ['class' => 'form-btn1', 'id'=>"pulsante", 'onclick' => 'return confirm("Sicuro di voler modificare i dati?")']) }}
                </center>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  

    <br><br>
</div>  

@endsection
