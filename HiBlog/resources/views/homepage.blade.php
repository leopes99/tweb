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
                     <h2>Informazioni sul sito e funzionalità</h2>
                     <span></span>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                     
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
                     <h2>Informazioni sull'azienda</h2>
                     <span></span>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                     
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
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                     
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

       <!-- Quarta scritta -->
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
                     <h2>Condizioni d'uso</h2>
                     <span></span>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      

@endsection

