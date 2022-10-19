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
            <br>
            <div class="row">
            <div class="col-10">
            <div id="contenutoPost">
                
        <p><b>Autore: {{$post[0]->nome}} 
                {{$post[0]->cognome}} </b></p>
        
        {{$post[0]->contenuto_post}}<br>
        <i>{{$post[0]->created_at}}</i>
            </div></div>
        @can('isStaff')
        <div class="col-2">
            <a id="blogcard5-2" OnClick="mostra(name)" name="motivazionePost{{$post[0]->PostId}}">Cancella POST</a>
            </div>
        </div> 
            
           <div class ="motivazionePost" id='motivazionePost{{$post[0]->PostId}}' style="display:none;">
            {{ Form::open(array('route' => 'cancella3s','PostId'=> $post[0]->PostId, 'class' => 'contact-form' ,'enctype' =>"multipart/form-data")) }}

            <div id="Contenitore-AddPost">
                <div class="form-group ">
                    <div class="input-group ">

                        {{ Form::text('PostId', $post[0]->PostId, ['class' => 'input-post', 'id' => 'PostId' , 'style' => 'display:none;']) }}

                        {{ Form::textarea('motivazione', '', ['class' => 'input-post', 'id' => 'motivazione', 'required' => 'true', 'placeholder'=>"Inserisci una motivazione all'eliminazione del post"]) }}
                        @if ($errors->first('motivazione'))
                        <ul id="errore">
                            @foreach ($errors->get('motivazione') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div style="margin-left:15px">
            {{ Form::submit('Elimina post', ['class' => 'button-7']) }}
            {{ Form::close() }}
            </div>
        </div>
            <br>
        @endcan 
            
        </div>
        
        <br>@endforeach 
        
            </div>
        
        @can('isAdmin')
        <a id="blogcard5-2" OnClick="mostra(name)" name="motivazionePost{{$post[0]->PostId}}">Cancella POST</a>
        <br><br></div> </div><br>

        <div class ="motivazionePost" id='motivazionePost' style="display:none;">
            {{ Form::open(array('route' => 'cancella3','PostId'=> $post[0]->PostId, 'class' => 'contact-form' ,'enctype' =>"multipart/form-data")) }}

            <div id="Contenitore-AddPost">
                <div class="form-group ">
                    <div class="input-group ">

                        {{ Form::text('PostId', $post[0]->PostId, ['class' => 'input-post', 'id' => 'PostId']) }}

                        {{ Form::textarea('motivazione', '', ['class' => 'input-post', 'id' => 'motivazione', 'placeholder'=>"Inserisci una motivazione all'eliminazione del post"]) }}
                        @if ($errors->first('motivazione'))
                        <ul id="errore">
                            @foreach ($errors->get('motivazione') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            {{ Form::submit('Elimina post', ['class' => 'button-7']) }}
            {{ Form::close() }}
        </div>
        @endcan
        
        
        
    
        
     @else
           <div class="col-sm-10 col-md-12"><br><br><br>
            <center>
                <h4 style="color:red;"><b>Questo blog non ha ancora alcun Post al suo interno. </b></h4><br>
            </center>
        </div>
     @endif
     
    







     
@endsection