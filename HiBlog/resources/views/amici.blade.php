@extends('layouts.homepageLayout')
@section('title', 'Gruppo amici')
@section('amici')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Gruppo amici</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi visualizzare il tuo gruppo di amici. Cercane dei nuovi con l'apposito tasto! </h4>
    
    <center><button id="pulsante2" ><a href="{{route('viewRicerca')}}" id="linkpulsante">Cerca nuove amicizie</a></button></center>
    
    <p>I tuoi amici(3)</p>
    <ul>
        <li>Andrea Diprè</li>
        <li>Bello Figo</li>
        <li>Cassano</li>
    </ul>
    
</div>  

@endsection
