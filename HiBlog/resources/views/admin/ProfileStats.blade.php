@extends('layouts.homepageLayout')
@section('title', 'Statistiche profilo')
@section('ProfileStats')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Statistiche di {{$utente[0]->nome}} {{$utente[0]->cognome}}</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi visualizzare delle informazioni utili riguardo il profilo cercato. </h4><br>
    <p>Username: <b>{{$utente[0]->username}}</b></p>
    <p>E-mail: <b>{{$utente[0]->email}}</b></p>
    <p>Data di nascita: <b>{{$utente[0]->data_nascita}}</b></p>
    <br>
     @if(!empty($numero_blog))
     <h2 id='scritta-h2'>- Numero blog posseduti da {{$utente[0]->username}}: <b><u>{{$numero_blog}}</u></b></h2>
    @else
    <h2 id='scritta-h2'>- Numero blog posseduti da {{$utente[0]->username}}: <b><u>0</u></b> </h2>
    <br><h4 style="color:red;"><b>Questo utente non possiede alcun blog. </b></h4>
    @endif
   

    <br>
    @if(!empty($numero_richieste))
    <h2 id='scritta-h2'>- Numero delle richieste di amicizia ricevute per {{$utente[0]->username}}: <b><u>{{$numero_richieste}}</u></b></h2>
    @else
    <h2 id='scritta-h2'>- Numero delle richieste di amicizia ricevute per  {{$utente[0]->username}}: <b><u>0</u></b> </h2>
    <br><h4 style="color:red;"><b>L' utente non possiede alcuna richiesta di amicizia RICEVUTA.</h4>
    @endif
    <br>
    
    @if(!empty($amici))
     <h2 id='scritta-h2'>- Lista degli amici (nome e cognome):</h2>
        @foreach($amici as $amico)
       
        <p> <b>{{$amico[0]->nome}} {{$amico[0]->cognome}}</b><br>
        @endforeach
    @else
    <br>
         <h2 id='scritta-h2'>- Lista degli amici (nome e cognome):</h2>
         <h4 style="color:red;"><b>L' utente non possiede alcun utente nel suo gruppo amici.</h4>
    @endif
    <br>
</div>  

@endsection
