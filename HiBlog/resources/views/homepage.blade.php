@extends('layouts.homepageLayout')
@section('title', 'HomePage')


@section('homepage')

      
      <!-- banner -->
      <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
          
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="first-slide" src="images/Immagine-slider3.jpg" alt="Imm slider" style="max-width:1920px; max-height:824px;">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1 id="scritta-slider">HiBlog: Il social che fa per te</h1>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="second-slide" src="images/Immagine-slider2.jpg" alt="Imm slider" style="max-width:1920px; max-height:824px;">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1 id="scritta-slider">Crea il tuo gruppo di amici</h1>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="third-slide" src="images/Immagine-slider.jpg" alt="Imm slider" style="max-width:1920px; max-height:824px;">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1 id="scritta-slider">Crea il tuo blog</h1>
                  </div>
               </div>
            </div>
         </div>
          
          
      </div>
      <!-- end banner -->
      
      
      <!-- Prima scritta -->
      <div id="about"  class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Informazioni sull'azienda</h2>
                     <span></span>
                     <p>Questo sito è stato realizzato dagli studenti del gruppo 53 del corso di Tecnologie Web di Ingegneria
                      dell'informatica e dell'automazione, dell' Università Politecnica delle Marche. La documentaione 
                      riguardo il progetto è disponibile <a href="" style="color:blue;">qui</a></p>
                     
                     
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="about_img">
                     <figure><img src="images/about_img.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      
      <!-- Seconda scritta -->
      <div id="mobile"  class="mobile">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="mobile_img">
                     <figure><img src="images/mobile.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Informazioni sul sito e funzionalità</h2>
                     <span></span>
                     <p>HiBlog è un social network che permette alle persone di esprimere le proprie opinioni ed idee 
                     riguardo tantissime tematiche. In questo sito è possibile registrarsi per poter poi accedere
                     alle diverse funzionalità del sito quali: l'invio e la ricezione di richieste di amicizia dagli altri
                     utenti, la creazione di blog o l'accesso ai blog dei propri amici per poter poi creare dei post 
                     dove poter esprimere idee ed opinioni riguardo determinati argomenti, scelti a discrezione di chi
                     crea il blog. </p>
                     
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
    
      <!-- Terza scritta -->
      <div id="about"  class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Regolamenti del sito</h2>
                     <span></span>
                     <p>Raccomandiamo gli utenti di rispettare il regolamento del sito, per evitare di perdere dei post 
                         o direttamente i propri blog.</p> 
                     <ul style="font-size:16px;">
                         <li>- Rispettare tutti e non offendere nessuno.</li>
                         <li>- Non creare post con contenuti che esprimano odio razziale, propaganda politica di qualsiasi
                         tipo, violenza, bullismo, intimidazioni.</li>
                         <li>- Non creare blog o post a fini commerciali. Per le inserzioni pubblicitarie contattate HiBlog
                             direttamente tramite email. La potete trovare infondo alla pagina nella sezione contatti.</li>
                     </ul>
                     
                     
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="about_img">
                     <figure><img style="max-height:596px;max-width:600px" src="images/regole.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>

       <!-- Quarta scritta -->
      <div id="mobile"  class="mobile">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="mobile_img">
                     <figure><img style="max-height:596px;max-width:600px" src="images/hacker.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Condizioni d'uso</h2>
                     <span></span>
                     <p>Quando le opinioni e le azioni sono riconducibili alle persone, la nostra community è più sicura
                         e più responsabile. Per questo motivo, l'utente è tenuto a:
                     
                     usare lo stesso nome di cui si serve nella vita reale; fornire informazioni personali accurate; 
                    creare un solo account (il proprio); non condividere la propria password, non concedere l'accesso 
                    al proprio account HiBlog ad altri né trasferire il proprio account ad altri (senza l'autorizzazione
                    di HiBlog, diffidandosi di chiunque altro).
                    <br>
                     Per qualsiasi problema o disguido contattare HiBlog servendosi delle informazioni di contatto
                        presenti infondo alla pagina.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      

@endsection

