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


class StaffController extends Controller
{
      public function __construct() {
        
    $this->staff= new Staff();
        
        $this->middleware('can:isStaff');
        
       
    }
    
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
    
}
