<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Resources\Blog;

class Blogs extends Model
{
    
     public function getBlogs($utente) {
            $query = "SELECT * FROM blog ";
            $IdUtenteLoggato = $utente->id;

            $TabellaBlog = DB::select($query);
            foreach ($TabellaBlog as $blogSingolo) {

                if ($blogSingolo->user_id == $IdUtenteLoggato) {
                    $query2 = "SELECT * FROM blog WHERE BlogId = $blogSingolo->BlogId";
                     $blogtot[]=DB::select($query2);
                }
            }
            if(!empty($blogtot)){return $blogtot;}
                
        }
    
        public function getBlogById($Id) {
        return Blog::where('BlogId', $Id)->first();
        
    }
       
    public function deleteBlog($IdBlog){
            $query = "DELETE FROM blog WHERE `blog`.`BlogId` =$IdBlog ";
             DB::delete($query);
        
    }
    
    public function Create_Blog($idUtente, $request) {
        if ($request->immagine == null) {
            $query = "INSERT INTO blog ( `user_id`, `nome`, `tema`, `descrizione`, `immagine`) VALUES ( $idUtente, '$request->nome', '$request->tema', '$request->descrizione', 'DefaultBlog.png');";
        } else {
            if ($request->hasFile('immagine')) {
                $image = $request->file('immagine');
                $imageName = $image->getClientOriginalName();
                
            } else {
                $imageName = NULL;
            }if (!is_null($imageName)) {
                $destinationPath = public_path() . '/images';
                $image->move($destinationPath, $imageName);
            }
            $query = "INSERT INTO `blog` ( `user_id`, `nome`, `tema`, `descrizione`, `immagine`) VALUES ( $idUtente, '$request->nome', '$request->tema', '$request->descrizione', '$imageName');";
        }
        DB::insert($query);
    }

}