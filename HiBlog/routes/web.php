<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

// ROUTES LIVELLO 1 (PUBBLICO)


 Route::get('/','PublicController@viewHome' ) -> name('homelvl1');
 
 Route::get('login', 'Auth\LoginController@showLoginForm') ->name('login');
 
 Route::post('login', 'Auth\LoginController@login');
 
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register'); 
 
  Route::post('register', 'Auth\RegisterController@register');
 
  Route::post('logout', 'Auth\LoginController@logout') -> name('logout');


 // ROUTES In comune tra utenti loggati

 Route::get('profile', 'UserController@index') -> name('profile');
 
 
  // ROUTES LIVELLO 2 (UTENTE)
 
  Route::get('profileEdit', 'UserController@viewProfileEdit')->name('profileEdit'); 
  
  Route::post('profileEdit', 'UserController@EditUtente')->name('editutente');
  
   Route::get('amici', 'UserController@viewAmici')->name('amici'); 
   
   Route::get('ricerca', 'UserController@viewRicercaAmici')->name('viewRicerca'); 
   
   Route::post('ricerca', 'UserController@RicercaAmici')->name('ricerca');
   
   Route::get('profileOther', 'UserController@viewProfileOther')->name('profileOther');
   
   Route::get('profileResult', 'UserController@viewProfileResult')->name('profileResult');
   
   Route::get('inviaRichiesta/{id}', 'UserController@inviaRichiesta')->name('inviaRichiesta');
   
   Route::get('notifiche', 'UserController@viewNotifiche')->name('notifiche');

   

                                                       
   //ROTTA PER LA RICERCA EFFETTIVA 
   
   //Route::post('ricerca', 'UserController@RicercaAmici')->name('ricerca');
   
  // ROUTES LIVELLO 3 (STAFF)
  
  // ROUTES LIVELLO 4 (ADMIN)