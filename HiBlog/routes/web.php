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
 
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register'); 
 
 // ROUTES LIVELLO 2 (UTENTE)
 
 Route::get('profile', 'PublicController@viewProfile')->name('profile'); 
 Route::get('profileEdit', 'PublicController@viewProfileEdit')->name('profileEdit'); 
