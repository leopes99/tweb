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
 
    public function getAllPost($IdBlog) {
        
        $query1 = "SELECT * FROM post";
        $TabellaPost = DB::select($query1);
        foreach ($TabellaPost as $SingoloPost) {
           if ($SingoloPost->id_blog == $IdBlog) {
               $query2 = "SELECT * FROM post INNER JOIN users ON post.user_id = users.id WHERE PostId = $SingoloPost->PostId";
                $postNelBlog[] = DB::select($query2);
            }
        }
        if (!empty($postNelBlog)) {
            return $postNelBlog;
        }
    }
    
}
