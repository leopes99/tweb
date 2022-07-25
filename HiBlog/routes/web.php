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
 
 // ROUTES LIVELLO 2 (UTENTE)
 
 Route::get('profile', 'PublicController@viewProfile')->name('profile');
 
 Route::get('profileEdit', 'PublicController@viewProfileEdit')->name('profileEdit'); 
