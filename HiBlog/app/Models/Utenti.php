<?php

namespace App\Models;


use App\User;
use Illuminate\Support\Facades\Log;



class Utenti {

   
    


    public function getFriends($params) {

        
        //creo array vuoto a cui inserisco gli elementi da passare al where() alla fine
        //array di ['(value sul db)','(operator)','(input value)']
        $filtri1 = array();
        
        $filtri2 = array();
        if ($params->get('cercaAmici')) {
            array_push($filtri1, ['nome',$params->get('cercaAmici')]);
        }
        
       if ($params->get('cercaAmici')) {
            array_push($filtri2, ['cognome',$params->get('cercaAmici')]);
        }
       
        
        
        $filtrati = User::where($filtri1,$filtri2) ;
        
        //$filtrati = User::where($filtri2);
        //echo '<pre>'; print_r($filtrati); echo '</pre>';
        return $filtrati->paginate(10);
        
        
  }
    
   
    
   

}

