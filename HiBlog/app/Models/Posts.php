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

class Posts extends Model
{
 
    public function getAllPost($IdBlog) {
        
        $query1 = "SELECT * FROM post";
        $TabellaPost = DB::select($query1);
        
        foreach ($TabellaPost as $SingoloPost) {
           if ($SingoloPost->id_blog == $IdBlog) {
               $query2 = "SELECT * FROM users INNER JOIN post ON post.user_id = users.id WHERE PostId = $SingoloPost->PostId";
                $postNelBlog[] = DB::select($query2);
            }
        }
        if (!empty($postNelBlog)) {
            return $postNelBlog;
        }
    }
    
    public function CreatePost($request){
        $idblog=$request->BlogId;
        $utente = User::find(Auth::user()->id);
        $idUtente=$utente->id;
        $content=$request->contenuto_post;
        date_default_timezone_set('Europe/Rome');
        $DataOra = date('Y-m-d H:i:s');
        
         $query = "INSERT INTO post ( `user_id`, `id_blog`, `contenuto_post`, `created_at`) VALUES ( $idUtente, $idblog, '$content', '$DataOra');";
         DB::insert($query);
    }
    
}
