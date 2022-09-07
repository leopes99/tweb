<?php

namespace App\Models;


use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Utenti {

   
    public function Ricerca($params, $wildcard){
                if (strpos($params, $wildcard) !== false) {
            $params2 = str_replace("*", "", $params);
            $query = "SELECT * FROM users ";

            $TabellaUtenti = DB::select($query);

            foreach ($TabellaUtenti as $utenti) {
                if($utenti->visibile=="si"){
                    $unite = $utenti->nome . " " . $utenti->cognome;
                    $unite2 = $utenti->cognome . " " . $utenti->nome;
                    if ((strpos(strtolower($unite), strtolower($params2)) !== false) || (strpos(strtolower($unite2), strtolower($params2)) !== false)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                       return $risultati[] = DB::select($query2);
                    }
                }
            }
        } else {

            $query = "SELECT * FROM users";

            $TabellaUtenti = DB::select($query);

            foreach ($TabellaUtenti as $utenti) {
                if($utenti->visibile=="si"){
                    $unite = $utenti->nome . " " . $utenti->cognome;
                    $unite2 = $utenti->cognome . " " . $utenti->nome;

                    if (strtolower($utenti->nome) == strtolower($params)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                       return $risultati[] = DB::select($query2);
                    } else if (strtolower($utenti->cognome) == strtolower($params)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                       return $risultati[] = DB::select($query2);
                    } else if (strtolower($unite) == strtolower($params) || strtolower($unite2) == strtolower($params)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                       return $risultati[] = DB::select($query2);
                    }
                }
            }
        }
    }


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
  
  public function getAmici(Request $request){
      $query1 = "select id_ricevente_amicizia from amicizie where accettata='1' and id_richiedente_amicizia='" . $request->id . "'";
        $query2 = "select id_richiedente_amicizia from amicizie where accettata='1' and id_ricevente_amicizia='" . $request->id . "'";

        $idamici1 = DB::select($query1);
        foreach ($idamici1 as $idamico) {
            $idamici[] = $idamico->id_ricevente_amicizia;
        }

        $idamici2 = DB::select($query2);
        foreach ($idamici2 as $idamico) {
            $idamici[] = $idamico->id_richiedente_amicizia;
        }
        if(!empty($idamici)){
            foreach ($idamici as $idamico) {
                $query = "select * from users where id='$idamico'";
                $amici[] = DB::select($query);
            }
        //echo '<pre>'; print_r($idamici); echo '</pre>';
        return $amici;
  }
    
   
    
   

}

}