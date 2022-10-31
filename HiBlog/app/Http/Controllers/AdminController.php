<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ModificaProfiloRequest;
use App\Http\Requests\NuovoBlogRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\StringContains;
use App\Models\Utenti;
use App\Models\Blogs;
use App\Models\Posts;
use App\Http\Requests\NuovoPostRequest;
use Hamcrest\Text\StringContainsIgnoringCase;
use App\Http\Requests\RicercaAmicoRequest;
use App\Models\Staff;
use App\Models\Admin;
use App\Http\Requests\NuovoStaffRequest;
use App\Http\Requests\MotivazioneCancRequest;
use App\Http\Requests\MotivazioneCancRequest2;

class AdminController extends Controller {

    protected $_adminModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_adminModel = new Admin;
    }

    //INIZIO DELLE FUNZIONI UGUALI ALLO STAFF
   
 public function ViewAllBlogs(){
        
        $TuttiBlog = new Staff;
        $ListaBlogs=$TuttiBlog->getAllBlogs();
        
        
        if(!empty($ListaBlogs)){
            $numblog=count($ListaBlogs);
            
            return view('staff/GestBlogs', ['BlogTot' => $ListaBlogs, 'numero_blog'=>$numblog]);
        }else{
            return view('staff/GestBlogs', ['BlogTot' => ""]);
        }
        
    }
    
     public function DeleteBlog(MotivazioneCancRequest $request){
        
       $IdBlog = $request->BlogId;
        
        $motivo = $request->motivazioneBlog;
        $query2 =  "select * from blog where BlogId = '$IdBlog' ";
        $blogEliminato = DB::select($query2);
        $idDestinatario = $blogEliminato[0]->user_id;
        date_default_timezone_set('Europe/Rome');
        $DataOra = date('Y-m-d H:i:s');
        $NomeBlog = $blogEliminato[0]->nomeblog; 
       
        $blog = new Blogs;
        
        $blog->deleteBlog($IdBlog);
        
        $TuttiBlog = new Staff;
        $ListaBlogs=$TuttiBlog->getAllBlogs();
        
         DB::insert('insert into notifiche (id_destinatario, tipologia_notifica, nome_blog, contenuto_post, motivo_cancellazione, created_at) '
                . 'values (?, ?, ?, ?, ?, ?)', [$idDestinatario, 'RimozioneBlog', $NomeBlog, '', $motivo, $DataOra]);
        
       
        return redirect()->action('AdminController@ViewAllBlogs');
       
    }
    
     public function VisualizzaBlog(Request $request){
        $query = "select * from blog where BlogId='".$request->BlogId."'";
        $Blog = DB::select($query);
        
        $IdBlog = $request->BlogId;
        
        
        
        $post = new Posts;
        $postNelBlog=$post->getAllPost($IdBlog);
        if(!empty($postNelBlog)){
            $numero_post = count($postNelBlog);

           
            return view('staff/BlogControl', ['ThisBlog' => $Blog, 'Posts' => $postNelBlog, 'numero_post'=>$numero_post]);
        }else{
            return view('staff/BlogControl', ['ThisBlog' => $Blog]);
        }
        
    }
 
    public function DeletePost(MotivazioneCancRequest2 $request){
         $IdPost = $request->PostId;
        $motivo = $request->motivazione;
        $query2 =  "select * from post where PostId = '$IdPost' ";
        $postEliminato = DB::select($query2);
        $idDestinatario = $postEliminato[0]->user_id;
        $IdBlog = $postEliminato[0]->id_blog;
        $contenutoPost = $postEliminato[0]->contenuto_post;
        date_default_timezone_set('Europe/Rome');
        $DataOra = date('Y-m-d H:i:s');
       
        DB::insert('insert into notifiche (id_destinatario, tipologia_notifica, nome_blog,contenuto_post, motivo_cancellazione, created_at) '
                . 'values (?, ?, ?, ?, ?, ?)', [$idDestinatario, 'RimozionePost', null, $contenutoPost, $motivo, $DataOra]);
        
        $postDaCancellare=new Staff;
        $postDaCancellare->deletePost($IdPost);
        
        
        return redirect()->route('VediGestBlog',['BlogId'=>$IdBlog]);
        
        
    }

    //FINE DELLE FUNZIONI UGUALI ALLO STAFF
    
    public function viewGestUtenti(){
        
        $admin = new Admin;
        $ElencoStaff=$admin->getAllStaffs();
        
        //echo '<pre>'; print_r($numero); echo '</pre>';
        
         if(!empty($ElencoStaff)){
            $numero_staff = count($ElencoStaff);
           
           
            return view('admin/GestUtenti', [ 'staffs' => $ElencoStaff, 'numero_staff'=>$numero_staff]);
        }else{
            return view('admin/GestUtenti', ['staffs' => ""]);
        } 
    }
    
    public function viewAddStaff(){
        return view('admin/AggiungiStaff');
    }
    
    public function Addstaff(NuovoStaffRequest $request){
        $admin = new Admin;
        $admin->NewStaff($request);
        
         $admin2 = new Admin;
        $ElencoStaff=$admin2->getAllStaffs();
                    $numero_staff = count($ElencoStaff);

        
       // return redirect()->action('AdminController@viewGestUtenti'); 
                return redirect()->route('viewGestUtenti');

    }
    
    public function DeleteStaff(Request $request){
        
        $admin = new Admin;
        $admin->destroyStaff($request->id);
        
        return redirect()->route('viewGestUtenti');

    }
    
    public function viewEditStaff(Request $request){
        $admin = new Admin;
        $staff= $admin->getDataStaff($request->id);
        
        
        return view('admin/ModifyStaff' , [ 'staff' => $staff]);
    }
    
    public function EditStaff(ModificaProfiloRequest $request){
         $admin = new Admin;
         $admin->updateStaff($request);
        
       // echo '<pre>'; print_r($var); echo '</pre>';
          return redirect()->route('viewGestUtenti');
       
    }
    
    public function viewStats(){
         
          $TuttiBlog = new Staff;
            $ListaBlogs=$TuttiBlog->getAllBlogs();
            if(!empty($ListaBlogs))
            {$numblog=count($ListaBlogs);
            
         
            return view('admin/Stats' , [ 'numero_blog' => $numblog]);}
            else return view('admin/Stats' , [ 'numero_blog' => ""]);
        
    }
    
    
    public function ricercaStat(RicercaAmicoRequest $request){
         $params = $request->cercaAmici;
        $wildcard = "*";
        $controllo1="**";$controllo2="***";$controllo3="****";
        if($params==$wildcard||$params==$controllo1||$params==$controllo2||$params==$controllo3){
            
            return redirect()->route('viewStats');
        }
        
        //echo '<pre>'; print_r($test); echo '</pre>';
        $ric = new Admin;
        $risultati=$ric-> AdminRicerca($params,$wildcard );
        
            $TuttiBlog = new Staff;
            $ListaBlogs=$TuttiBlog->getAllBlogs();
            $numblog=count($ListaBlogs);
            
        if (!empty($risultati))    
            return view('admin/Stats' , [ 'numero_blog' => $numblog , 'utenti' => $risultati]);
        else
             return view('admin/Stats' , [ 'numero_blog' => $numblog , 'utenti' => ""]);
    }
    
    public function profileStats(Request $request){
        $id=$request->id;
        $admin = new Admin;
        $numeroBlog=$admin->countBlog($id);
        
        $admin2 = new Admin;
        $numero_richieste=$admin2->getRichiesteStats($id);
        
        $admin2 = new Admin;
        $utente=$admin2->getUte($id);
        
        $utenti = new Utenti;
        $amici=$utenti->getAmici($request);
       
        
        if (!empty($numeroBlog) && !empty($amici)) {
            return view('admin/ProfileStats', ['numero_blog' => $numeroBlog, 'numero_richieste' => $numero_richieste, 'utente' => $utente, 'amici' => $amici]);
                    
        } else if (empty($numeroBlog) && !empty($amici)) {
            return view('admin/ProfileStats', ['numero_blog' => "", 'numero_richieste' => $numero_richieste, 'utente' => $utente, 'amici' => $amici]);
       
        } else if (!empty($numeroBlog) && empty($amici)) {
            return view('admin/ProfileStats', ['numero_blog' => $numeroBlog, 'numero_richieste' => $numero_richieste, 'utente' => $utente, 'amici' => $amici]);
       
        } else if (empty($numeroBlog) && empty($amici)) {
            return view('admin/ProfileStats', ['numero_blog' => "", 'numero_richieste' => $numero_richieste, 'utente' => $utente, 'amici' => ""]);
        
            
        } else
            return view('admin/ProfileStats', ['numero_blog' => "", 'numero_richieste' => "", 'utente' => $utente, 'amici' => ""]);
    }

}
            
    

