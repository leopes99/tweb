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
        {{ Form::open(array('route' => 'viewRicerca', 'class' => 'contact-form')) }}
            {{ Form::text('nome', '', ['class' => 'barraricerca', 'id' => 'nome', 'placeholder'=>'Nome e/o Cognome' ]) }}
            {{ Form::submit('Cerca', ['class' => 'form-btn1', 'id'=>"pulsante"]) }}
        {{ Form::close() }}
    </center>
    <br>
    
    <p>Risultati:</p>
    <ul style="list-style-type:circle">
        <li>Thomas Turbato</li>
        <li>Gustavo LaMazza</li>
        <li>Andrey Koymasky</li>
    </ul>
    
</div>  

@endsection
