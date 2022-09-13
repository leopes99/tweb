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
     @if(!empty($numero_post))
    <h2>Discussione({{$numero_post}}):</h2>
    @else <h2>Discussione(0):</h2>
    @endif
    
    
    @if(!empty($Posts))
        @foreach ($Posts as $post)
        
        <p>Autore: {{$post[0]->nome}} 
        {{$post[0]->cognome}} </p>
        
        {{$post[0]->contenuto_post}}"><br>
        {{$post[0]->created_at}}">
        
        <br><br>
        @endforeach 
        
    
     @else
           <div class="col-sm-8 col-md-8"><br><br><br>
            <div class='detail-box'>
                <h4 style="color:red;"><b>Questo blog non ha ancora alcun Post al suo interno. Scrivi qualcosa utilizzando
                    l' apposito tasto. </b></h4>
            </div>
        </div>
     @endif
     
    
@endsection