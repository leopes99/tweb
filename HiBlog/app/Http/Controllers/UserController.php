<?php

namespace App\Http\Controllers;
use App\Http\Requests\ModificaProfiloRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\StringContains;
use App\Models\Utenti;
use Hamcrest\Text\StringContainsIgnoringCase;
use App\Http\Requests\RicercaAmicoRequest;

class userController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile');
    }
    
    public function viewProfileEdit() {
        return view('profileEdit');
    }
    
    public function EditUtente(ModificaProfiloRequest $request){
       $utente = User::find(Auth::user()->id);
       if(Hash::check($request->password_attuale, $utente->password)){
        $result = collect(request()->all())->filter(function($request){
            return is_string($request)&&!empty($request)||is_array($request)&&count($request);
        });
        
        $user=Auth::user();        
        $user->update($result->all());
        
        return redirect()->action('UserController@index');
        }else{
        return back()->with('errore', 'Password errata!');}
            
    }   
    
    public function viewAmici(Request $request) {
        $utenti = new Utenti;
        $amici=$utenti->getAmici($request);
        if(!empty($amici)){
            $numero_amici = count($amici);
            return view('amici', ['amici' => $amici, 'numero_amici'=>$numero_amici]);
        }else{
            return view('amici', ['amici' => ""]);
        }
    }

    public function viewRicercaAmici() {
        return view('ricerca');
    }
    
    public function viewProfileOther(Request $request) {
        $query = "select * from users where id='".$request->id."'";
        $utente = DB::select($query);
        return view('profileOther', ['utente' => $utente]);
    }
    
    public function RicercaAmici(RicercaAmicoRequest $request) {
        // $params[] = collect($request->except('_token'));
        $params = $request->cercaAmici;
        $wildcard = "*";
        $controllo1="**";$controllo2="***";$controllo3="****";
        if($params==$wildcard||$params==$controllo1||$params==$controllo2||$params==$controllo3)return view('ricerca')->with('friends', "");
        //$test= str_replace("*","",$params);
        //echo '<pre>'; print_r($test); echo '</pre>';
        $ric = new Utenti;
        $risultati=$ric-> Ricerca($params,$wildcard );
       

        if (!empty($risultati))
            return view('ricerca')->with('friends', $risultati);
        else
            return view('ricerca')->with('friends', "");
        //$variabile = $this->users->getFriends($params); 
        //echo '<pre>'; print_r($variabile); echo '</pre>';
    }
    
    public function viewProfileResult(Request $request) {
        $query = "select * from users where id='".$request->id."'";
        $utente = DB::select($query);
        return view('profileResult', ['utente' => $utente]);
    }
    
    public function inviaRichiesta(Request $request) {
     $id_richiedente = Auth::user()->id;
     $id_ricevente = $request->id;
     
     $query1="select id_richiedente_amicizia, id_ricevente_amicizia from amicizie";
     $amicizie = DB::select($query1);
     $check = true;
     foreach($amicizie as $amicizia){
         if($amicizia->id_richiedente_amicizia == $id_richiedente){
             if($amicizia->id_ricevente_amicizia == $id_ricevente){
                 $check = false;
                 echo '<pre>'; print_r($check); echo '</pre>';
             }
         }
     }
     if($check==true){
        DB::insert('insert into amicizie (id_richiedente_amicizia, id_ricevente_amicizia, accettata) '
                . 'values (?, ?, ?)', [$id_richiedente, $id_ricevente, 0]);
        return back()->with('avviso', 'Richiesta inviata con successo!');
     }else{
        return back()->with('avviso', 'Hai già inviato una richiesta a questo utente!');}

    }
    
    public function viewNotifiche() {
        return view('notifiche');
    }

}


