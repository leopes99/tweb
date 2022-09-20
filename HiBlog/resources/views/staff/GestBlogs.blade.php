@extends('layouts.homepageLayout')
@section('title', 'Gestione blogs')
@section('GestBlogs')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Gestione Blogs</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi visualizzare tutti i blog creati dagli utenti, accedervi e controllare che le varie descrizioni,
        tematiche, nomi, immagini e post rispettino il regolamento e le linee guida. Se si hanno dubbi siete pregati di
    contattare l'amministratore del sito all'indirizzo: <b>adminHiblog@contact.it</b>. </h4>

<hr id='blog-riga'>
    
    @if(!empty($numero_blog))
        <h2>Elenco blog totali({{$numero_blog}}):</h2>
        @else <h2>Elenco blog totali(0):</h2>
        @endif
    <br><br>
    
    @if(!empty($BlogTot))
        @foreach ($BlogTot as $blog)
        
        <div id="blogcard" >
            <div class="col-sm-4">
                <p>Autore: <b>{{$blog[0]->nome}} {{$blog[0]->cognome}}</b></p> <br>
            <p>Nome del blog: <b>{{$blog[0]->nomeblog}}</b></p>  
            </div>
            
            <img id="blogcard1" src="images/{{$blog[0]->immagine}}">
            @can('isStaff')
                <a id="blogcard5" style="margin-right:30px;" href="{{ route('cancella2s',['BlogId'=>$blog[0]->BlogId]) }}">Cancella BLOG</a>
            @endcan  
            @can('isAdmin')
                <a id="blogcard5" style="margin-right:30px;" href="{{ route('cancella2',['BlogId'=>$blog[0]->BlogId]) }}">Cancella BLOG</a>
            @endcan    
              
              <div id="BlogCard2">  
                  @can('isStaff')
                <a href="{{ route('VediGestBlogs',['BlogId'=>$blog[0]->BlogId]) }}" id="blogcard3" style="margin-left:10px; color:purple;">Vedi Blog</a>
                    @endcan
                    @can('isAdmin')
                <a href="{{ route('VediGestBlog',['BlogId'=>$blog[0]->BlogId]) }}" id="blogcard3" style="margin-left:10px; color:purple;">Vedi Blog</a>
                    @endcan
              </div>    
                <br>
                <p id="blogcard4" style="margin-left:10px;">Tema: <b>{{$blog[0]->tema}}</b><p>
           <br>   
           <p id="blogcard4" style="margin-left:10px;">Descrizione: {{$blog[0]->descrizione}}<p>
           <br></div>
@endforeach
                
            
                
           <!-- <button onclick='eliminaBlog({!!$blog[0]->BlogId!!})'>Codio </button> -->
        </div>
        
        
        
     @else
           <div class="col-sm-8 col-md-8"><br><br><br>
            <div class='detail-box'>
                <h4 style="color:red;"><b>Nessun blog esistente.</b></h4>
            </div>
        </div>
     @endif
    
    
    
    
    
    <br>
</div>  

@endsection
