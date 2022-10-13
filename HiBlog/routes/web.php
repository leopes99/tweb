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

  //download della documentazione
  Route::get('/download', function () {
    return response()->download('doc/Documentazione_progetto.pdf');
  })->name('download');

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
   
   Route::get('inviaRichiesta', 'UserController@inviaRichiesta')->name('inviaRichiesta');
   
   Route::get('accettaRichiesta', 'UserController@accettaRichiesta')->name('accettaRichiesta');
   
   Route::get('eliminaRichiesta', 'UserController@eliminaRichiesta')->name('eliminaRichiesta');
   
   Route::get('eliminaAmicizia', 'UserController@eliminaAmicizia')->name('eliminaAmicizia');
   
   Route::get('notifiche', 'UserController@viewNotifiche')->name('notifiche');

   Route::get('blog', 'UserController@viewblogS')->name('blogIndex');

   Route::get('vediblog', 'UserController@OpenBlog')->name('vediblog');
                                                       
   Route::get('cancella', 'UserController@DeleteBlog' ) -> name('cancella');
   
   Route::get('crea', 'UserController@ViewCreateBlog' ) -> name('crea');
   
   Route::post('creaBlog', 'UserController@CreateBlog' ) -> name('creaBlog');
   
  
   
   Route::post('creaPost', 'UserController@CreatePost' ) -> name('creaPost');
   

   
  // ROUTES LIVELLO 3 (STAFF)
  
   Route::get('allblogss', 'StaffController@ViewAllBlogs' ) -> name('allblogss');
   
   Route::post('cancella2s', 'StaffController@DeleteBlog' ) -> name('cancella2s');
   
   Route::get('VediGestBlogs', 'StaffController@VisualizzaBlog' ) -> name('VediGestBlogs');
   
   Route::post('cancella3s', 'StaffController@DeletePost' ) -> name('cancella3s');
   
   
  // ROUTES LIVELLO 4 (ADMIN)
   
    Route::get('allblogs', 'AdminController@ViewAllBlogs' ) -> name('allblogs');
    
    Route::post('cancella2', 'AdminController@DeleteBlog' ) -> name('cancella2');
    
    Route::get('VediGestBlog', 'AdminController@VisualizzaBlog' ) -> name('VediGestBlog');
   
    Route::post('cancella3', 'AdminController@DeletePost' ) -> name('cancella3');
    
    Route::get('viewGestUtenti', 'AdminController@ViewGestUtenti' ) -> name('viewGestUtenti');
    
    Route::get('viewAddStaff', 'AdminController@viewAddStaff' ) -> name('viewAddStaff');
    
    Route::post('AddStaff', 'AdminController@AddStaff')->name('AddStaff');
    
    Route::get('cancStaff', 'AdminController@DeleteStaff' ) -> name('cancStaff');
    
    Route::get('EditStaff', 'AdminController@viewEditStaff')->name('viewEditStaff'); 
  
    Route::post('EditStaff', 'AdminController@EditStaff')->name('EditStaff');
    
    Route::get('viewStats', 'AdminController@viewStats')->name('viewStats'); 
    
    Route::post('ricercaStat', 'AdminController@ricercaStat')->name('ricercaStat');
    
    Route::get('profileStats', 'AdminController@profileStats')->name('profileStats'); 