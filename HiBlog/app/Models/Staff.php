<?php


namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blogs;
use App\Models\Resources\Blog;



class Staff {

   public function getAllBlogs(){
       
       $query1 = "SELECT * FROM blog";
        $Tabellablog = DB::select($query1);
       
         foreach ($Tabellablog as $Singoloblog) {
               $query2 = "SELECT * FROM blog INNER JOIN users ON blog.user_id = users.id WHERE BlogId = $Singoloblog->BlogId";
                $ListaBlogs[] = DB::select($query2);
        }
        
         
        if(!empty($ListaBlogs)){return $ListaBlogs;}
        
    }
    
    
    public function deletePost($IdPost){
          
        $query= "DELETE FROM post WHERE PostId = $IdPost";
        DB::delete($query);
        
         
        
    
        
    }
    
        
   }
 

