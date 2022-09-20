@extends('layouts.homepageLayout')
@section('title', 'Gestione utenti')
@section('GestUtenti')
<script src="{{ asset('/js/blog.js') }}"></script>

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Gestione membri dello staff</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina è possibile visualizzare i membri dello STAFF, e dove necessario modificarne i dati personali,
    inserire o eliminare dei membri.
    Puoi anche premere il tasto "<b>i</b>" per visualizzare rapidamente alcune informazioni riguardo un membro dello staff.</h4>
    
    
    <center><button id="pulsante2" ><a href="{{route('viewAddStaff')}}" id="linkpulsante">Aggiungi STAFF</a></button></center>
    <br>
    
     @if(!empty($numero_staff))
     <h2 id="scritta-h2"> Lista degli STAFF({{$numero_staff}}):</h2> <br>
     @endif
    
    
    @foreach($staffs as $staff)
    <div id='gestStaff1'>
        <div class='row'>
        
           <div class='col-7'> <p id='gestStaff2'> Nominativo: <b>{{$staff[0]->nome}} {{$staff[0]->cognome}}</b>
                   <button role="button" OnClick="mostra(name)" id='gestStaff5' name="infoAggiuntive{{$staff[0]->id}}" >ℹ️</button> </p>
               <div id='infoAggiuntive{{$staff[0]->id}}' style='margin-left:10px; display:none;'>
                   <br>
                   <p>Username: {{$staff[0]->username}}</p>
                   <p>Email: {{$staff[0]->email}}</p>
                   <p>Cellulare: {{$staff[0]->telefono}}</p>
                   <p>Data di nascita: {{$staff[0]->data_nascita}}</p>
               </div>
           </div>
           <div class='col-2'> <a href='{{ route('viewEditStaff',['id'=>$staff[0]->id]) }}' id='gestStaff3'>MODIFICA </a></div>
           <div class='col-2'><a href='{{ route('cancStaff',['id'=>$staff[0]->id]) }}' id='gestStaff4'>ELIMINA</a></div>
        </div>    
    </div>
    <br>
    @endforeach
    
   <br><br>
</div>  

@endsection
