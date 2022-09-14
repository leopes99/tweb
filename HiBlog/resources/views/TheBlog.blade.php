@extends('layouts.homepageLayout')
@section('title', 'BLOG')
@section('theblog')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Visualizzazione blog</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi navigare nel blog, visualizzarne e scriverne i contenuti. Rispetta sempre il regolamento situato nell' Homepage del sito.  </h4>
    
    <center><h1 id='blog-titolo'>{{$ThisBlog[0]->nome}}</h1>
        <img id="blog-immagine" src="images/{{$ThisBlog[0]->immagine}}"><br><br>
    
            <p id="blogcard4">Tema: <b>{{$ThisBlog[0]->tema}}</b><p>
           <br>   
           <p id="blogcard4">Descrizione: {{$ThisBlog[0]->descrizione}}<p>
           <br>
    
    </center>
    
    <hr id='blog-riga'>
    <row>
        <center><button class="button-7" role="button"><a href="#">Nuovo POST</a></button></center>
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
        
        <br></div> </div><br>
        @endforeach 
        
    
     @else
           <div class="col-sm-10 col-md-12"><br><br><br>
            <center>
                <h4 style="color:red;"><b>Questo blog non ha ancora alcun Post al suo interno. Scrivi qualcosa utilizzando
                        l' apposito tasto. </b></h4><br>
            </center>
        </div>
     @endif
     
    
@endsection