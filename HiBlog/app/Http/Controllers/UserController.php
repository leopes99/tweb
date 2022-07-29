<?php

namespace App\Http\Controllers;
use App\Http\Requests\ModificaProfiloRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
            $numero_amici = count($amici);
            return view('amici', ['amici' => $amici, 'numero_amici'=>$numero_amici]);
        }else{
            return view('amici', ['amici' => ""]);
        }
        

        $numero_amici = count($amici);
        echo '<pre>'; print_r($amici); echo '</pre>';
        #return view('amici', ['amici' => $amici, 'numero_amici'=>$numero_amici]);
    }

    public function viewRicercaAmici() {
        return view('ricerca');
    }
    
    public function viewProfileOther(Request $request) {
        $query = "select * from users where id='".$request->id."'";
        $utente = DB::select($query);
        return view('profileOther', ['utente' => $utente]);
    }
    
}
