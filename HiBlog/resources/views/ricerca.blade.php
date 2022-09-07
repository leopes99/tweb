@extends('layouts.homepageLayout')
@section('title', 'Cerca amici')
@section('ricerca')



<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Ricerca amici</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi digitare il nome e/o il cognome anche parzialmente, ed ottenere la lista degli utenti
    iscritti ad HiBlog che corrispondono con i criteri di ricerca. Seleziona il loro nome e visualizza il loro profilo.</h4>
    <br>
    
    <center>
        {{ Form::open(array('route' => 'ricerca', 'class' => 'contact-form')) }}
            {{ Form::text('cercaAmici', '', ['class' => 'barraricerca', 'id' => 'cercaAmici', 'placeholder'=>'Nome e/o Cognome' ]) }}
                    
                    @if ($errors->first('cercaAmici'))
                    <ul id="errore">
                        @foreach ($errors->get('cercaAmici') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    
            {{ Form::submit('Cerca', ['class' => 'form-btn1', 'id'=>"pulsanteRicerca"]) }}
        {{ Form::close() }}
    </center>
 
    <br>
    
    <h2 id="scritta-h2">Risultati:</h2>

   
               
             @if(empty($friends))
                            <h3>"Nessun risultato trovato."</h3>
                            @else
             @isset($friends)
            @foreach ($friends as $friend)
        <span id="elenco">
            -<a href="{{ route('profileOther',['id'=>$friend->id]) }}"> {{$friend->nome}} {{$friend->cognome}}</a> <br>
        </span>

        </ul>
            @endforeach  
        @endisset()
        @endif
</div>  
<br>
@endsection
