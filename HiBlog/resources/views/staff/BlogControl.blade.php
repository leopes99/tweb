@extends('layouts.homepageLayout')
@section('title', 'Gestione Blog')
@section('BlogControl')
<script src="{{ asset('/js/blog.js') }}"></script>
<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Gestione blog</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi navigare nel blog e controllarne il regolamentale utilizzo. Se necessario rimuovi i post e 
        se si hanno dubbi siete pregati di contattare l'amministratore del sito 
        all'indirizzo: <b>adminHiblog@contact.it</b>.   </h4>
    
    
    <center><h1 id='blog-titolo'>{{$ThisBlog[0]->nomeblog}}</h1>
        <img id="blog-immagine" src="images/{{$ThisBlog[0]->immagine}}"><br><br>
    
            <p id="blogcard4">Tema: <b>{{$ThisBlog[0]->tema}}</b><p>
           <br>   
           <p id="blogcard4">Descrizione: {{$ThisBlog[0]->descrizione}}<p>
           <br>
    
    </center>
    
    <hr id='blog-riga'>
    <row>

       
        <br>
        @if(!empty($numero_post))
        <h2>Discussione({{$numero_post}}):</h2>
        @else <h2>Discussione(0):</h2>
        @endif



    </row>
    
    @if(!empty($Posts))
        @foreach ($Posts as $post)
        <div id="ContenitorePost">
            <div id="contenutoPost">
        <p><b>Autore: {{$post[0]->nome}} 
                {{$post[0]->cognome}} </b></p>
        
        {{$post[0]->contenuto_post}}<br>
        <i>{{$post[0]->created_at}}</i>
        @can('isStaff')
        <a id="blogcard5-2" href="{{ route('cancella3s',['PostId'=>$post[0]->PostId,'BlogId'=>$ThisBlog[0]->BlogId]) }}">Cancella POST</a>
        @endcan
        @can('isAdmin')
        <a id="blogcard5-2" href="{{ route('cancella3',['PostId'=>$post[0]->PostId,'BlogId'=>$ThisBlog[0]->BlogId]) }}">Cancella POST</a>
        @endcan
        <br><br></div> </div><br>
        @endforeach 
        
    
     @else
           <div class="col-sm-10 col-md-12"><br><br><br>
            <center>
                <h4 style="color:red;"><b>Questo blog non ha ancora alcun Post al suo interno. </b></h4><br>
            </center>
        </div>
     @endif
     
    







     
@endsection