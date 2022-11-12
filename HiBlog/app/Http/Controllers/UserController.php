<?php

namespace App\Http\Controllers;
use App\Http\Requests\ModificaProfiloRequest;
use App\Http\Requests\NuovoBlogRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\StringContains;
use App\Models\Utenti;
use App\Models\Blogs;
use App\Models\Posts;
use App\Http\Requests\NuovoPostRequest;

use Hamcrest\Text\StringContainsIgnoringCase;
use App\Http\Requests\RicercaAmicoRequest;

class userController extends Controller {

    public function __construct() {
        $this->middleware('auth'); //laravel verifica che l'utente sia autenticato
    }

    public function index() {
        return view('profile');  //appena fatto l'accesso si è indirizzati nella vista profile
    }
    
    public function viewProfileEdit() {
        return view('profileEdit'); //fa vedere la vista profileEdit
    }
    
    public function EditUtente(ModificaProfiloRequest $request){   
       $utente = User::find(Auth::user()->id); 
       if(Hash::check($request->password_attuale, $utente->password)){
        $result = collect(request()->all())->filter(function($request){
            //collect raccoglie tutto quello che sta in request
            //filter va a mettere tutti i dati raccolti in result
            return is_string($request)&&!empty($request)||is_array($request)&&count($request);
            //is string controlla che le cose passate siano una stringa e che non sia vuota
            //OPPURE che sia un array
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
        
        $params = $request->cercaAmici;  //prendo la stringa digitata dall'utente
        $wildcard = "*";    //creo una variabile chiamandola wildcard, servirà per effettuare un controllo e per fare la ricerca parziale
        $controllo1="**";$controllo2="***";$controllo3="****";//creo altre 3 variabili che mi serviranno per fare un controllo multiplo
        if($params==$wildcard||$params==$controllo1||$params==$controllo2||$params==$controllo3)return view('ricerca')->with('friends', "");
        //vado ad assicurarmi che il testo digitato non contenga esclusivamente 1,2,3,4 caratteri wildcard "*", in caso positivo
        //viene ritornata la vista senza risultati. Nel caso non ci fosse questo controllo il sito darebbe errore
        
        $ric = new Utenti;
        $risultati=$ric-> Ricerca($params,$wildcard ); //faccio partire la funzione Ricerca contenuta in Models/Utenti.php
                                                       //passandogli il carattere wildcard e la stringa digitata dall'utente.
       

        if (!empty($risultati))//se la variabile risultati che contiene i profili trovati contiene risultati la passo alla vista
            return view('ricerca')->with('friends', $risultati);
        else
            return view('ricerca')->with('friends', "");//altrimenti non gli passo niente, per evitare errori
        
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
     foreach($amicizie as $amicizia){ //questo foreach controlla che non siano gia amici o che non sia gia stata inviata
         if($amicizia->id_richiedente_amicizia == $id_richiedente){
             if($amicizia->id_ricevente_amicizia == $id_ricevente){
                 $check = false;
                 //se false, vuol dire che sono gia amici o che gliel ho gia mandata
             }
         }
     }
     if($check==true){
        DB::insert('insert into amicizie (id_richiedente_amicizia, id_ricevente_amicizia, accettata) '
                . 'values (?, ?, ?)', [$id_richiedente, $id_ricevente, 0]);
     $query2="select RichiesteRicevute from users where id = $id_ricevente";
     $richieste = DB::select($query2); //mi salvo il numero richieste ricevute per l'admin
     $a = $richieste[0]->RichiesteRicevute;
     $a+=1;
     //echo '<pre>'; print_r($a); echo '</pre>';
     $c="UPDATE `users` SET `RichiesteRicevute` = $a WHERE users.id=$id_ricevente";
     DB::update($c);
     
     
        return back()->with('avviso', 'Richiesta inviata con successo!');
     }else{
        return back()->with('avviso', 'Hai già inviato una richiesta a questo utente!');}

    }
    
    public function viewNotifiche() {
        $id = Auth::user()->id;
        //questa parte riguarda le RICHIESTE DI AMICIZIA
        $query = "select * from amicizie where accettata='0' ";
        $richieste = DB::select($query);
        
        foreach($richieste as $richiesta){
         if($richiesta->id_ricevente_amicizia == $id){
               $query2 = "SELECT * FROM users INNER JOIN amicizie ON amicizie.id_richiedente_amicizia = users.id WHERE accettata='0'";
              $richiesteRicevute = DB::select($query2);
            } 
          } 
          //questa query riguarda la notifica RIMOZIONE AMICO
        $query3 = "SELECT * FROM notifiche INNER JOIN users ON notifiche.id_mittente = users.id WHERE id_destinatario = $id AND tipologia_notifica = 'RimozioneAmico'";
        //Questa query rigurda tutte le altre notifiche(rimozione post, rimozione blog,creazione post di un blog di un amico
        $query4 = "SELECT * FROM notifiche WHERE id_destinatario = $id";
        $notificheRimAmico = DB::select($query3);
        $notifiche= DB::select($query4);
        
      if (!empty($richiesteRicevute) && !empty($notifiche) && !empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => $richiesteRicevute, 'notifiche' => $notifiche, 'notificheRimAmico' => $notificheRimAmico]);
        } elseif (!empty($richiesteRicevute) && empty($notifiche) && !empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => $richiesteRicevute, 'notifiche' => '', 'notificheRimAmico' => $notificheRimAmico]);
        } elseif (empty($richiesteRicevute) && !empty($notifiche) && !empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => '', 'notifiche' => $notifiche, 'notificheRimAmico' => $notificheRimAmico]);
        } elseif (empty($richiesteRicevute) && empty($notifiche) && !empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => '', 'notifiche' => '', 'notificheRimAmico' => $notificheRimAmico]);
        } elseif (!empty($richiesteRicevute) && empty($notifiche) && empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => $richiesteRicevute, 'notifiche' => '', 'notificheRimAmico' => '']);
        } elseif (!empty($richiesteRicevute) && !empty($notifiche) && empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => $richiesteRicevute, 'notifiche' => $notifiche, 'notificheRimAmico' => '']);
        }if (empty($richiesteRicevute) && empty($notifiche) && empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => '', 'notifiche' => '', 'notificheRimAmico' => '']);
        } elseif (empty($richiesteRicevute) && !empty($notifiche) && empty($notificheRimAmico)) {
            return view('notifiche', ['richiesteRicevute' => '', 'notifiche' => $notifiche, 'notificheRimAmico' => '']);
        }
    }
    
    public function accettaRichiesta(Request $request) {
         DB::update('update amicizie set accettata =? where AmiciziaId = ?',[1,$request->id]);
         return redirect()->route('notifiche');
    }
  
    public function eliminaRichiesta(Request $request) {
        DB::delete('delete from amicizie where AmiciziaId = ?',[$request->id]);
        return redirect()->route('notifiche');
    }
    
    public function eliminaAmicizia(Request $request) {
        $id = $request->id;
        $idOther = $request->idOther;
        
        $query = "INSERT INTO notifiche ( id_destinatario, id_mittente, id_blog, tipologia_notifica) VALUES ( $idOther, $id, null, 'RimozioneAmico');";
        DB::insert($query);
        
        DB::delete('delete from amicizie where accettata = ? AND id_richiedente_amicizia = ? AND id_ricevente_amicizia =? ',[1, $idOther, $id]);
        DB::delete('delete from amicizie where accettata = ? AND id_richiedente_amicizia = ? AND id_ricevente_amicizia =? ',[1, $id, $idOther]);
        
       
        
        return redirect()->route('amici', ['id'=>Auth::user()->id]);
    }

    public function viewblogS(){
        $utente = User::find(Auth::user()->id);
        
        $blog = new Blogs;
        $mieiBlog=$blog->getBlogs($utente);
        
        if(!empty($mieiBlog)){
            $numero_blog = count($mieiBlog);
            
            return view('BlogIndex', ['blogMiei' => $mieiBlog, 'numero_blog'=>$numero_blog]);
        }else{
            return view('BlogIndex', ['blogMiei' => ""]);
        }
        
     
    }
    
    public function OpenBlog(Request $request) {
        
        $query = "select * from blog where BlogId='".$request->BlogId."'";
        $Blog = DB::select($query);
        if(empty($Blog)){return view('Inesistente');}
        $IdBlog = $request->BlogId;
        
        
        
        $post = new Posts;
        $postNelBlog=$post->getAllPost($IdBlog);
        
        if(!empty($postNelBlog)){
            $numero_post = count($postNelBlog);

           
            return view('TheBlog', ['ThisBlog' => $Blog, 'Posts' => $postNelBlog, 'numero_post'=>$numero_post]);
        }else{
            return view('TheBlog', ['ThisBlog' => $Blog]);
        }
        
        
        
    }
    
    public function DeleteBlog(Request $request){
        
        $IdBlog = $request->BlogId;
        
        $blog = new Blogs;
        
        $blog->deleteBlog($IdBlog);
        
       
         
        return redirect()->action('UserController@viewblogS');
    }
    
    public function ViewCreateBlog(){
        return view("NewBlog");
    }
    
    public function CreateBlog(NuovoBlogRequest $request){
        
        $utente = User::find(Auth::user()->id);
        $idUtente=$utente->id;
        
         $blog = new Blogs;
        $blog->Create_Blog($idUtente,$request);
        
           return redirect()->action('UserController@viewblogS');
    }
    
    public function ViewCreatePost(){
        return view("NewPost");
    }
    
    public function CreatePost(NuovoPostRequest $request){
        
        $post = new Posts;
        $post->CreatePost($request);
         //da qua in poi creo la notifica di creazione post
        $query = "select * from blog where BlogId='".$request->BlogId."'";
        $Blog = DB::select($query);
        
        $IdBlog = $request->BlogId;
        $IdProprietario = $Blog[0]->user_id;
        $nomeBlog = $Blog[0]->nomeblog;
        date_default_timezone_set('Europe/Rome');
        $DataOra = date('Y-m-d H:i:s');
        
        
        
        $query1 = "select id_ricevente_amicizia from amicizie where accettata='1' and id_richiedente_amicizia = $IdProprietario";
        $query2 = "select id_richiedente_amicizia from amicizie where accettata='1' and id_ricevente_amicizia = $IdProprietario";

        $idamici1 = DB::select($query1);
        foreach ($idamici1 as $idamico1) {
            $idamici[] = $idamico1->id_ricevente_amicizia;
        }

        $idamici2 = DB::select($query2);
        foreach ($idamici2 as $idamico2) {
            $idamici[] = $idamico2->id_richiedente_amicizia;
        }
        if(!empty($idamici)){
            foreach($idamici as $idamico){
                $query = "INSERT INTO notifiche ( id_destinatario, id_mittente, id_blog, tipologia_notifica, nome_blog, created_at) VALUES ( $idamico, $IdProprietario, $IdBlog, 'CreazionePost', '$nomeBlog', '$DataOra');";
            DB::insert($query);
            }
        }
        #echo '<pre>'; print_r($IdBlog); echo '</pre>';
        
        $post2 = new Posts;
        $postNelBlog=$post2->getAllPost($IdBlog);
         $numero_post = count($postNelBlog);
         
        return redirect()->route('vediblog', ['BlogId'=>$IdBlog]);
    }
    
    
    public function vediBlogAmici(Request $request){
       $utente = $request->idAmico;
        $usernameAmico = $request->usernameAmico;
        $blog = new Blogs;
        $ListaBlogs=$blog->getBlogs2($utente);
        
        if(!empty($ListaBlogs)){
            $numero_blog = count($ListaBlogs);
            
            return view('ListOfFriendsBlogs', ['blogAmico' => $ListaBlogs, 'numero_blog'=>$numero_blog , 'usernameAmico' => $usernameAmico]);
        }else{
            return view('ListOfFriendsBlogs', ['blogAmico' => "" , 'numero_blog'=>"", 'usernameAmico'=>$usernameAmico]);
        }
    }
    
   
    
}


