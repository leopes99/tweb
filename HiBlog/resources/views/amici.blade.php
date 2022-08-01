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
    <center>
     @if(!empty($numero_amici))
     <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt"><h2 id="scritta-h2"> Elenco amici({{$numero_amici}}):</h2> </div><br>
     @endif
     @if(!empty($amici))
        @foreach ($amici as $amico)
        <a class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt" href="{{ route('profileOther',['id'=>$amico[0]->id]) }}"><span id="elenco">{{ $amico[0]->nome }} {{ $amico[0]->cognome }} <br></span>
          <br>
        @endforeach
     @else
        <div class="col-sm-6 col-md-4">
            <div class='detail-box'>
                <h4>Non hai ancora amici.</h4>
            </div>
        </div>
     @endif
    </center>

</div>  

@endsection
