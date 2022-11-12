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
            
        $query=" DELETE FROM `post` WHERE `post`.`id_blog` = $IdBlog";
        DB::delete($query);
        
            $query2 = "DELETE FROM blog WHERE `blog`.`BlogId` =$IdBlog ";
             DB::delete($query2);
        
    }
    
    public function Create_Blog($idUtente, $request) {
        if ($request->immagine == null) {
            $query = "INSERT INTO blog ( `user_id`, `nomeblog`, `tema`, `descrizione`, `immagine`) VALUES ( $idUtente, '$request->nomeblog', '$request->tema', '$request->descrizione', 'DefaultBlog.png');";
        } else {
            if ($request->hasFile('immagine')) { //se c'è l immagine
                $image = $request->file('immagine'); //passo il file dlel'immagine creata
                $imageName = $image->getClientOriginalName(); //ad imagename gli passo 
                
            } else {
                $imageName = NULL; //nel caso in cui gli ho passato un file che non c entra nulla, setto null ad imagename
            }if (!is_null($imageName)) {
                $destinationPath = public_path() . '/images';
                $image->move($destinationPath, $imageName);
            }
            $query = "INSERT INTO `blog` ( `user_id`, `nomeblog`, `tema`, `descrizione`, `immagine`) VALUES ( $idUtente, '$request->nomeblog', '$request->tema', '$request->descrizione', '$imageName');";
        }
        DB::insert($query);
    }

    public function getBlogs2($utente) {
            $query = "SELECT * FROM blog ";
            $IdUtenteLoggato = $utente;

            $TabellaBlog = DB::select($query);
            foreach ($TabellaBlog as $blogSingolo) {

                if ($blogSingolo->user_id == $IdUtenteLoggato) {
                    $query2 = "SELECT * FROM blog WHERE BlogId = $blogSingolo->BlogId";
                     $blogtot[]=DB::select($query2);
                }
            }
            if(!empty($blogtot)){return $blogtot;}
                
        }
    
}
