@extends('layouts.homepageLayout')
@section('title', 'Statistiche')
@section('Stats')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Statistiche HiBlog</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa sezione puoi visualizzare delle statistiche inerenti ad HiBlog! Utilizzando l' apposita barra di
    ricerca è possibile cercare un utente per visualizzarne la propria lista degli amici e il numero di amicizie accettate
    o rifiutate da esso.</h4><br>
    @if(!empty($numero_blog))
    <h2 id='scritta-h2' style="color:blue">Numero totale dei blog presenti nel sito: <b>{{$numero_blog}}</b></h2>
   @else
   <h2 id='scritta-h2' style="color:blue">Numero totale dei blog presenti nel sito: <b>0</b></h2>
    @endif
    
    <hr id='blog-riga'><br>
    <h3>Ricerca utenti: digita un nome e/o un cognome, mentre per la ricerca parziale utilizza * .</h3><br>
    <center>
        {{ Form::open(array('route' => 'ricercaStat', 'class' => 'contact-form')) }}
            {{ Form::text('cercaAmici', '', ['class' => 'barraricerca', 'id' => 'cercaAmici', 'placeholder'=>'Nome e/o Cognome','required' ]) }}
                    
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
    
    <h2 id="scritta-h2">Risultati:</h2>

   
               
             @if(empty($utenti))
                            <h3>"Nessun risultato trovato."</h3>
                            @else
                            <p>Seleziona un utente per visualizzarne delle statistiche.</p>
             @isset($utenti)
            @foreach ($utenti as $utente)   
            
        <span id="elenco">
            -<a href="{{ route('profileStats',['id'=>$utente[0]->id]) }}"> {{$utente[0]->nome}} {{$utente[0]->cognome}}</a> <br>
        </span>

       
            @endforeach  
        @endisset()
        @endif
    
    <br><br>
</div>  

@endsection
