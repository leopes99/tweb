<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class PublicController extends Controller {

   public function viewHome(){
        
        return view('homepage');
    }
    
   public function viewLogin(){
      return view('auth.login');
    }
    
    public function viewProfile() {
        return view('profile');
    }
    
    public function viewProfileEdit() {
        return view('profileEdit');
    }

}
