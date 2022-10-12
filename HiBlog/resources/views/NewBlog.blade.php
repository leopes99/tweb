@extends('layouts.homepageLayout')
@section('title', 'Crea Blog')
@section('NuovoBlog')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Creazione nuovo BLOG</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi creare il tuo blog! Scegline il nome, il tema e una breve descrizione. Imposta a piacimento anche 
    un'immagine di copertina. Ricorda sempre di rispettare i regolamenti del sito.</h4>
    <br><br>
    
     {{ Form::open(array('route' => 'creaBlog', 'class' => 'contact-form' ,'enctype' =>"multipart/form-data")) }}
     
                    <div class="col-md-6 px-0">
                      <div class="form-group ">
                        <div class="input-group ">
                          
                            <p>Nome del blog: </p> {{ Form::text('nomeblog', '', ['class' => 'input-blog', 'id' => 'nomeblog']) }}
                            @if ($errors->first('nomeblog'))
                            <ul id="errore">
                                @foreach ($errors->get('nomeblog') as $message)
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
                          
                            <p>Tematica del blog: </p> {{ Form::text('tema', '', ['class' => 'input-blog', 'id' => 'tema']) }}
                            @if ($errors->first('tema'))
                            <ul id="errore">
                                @foreach ($errors->get('tema') as $message)
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
                          
                            <p>Descrizione del blog: </p> {{ Form::textarea('descrizione', '', ['class' => 'input-blog', 'id' => 'descrizione']) }}
                            @if ($errors->first('descrizione'))
                            <ul id="errore">
                                @foreach ($errors->get('descrizione') as $message)
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
                                <p>Immagine di copertina del blog: </p> {{ Form::file('immagine', ['class' => 'input-blog-2', 'id' => 'immagine']) }} 
                                @if ($errors->first('immagine'))
                                <ul id="errore">
                                    @foreach ($errors->get('immagine') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
     
     {{ Form::submit('Crea BLOG', ['class' => 'form-btn1', 'id'=>"pulsante"]) }}
     {{ Form::close() }}
     <br>
</div>  

@endsection
