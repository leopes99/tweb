@extends('layouts.homepageLayout')
@section('title', 'I miei blog')
@section('blogIndex')
<script src="{{ asset('/js/blog.js') }}"></script>

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Blogs</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi visualizzare l'elenco dei tuoi blog disponibili, visitarli ed eliminarli. Se non ne hai creane subito uno! </h4><br>
    
    
    <center><a href='{{ route('crea') }}'><button class="button-43" role="button" '>Crea BLOG</button></a></center>
    
    @if(!empty($numero_blog))
     <br><br><h3>Ecco i tuoi blog({{$numero_blog}}):</h3> <br>
     @endif
     @if(!empty($blogMiei))
        @foreach ($blogMiei as $blog)
        
        <div class="row" id="blogcard">
            <div class="col-4">
            <img id="blogcard1" src="images/{{$blog[0]->immagine}}">
            </div>  
            <div class="col-6">
            <div id="BlogCard2">
              
                <a href="{{ route('vediblog',['BlogId'=>$blog[0]->BlogId]) }}" id="blogcard3">{{$blog[0]->nomeblog}}</a>
                <br>
                <p id="blogcard4">Tema: <b>{{$blog[0]->tema}}</b><p>
           <br>   
           <p id="blogcard4">Descrizione: {{$blog[0]->descrizione}}<p>
           <br>
            </div>   </div>
            <div class="col-2">
            <a id="blogcard5" onclick = "return confirm('Sicuro di voler eliminare il blog?')" href="{{ route('cancella',['BlogId'=>$blog[0]->BlogId]) }}">Cancella BLOG</a>
            </div></div>

                
            
            @endforeach    
           
        </div>
        
        
        
     @else
           <div class="col-sm-8 col-md-8"><br><br><br>
            <div class='detail-box'>
                <h4 style="color:red;"><b>Non hai ancora Blog, creane uno con l' apposito tasto.</b></h4>
            </div>
        </div>
     @endif
    
    

    
@endsection