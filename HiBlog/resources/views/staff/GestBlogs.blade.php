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
            <br>
            <div class="row">
            <div class="col">
                <div style="margin-left:15px;">
                <p>Autore: <b>{{$blog[0]->nome}} {{$blog[0]->cognome}}</b></p> <br>
                <p>Nome del blog: <b>{{$blog[0]->nomeblog}}</b></p>  </div>
            </div>
             <div class="col">   
            <img id="blogcard1" src="images/{{$blog[0]->immagine}}">
             </div>
                
                @can('isStaff')
                <div class="col"> 
                    <div class ="motivazioneBlog" id='motivazioneBlog{{$blog[0]->BlogId}}' style="display:none;">
                        {{ Form::open(array('route' => 'cancella2s', 'class' => 'contact-form' ,'enctype' =>"multipart/form-data")) }}  
                        <div id="Contenitore-AddPost">
                            <div class="form-group ">
                                <div class="input-group ">

                                    {{ Form::text('BlogId', $blog[0]->BlogId, ['class' => 'input-post', 'id' => 'BlogId', 'style' => 'display:none']) }}

                                    {{ Form::textarea('motivazioneBlog', '', ['class' => 'input-post', 'id' => 'motivazioneBlog', 'placeholder'=>"Inserisci una motivazione all'eliminazione del blog" , 'required']) }}
                                    @if ($errors->first('motivazioneBlog'))
                                    <ul id="errore">
                                        @foreach ($errors->get('motivazioneBlog') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{ Form::submit('Elimina blog', ['class' => 'button-7']) }}
                        {{ Form::close() }}
                    </div></div>

                <div class="col">            
                    <a id="blogcard5-2" OnClick="mostra(name)" name="motivazioneBlog{{$blog[0]->BlogId}}">Cancella BLOG</a>
                </div>    
                @endcan
   
                @can('isAdmin')
                <div class="col"> 
                    <div class ="motivazioneBlog" id='motivazioneBlog{{$blog[0]->BlogId}}' style="display:none;">
                        {{ Form::open(array('route' => 'cancella2', 'class' => 'contact-form' ,'enctype' =>"multipart/form-data")) }}

                        <div id="Contenitore-AddPost">
                            <div class="form-group ">
                                <div class="input-group ">

                                    {{ Form::text('BlogId', $blog[0]->BlogId, ['class' => 'input-post', 'id' => 'BlogId', 'style' => 'display:none']) }}

                                    {{ Form::textarea('motivazioneBlog', '', ['class' => 'input-post', 'id' => 'motivazioneBlog', 'placeholder'=>"Inserisci una motivazione all'eliminazione del blog", 'required']) }}
                                    @if ($errors->first('motivazioneBlog'))
                                    <ul id="errore">
                                        @foreach ($errors->get('motivazioneBlog') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{ Form::submit('Elimina blog', ['class' => 'button-7']) }}
                        {{ Form::close() }}
                    </div></div>

                <div class="col">
                    <a id="blogcard5-2" OnClick="mostra(name)" name="motivazioneBlog{{$blog[0]->BlogId}}">Cancella BLOG</a>
                </div>
                @endcan 
            
            </div>
            
            @can('isStaff')
            <div id="BlogCard2">  
                <a href="{{ route('VediGestBlogs',['BlogId'=>$blog[0]->BlogId]) }}" id="blogcard3" style="margin-left:10px; color:purple;">Vedi Blog</a>
            </div>
            @endcan

            @can('isAdmin')    
            <div id="BlogCard2">        
                <a href="{{ route('VediGestBlog',['BlogId'=>$blog[0]->BlogId]) }}" id="blogcard3" style="margin-left:10px; color:purple;">Vedi Blog</a>
            </div>  
            @endcan
    
            <p id="blogcard4" style="margin-left:10px;">Tema: <b>{{$blog[0]->tema}}</b><p>
        <br>   
    <p id="blogcard4" style="margin-left:10px;">Descrizione: {{$blog[0]->descrizione}}<p>
        <br></div> 
    @endforeach
    
             <br>


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
