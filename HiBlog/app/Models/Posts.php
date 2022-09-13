<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blogs;
use App\Models\Resources\Blog;

class Posts extends Model
{
 
    public function getAllPost($IdBlog){
        
               
                        
                    $query2 = "SELECT * FROM post INNER JOIN users ON post.user_id = users.id WHERE $IdBlog = id_blog";
                    
                        
                    //$query3 = "SELECT  WHERE $IdBlog = id_blog ";
                    
                     
                     //$postNelBlog[]=DB::select($query3);
                      
                
                    $postNelBlog[]=DB::select($query2);
                 
           
          echo '<pre>'; print_r($postNelBlog); echo '</pre>';
          
            if(!empty($postNelBlog)){return $postNelBlog;}
        
    }
    
}
