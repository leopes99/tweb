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
     foreach($amicizie as $amicizia){
         if($amicizia->id_richiedente_amicizia == $id_richiedente){
             if($amicizia->id_ricevente_amicizia == $id_ricevente){
                 $check = false;
                 #echo '<pre>'; print_r($check); echo '</pre>';
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
    
    public function viewNotifiche(Request $request) {
        $id = Auth::user()->id;
        $query = "select * from amicizie where accettata='0' ";
        $richieste = DB::select($query);
        
        foreach($richieste as $richiesta){
         if($richiesta->id_ricevente_amicizia == $id){
               $query2 = "SELECT * FROM users INNER JOIN amicizie ON amicizie.id_richiedente_amicizia = users.id WHERE id_ricevente_amicizia = $richiesta->id_ricevente_amicizia";
              $richiesteRicevute[] = DB::select($query2);
            } 
          } 
          
        $query3 = "select * from notifiche where id_destinatario = $id";
        $notifiche = DB::select($query3);
        
        #$query4 = "SELECT * FROM notifiche ";
                #INNER JOIN blog ON notifiche.id_blog = blog.BlogId WHERE id_destinatario = $id
        $notificheRicevute = DB::select($query3);
          
          #echo '<pre>'; print_r($notificheRicevute); echo '</pre>';
      if(!empty($richiesteRicevute) && !empty($notifiche)){
        return view('notifiche', ['richiesteRicevute' => $richiesteRicevute, 'notifiche' => $notificheRicevute]);
      }elseif(!empty($richiesteRicevute) && empty($notifiche)){
          return view('notifiche', ['richiesteRicevute' => $richiesteRicevute, 'notifiche' => '']);
      }elseif(empty($richiesteRicevute) && !empty($notifiche)){
          return view('notifiche', ['richiesteRicevute' => '', 'notifiche' => $notificheRicevute]);
      }else{
        return view('notifiche', ['richiesteRicevute' => '', 'notifiche' => '']);
      }
    }
    
    public function accettaRichiesta(Request $request) {
         DB::update('update amicizie set accettata =? where AmiciziaId = ?',[1,$request->id]);
         return view('notifiche');
    }
  
    public function eliminaRichiesta(Request $request) {
        DB::delete('delete from amicizie where AmiciziaId = ?',[$request->id]);
        return redirect()->route('notifiche');
    }
    
    public function eliminaAmicizia(Request $request) {
        $id = Auth::user()->id;
        DB::delete('delete from amicizie where accettata = ? AND id_richiedente_amicizia = ? AND id_ricevente_amicizia =? ',[1, $request->idOther, $id]);
        DB::delete('delete from amicizie where accettata = ? AND id_richiedente_amicizia = ? AND id_ricevente_amicizia =? ',[1, $id, $request->idOther]);
        
        $utenti = new Utenti;
        $amici=$utenti->getAmici($request);
        
        
        if(!empty($amici)){
            $numero_amici = count($amici);
            return view('amici', ['amici' => $amici, 'numero_amici'=>$numero_amici]);
        }else{
            return view('amici', ['amici' => ""]);
        }
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
        
       
          $utente = User::find(Auth::user()->id);
        
        $blog2 = new Blogs;
        $mieiBlog=$blog2->getBlogs($utente);
        
        if(!empty($mieiBlog)){
            $numero_blog = count($mieiBlog);
            
            return view('BlogIndex', ['blogMiei' => $mieiBlog, 'numero_blog'=>$numero_blog]);
        }else{
            return view('BlogIndex', ['blogMiei' => ""]);
        }
    }
    
    public function ViewCreateBlog(){
        return view("NewBlog");
    }
    
    public function CreateBlog(NuovoBlogRequest $request){
        
        $utente = User::find(Auth::user()->id);
        $idUtente=$utente->id;
        
         $blog = new Blogs;
        $blog->Create_Blog($idUtente,$request);
        
        
         $blog2 = new Blogs;
        $mieiBlog=$blog2->getBlogs($utente);
         $numero_blog = count($mieiBlog);
            
          
         return view('BlogIndex', ['blogMiei' => $mieiBlog, 'numero_blog'=>$numero_blog]);
         
          
    }
    
    public function ViewCreatePost(){
        return view("NewPost");
    }
    
    public function CreatePost(NuovoPostRequest $request){
        
        $post = new Posts;
        $post->CreatePost($request);
        
        
        
         $query = "select * from blog where BlogId='".$request->BlogId."'";
        $Blog = DB::select($query);
        
        $IdBlog = $request->BlogId;
        
        
        
        $post2 = new Posts;
        $postNelBlog=$post2->getAllPost($IdBlog);
         $numero_post = count($postNelBlog);
         
        return view('TheBlog', ['ThisBlog' => $Blog, 'Posts' => $postNelBlog, 'numero_post'=>$numero_post]);
    }
    
}


