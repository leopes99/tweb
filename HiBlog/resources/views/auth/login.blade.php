@extends('layouts.homepageLayout')

@section('login')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Login</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>Effettua il login ed entra nel mondo di HiBlog!</h4>
    

<!-- Fine titolo e breve descrizione della pagina -->


<!-- login section starts -->

<section class="find_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="form_tab_container">
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="rent">
                            <div class="Rent_form find_form">
                                
                                
                                {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
                                    
                                    <center>
                                        <div class="col-md-6 px-0">
                                            <div class="form-group ">
                                                <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" style="background-color:#B1D8FF">
                                                            <img src="{{ URL('images/icon/user.png') }}"
                                                                 alt="User Image"/>
                                                        </div>
                                                    </div>
                                                    
                                                    {{ Form::text('username', '', ['class' => 'input','id' => 'username', 'placeholder' => 'Username' , 'style' => 'width:350px']) }}
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
                                    </center>
                                
                                    <center>
                                        <div class="col-md-6 px-0">
                                            <div class="form-group ">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend" >
                                                        <div class="input-group-text" style="background-color:#B1D8FF">
                                                            <img src="{{ URL('images/icon/pass.png') }}"
                                                                 alt="Password image"/>
                                                        </div>
                                                    </div>
                                                    {{ Form::password('password', ['class' => 'input', 'id' => 'password','placeholder' => 'Password' , 'style' => 'width:350px']) }}
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
                                    </center>

                                        <center>
                                        {{ Form::submit('Login', ['class' => 'form-btn1', 'id'=>"pulsante"]) }}
                                        </center>
                                    
                                    {{ Form::close() }}
                                    <br>
                                    <center>
                                        <p> Non hai un account? Registrati <u><a href="{{ route('register') }}">qua</u></p>
                                    </center>
                                    <div class="btn-box">
                                        
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- login section ends -->


</div> 
@endsection

