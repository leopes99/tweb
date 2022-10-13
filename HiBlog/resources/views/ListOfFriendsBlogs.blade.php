@extends('layouts.homepageLayout')
@section('title', 'Blogs')
@section('ListOfFriendsBlogs')

<!--  Titolo e breve descrizione della pagina -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Blogs del tuo amico {{$usernameAmico}}</h2>
    </div>
</div>
<div class="container"> <br>    
    <h4>In questa pagina puoi visualizzare i blog di <b>{{$usernameAmico}}</b>. Visitane uno e scrivi un post!</h4>
    @if(!empty($blogAmico))
    <h2>Numero dei blog: {{$numero_blog}}</h2> <br>
    @foreach($blogAmico as $blog)
    <p style="font-size:20px;">Nome del blog: <a href="{{ route('vediblog',['BlogId'=>$blog[0]->BlogId]) }}" id="blogAmico"> {{$blog[0]->nomeblog}}</a></p><br>
    @endforeach
    
   @else
   <br><br>
   <p style="color:red">Nessun blog appartenente a <b>{{$usernameAmico}}</b>!</p><br><br><br><br>
   @endif
</div>  

@endsection
