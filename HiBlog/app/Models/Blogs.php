<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
}
