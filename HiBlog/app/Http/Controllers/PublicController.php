<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class PublicController extends Controller {

   public function viewHome(){
        
        return view('homepage');
    }

}
