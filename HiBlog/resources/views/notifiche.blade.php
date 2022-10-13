 @extends('layouts.homepageLayout')
@section('title', 'Notifiche')
@section('notifiche')
<script src="{{ asset('/js/blog.js') }}"></script>

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Notifiche</h2>
    </div>
</div>

<div class="container"> <br>    
    
    <h4>In questa pagina puoi visualizzare le notifiche ricevute.</h4>
    <br>
    
<!-- inizio notifiche section -->
<div><h2 id="scritta-h2"> Richieste d'amicizia ricevute: <br><h4> Clicca su un nome per visualizzare maggiori informazioni</h4></h2> </div><br>

@if(!empty($richiesteRicevute))
      @foreach ($richiesteRicevute as $richiesta)
        
           <div class="row">
               <a id="elenco" OnClick="mostra(name)" name="profileDiv{{$richiesta->AmiciziaId}}">{{ $richiesta->nome }} {{ $richiesta->cognome }} </a><br></span>
               <a href="{{route('accettaRichiesta',['id'=>$richiesta->AmiciziaId])}}"> ✅ </a> 
            <a href="{{route('eliminaRichiesta',['id'=>$richiesta->AmiciziaId])}}"> ❌ </a>
           </div>
        <br>
        <div style="display:none;" class ="profileDiv" id='profileDiv{{$richiesta->AmiciziaId}}'>
            <div class="row py-2">
                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Username</div>
                <div class="col-12 col-md-8 col-xl-9 dd">{{$richiesta->username}}</div>

            </div>
            <div class="row py-2">
                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Genere</div>
                <div class="col-12 col-md-8 col-xl-9 dd">{{$richiesta->genere}}</div>

            </div>
            <div class="row py-2">
                <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Data di nascita</div>
                <div class="col-12 col-md-8 col-xl-9 dd">{{$richiesta->data_nascita}}</div>

            </div>
            <hr>
        </div>
        <br>
      @endforeach
      
    @else
      <div class="col-sm-6 col-md-4">
        <div class='detail-box'>
          <h4>Non hai ricevuto richieste d'amicizia.</h4>
        </div>
      </div>
    <br><br>
   @endif
   <hr id="blog-riga">
   <div><h2 id="scritta-h2"> Altre notifiche: <br></div>
      @if(!empty($notifiche))
      @foreach ($notifiche as $notifica)
       @if($notifica->tipologia_notifica == "RimozionePost")
        <p> Tipologia: {{$notifica->tipologia_notifica}} </p>
        <p> Il tuo post: " {{$notifica->contenuto_post}} " è stato eliminato per il seguente motivo: {{$notifica->motivo_cancellazione}} </p> <br>
       @endif
       @if($notifica->tipologia_notifica == "CreazionePost")
        <p> Tipologia: {{$notifica->tipologia_notifica}} </p>
        <p> E' stato pubblicato un nuovo post nel <a href="{{ route('vediblog',['BlogId'=>$notifica->id_blog]) }}">seguente blog</a> in data: {{$notifica->created_at}}</p> <br>
       @endif
       @if($notifica->tipologia_notifica == "RimozioneBlog")
        <p> Tipologia: {{$notifica->tipologia_notifica}} </p>
        <p> Il tuo blog: " {{$notifica->nome_blog}} " è stato eliminato per il seguente motivo: {{$notifica->motivo_cancellazione}} </p> <br>
       @endif
      @endforeach
      @endif
</div>   
@endsection