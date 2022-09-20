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
    
     public function DeleteBlog(Request $request){
        
        $IdBlog = $request->BlogId;
        
        $blog = new Blogs;
        
        $blog->deleteBlog($IdBlog);
        
        $TuttiBlog = new Staff;
        $ListaBlogs=$TuttiBlog->getAllBlogs();
        
        
        if(!empty($ListaBlogs)){
            $numblog=count($ListaBlogs);
            
            return view('staff/GestBlogs', ['BlogTot' => $ListaBlogs, 'numero_blog'=>$numblog]);
        }else{
            return view('staff/GestBlogs', ['BlogTot' => ""]);
        }
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
 
    public function DeletePost(Request $request){
        $IdBlog = $request->BlogId;
        $IdPost=$request->PostId;
        
        
        $postDaCancellare=new Staff;
        $postDaCancellare->deletePost($IdPost);
        
        $query2 = "select * from blog where BlogId = '$IdBlog' ";
        $Blog = DB::select($query2);

 
 
 
        $post = new Posts;
        $postNelBlog=$post->getAllPost($IdBlog);
        if(!empty($postNelBlog)){
            $numero_post = count($postNelBlog);
           
           
            return view('staff/BlogControl', ['ThisBlog' => $Blog, 'Posts' => $postNelBlog, 'numero_post'=>$numero_post]);
        }else{
            return view('staff/BlogControl', ['ThisBlog' => $Blog]);
        }
        
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
        
         $admin = new Admin;
        $ElencoStaff=$admin->getAllStaffs();
         if(!empty($ElencoStaff)){
            $numero_staff = count($ElencoStaff);
            return view('admin/GestUtenti', [ 'staffs' => $ElencoStaff, 'numero_staff'=>$numero_staff]);
        }else{
            return view('admin/GestUtenti', ['staffs' => ""]);
        }  
        
    }
    
    public function DeleteStaff(Request $request){
        
        $admin = new Admin;
        $admin->destroyStaff($request->id);
        
        $admin = new Admin;
        $ElencoStaff=$admin->getAllStaffs();
         if(!empty($ElencoStaff)){
            $numero_staff = count($ElencoStaff);
            return view('admin/GestUtenti', [ 'staffs' => $ElencoStaff, 'numero_staff'=>$numero_staff]);
        }else{
            return view('admin/GestUtenti', ['staffs' => ""]);
        }
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
       $admin = new Admin;
        $ElencoStaff=$admin->getAllStaffs();
         if(!empty($ElencoStaff)){
            $numero_staff = count($ElencoStaff);
            return view('admin/GestUtenti', [ 'staffs' => $ElencoStaff, 'numero_staff'=>$numero_staff]);
        }else{
            return view('admin/GestUtenti', ['staffs' => ""]);
        }
    }
    
    public function viewStats(){
         
          $TuttiBlog = new Staff;
            $ListaBlogs=$TuttiBlog->getAllBlogs();
            $numblog=count($ListaBlogs);
            
         
        return view('admin/Stats' , [ 'numero_blog' => $numblog]);
        
    }
    
    
    public function ricercaStat(RicercaAmicoRequest $request){
         $params = $request->cercaAmici;
        $wildcard = "*";
        $controllo1="**";$controllo2="***";$controllo3="****";
        if($params==$wildcard||$params==$controllo1||$params==$controllo2||$params==$controllo3){
            
            $TuttiBlog = new Staff;
            $ListaBlogs=$TuttiBlog->getAllBlogs();
            $numblog=count($ListaBlogs);
            
        if (!empty($risultati))    
            return view('admin/Stats' , [ 'numero_blog' => $numblog , 'utenti' => $risultati]);
        else
             return view('admin/Stats' , [ 'numero_blog' => $numblog , 'utenti' => ""]);
            
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
        $elencoRichiesteAmicizia=$admin2->getRichiesteStats($id);
        
        $admin2 = new Admin;
        $utente=$admin2->getUte($id);
        
        $utenti = new Utenti;
        $amici=$utenti->getAmici($request);
       
        
        if (!empty($numeroBlog) && !empty($elencoRichiesteAmicizia) && !empty($amici)){
            $numero_richieste=count($elencoRichiesteAmicizia);
            return view('admin/ProfileStats' , [ 'numero_blog' => $numeroBlog , 'numero_richieste' => $numero_richieste , 'utente'=>$utente , 'amici' => $amici]);   
        }
        
        else if(empty($numeroBlog) && !empty($elencoRichiesteAmicizia) && !empty($amici)){
            $numero_richieste=count($elencoRichiesteAmicizia);
            return view('admin/ProfileStats' , [ 'numero_blog' => "" , 'numero_richieste' => $numero_richieste  , 'utente'=>$utente , 'amici' => $amici]);   
        }
        
        else if(!empty($numeroBlog) && empty($elencoRichiesteAmicizia) && !empty($amici)){
            return view('admin/ProfileStats' , [ 'numero_blog' => $numeroBlog , 'numero_richieste' => "" , 'utente'=>$utente, 'amici' => $amici]);
        }    
        
        else if (!empty($numeroBlog) && !empty($elencoRichiesteAmicizia) && empty($amici)){
            $numero_richieste=count($elencoRichiesteAmicizia);
            return view('admin/ProfileStats' , [ 'numero_blog' => $numeroBlog , 'numero_richieste' => $numero_richieste , 'utente'=>$utente , 'amici' => $amici]);   
        }
        
        else if (empty($numeroBlog) && empty($elencoRichiesteAmicizia) && !empty($amici)){
            
            return view('admin/ProfileStats' , [ 'numero_blog' => "" , 'numero_richieste' => "" , 'utente'=>$utente , 'amici' => $amici]);   
        }
        
        else if (empty($numeroBlog) && !empty($elencoRichiesteAmicizia) && empty($amici)){
            $numero_richieste=count($elencoRichiesteAmicizia);
            return view('admin/ProfileStats' , [ 'numero_blog' => "" , 'numero_richieste' => $numero_richieste , 'utente'=>$utente , 'amici' => ""]);   
        }
        else if (!empty($numeroBlog) && empty($elencoRichiesteAmicizia) && empty($amici)){
            
            return view('admin/ProfileStats' , [ 'numero_blog' =>$numeroBlog , 'numero_richieste' => "" , 'utente'=>$utente , 'amici' => ""]);   
        }
        else return view('admin/ProfileStats' , [ 'numero_blog' =>"" , 'numero_richieste' => "" , 'utente'=>$utente , 'amici' => ""]);   
    }
        
}
            
    

