<?php

namespace App\Models;


use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Utenti  {

   
    
    
    public function Ricerca($params, $wildcard){
                $user=Auth::user(); //mi salvo l'id dell'utente loggato che mi servirà per un controllo
                $idLoggato=$user->id;
                //PRIMO BLOCCO DELLA FUNZIONE: RICERCA PARZIALE CON IL CARATTERE WILDCARD "*"
                if (strpos($params, $wildcard) !== false) {//strpos vede se la stringa wildcard("*" è presente nella stringa
                                                           //digitata, se non è falsa significa che l'utente ha inserito il
                                                           //carattere wildard "*"
            $params2 = str_replace("*", "", $params);//levo l'asterisco dalla stringa inserita, per facilitarmi la ricerca e 
                                                     //lo inserisco in params2
            $query = "SELECT * FROM users "; 

            $TabellaUtenti = DB::select($query);

            foreach ($TabellaUtenti as $utenti) {

                if(($utenti->visibile=="si")&&($utenti->id!==$idLoggato)){//verifico se l'utente del foreach  è visibile
                                                                          //e mi assicuro che non sia quello loggato
                
                    /*per poter fare una ricerca migliore, nel caso l'utente abbia digitato nome e cognome, o nome e cognome
                    *mi creo 2 variabili unite e unite2 dove vado a metterci nome+cognome e cognome+nome dell'utente 
                    *esaminato al momento con il foreach
                    */
                    
                    $unite = $utenti->nome . " " . $utenti->cognome; //inserisco nel mezzo anche uno spazio
                    $unite2 = $utenti->cognome . " " . $utenti->nome;
                    if ((strpos(strtolower($unite), strtolower($params2)) !== false) || (strpos(strtolower($unite2), strtolower($params2)) !== false)) {
                        /*commento riguardo l'if qua sopra: strtolower rende la stringa tutta in minuscolo, e questo avviene
                         * sia per ciò che è stato digitato che per il nome e cognome esaminati dal database, e se uno
                         * dei due strpos sono veri(esaminando unite e unite2 viste precendetemente) l'utente che sta venendo
                         * esaminato nel foreach viene messo nell'array risultati, che restituiremo alla fine con tutti gli
                         * utenti che corrispondono a ciò che si è digitato nella barra di ricerca
                         */
                        
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                        $risultati[] = DB::select($query2);
                    }
                }
            }
        } else {
            //SECONDO BLOCCO DELLA FUNZIONE: RICERCA IN BASE ALL'ESATTA STRINGA INSERITA(se digiti "luc", non ritorna nulla)
            $query = "SELECT * FROM users";

            $TabellaUtenti = DB::select($query);

            foreach ($TabellaUtenti as $utenti) {
                if(($utenti->visibile=="si")&&($utenti->id!==$idLoggato)){//solita verifica della visibilità dell'utente nella ricerca
                                                                          //controllando che non sia quello loggato
                    $unite = $utenti->nome . " " . $utenti->cognome; //creo sempre 2 variabili dove son contenuti nome e cognome
                    $unite2 = $utenti->cognome . " " . $utenti->nome;//e cognome e nome dell'utente esaminato dal foreach 

                    if (strtolower($utenti->nome) == strtolower($params)) {
                    //rendendo tutto minuscolo, si vede se il nome digitato è uguale a solo il nome cercato                                                   
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";
                        //se sono uguali, mi salvo l'utente esaminato dal foreach nell'array risultati
                        $risultati[] = DB::select($query2);
                    } else if (strtolower($utenti->cognome) == strtolower($params)) {
                        //rendendo tutto minuscolo, si vede se il cognome digitato è uguale a solo il cognome cercato 
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";
                        //se sono uguali, mi salvo l'utente esaminato dal foreach nell'array risultati
                        $risultati[] = DB::select($query2);
                    } else if (strtolower($unite) == strtolower($params) || strtolower($unite2) == strtolower($params)) {
                        //rendendo tutto minuscolo, verifico se nome e cognome o cognome e nome sono uguali alla stringa
                        //digitata
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";
                        //se uno dei due confronti è vero, mi salvo l'utente esaminato dal foreach nell'array risultati
                        $risultati[] = DB::select($query2);
                    }
                }
            }
        }//se ho ottenuto almeno 1 riscontro, ritorno l'array contenitore con tutti gli utenti che hanno soddisfatto
        //la ricerca 
        if(!empty($risultati))return $risultati;
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
