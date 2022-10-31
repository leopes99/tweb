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

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class Admin {

    //INIZIO DELLE FUNZIONI UGUALI ALLO STAFF
    
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
          
        $query= "DELETE FROM `post` WHERE `post`.`PostId` = $IdPost";
        DB::delete($query);
        

        
    }
    
    //FINE DELLE FUNZIONI UGUALI ALLO STAFF
    
    public function getAllStaffs(){
        
        $query1 = "SELECT * FROM users WHERE users.role = 'staff'";
        $TabellaUtenti = DB::select($query1);
       
         foreach ($TabellaUtenti as $utente) {
                
               $query2 = "SELECT * FROM users WHERE $utente->id=users.id ";
                $ElencoStaff[] = DB::select($query2);
        }
        
         //echo '<pre>'; print_r($ElencoStaff); echo '</pre>';
        if(!empty($ElencoStaff)){return $ElencoStaff;}
        
        
    }
      
    public function NewStaff($request){
        
       // echo '<pre>'; print_r(); echo '</pre>';
        
       // $query="INSERT INTO `users` (`id`, `nome`, `cognome`, `data_nascita`, `genere`, `visibile`, `telefono`, `email_verified_at`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, '$request->nome', '$request->cognome', '$request->datanascita', '$request->genere', 'no', '$request->telefono', NULL, '$request->username', '$request->email', '$request->password', 'staff', NULL, NULL, NULL)";
        // DB::insert($query);
        
       
     
     
       
        
        return User::create([
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'data_nascita'=> $request->datanascita,
            'telefono' => $request->telefono,
            'genere'=> $request->genere,
            'role' => 'staff',
            'visibile'=>'no'        
        ]);  
    }
    
    public function destroyStaff($id){
         $query= "DELETE FROM `users` WHERE `users`.`id` = $id";
        DB::delete($query);
    }
    
    public function getDataStaff($id){
        $query1 = "SELECT * FROM users WHERE users.id = $id ";
        return $staff[] = DB::select($query1);
    }
    
    public function updateStaff($request){
        
        $pssw=HASH::make($request->password);
        $query="UPDATE `users` SET `nome` = '$request->nome', `cognome` = '$request->cognome',`data_nascita`='$request->data_nascita',`username`='$request->username',`email`='$request->email',`password`='$pssw',`telefono`='$request->telefono' WHERE `users`.`username` = '$request->username';";
        DB::update($query);
        
    }
    
    public function countBlog($id){
       $query="SELECT * FROM blog";
       $Blogs=DB::SELECT($query);
        
       foreach($Blogs as $blog){
           if($blog->user_id==$id){
           $query2="SELECT * FROM blog WHERE blog.user_id=$id";
           $Blogs2[]=DB::SELECT($query2);
           }
       }if(!empty($Blogs2))return count($Blogs2);
    } 
    
    public function getRichiesteStats($id){
       
        $query="SELECT RichiesteRicevute FROM users where users.id=$id";
        $a=DB::SELECT($query);
        $b=$a[0]->RichiesteRicevute;
       
        return $b;  
    }
    
    public function getUte($id){
         $query="SELECT * FROM users WHERE users.id=$id";
         return $utente[]=DB::SELECT($query);
         //return $username=$utente->username;
          
        
    }
    
       public function AdminRicerca($params, $wildcard){
                if (strpos($params, $wildcard) !== false) {
            $params2 = str_replace("*", "", $params);
            $query = "SELECT * FROM users ";

            $TabellaUtenti = DB::select($query);

            foreach ($TabellaUtenti as $utenti) {
                if($utenti->role=="utente"){
                    $unite = $utenti->nome . " " . $utenti->cognome;
                    $unite2 = $utenti->cognome . " " . $utenti->nome;
                    if ((strpos(strtolower($unite), strtolower($params2)) !== false) || (strpos(strtolower($unite2), strtolower($params2)) !== false)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                        $risultati[] = DB::select($query2);
                    }
                }
            }
        } else {

            $query = "SELECT * FROM users";

            $TabellaUtenti = DB::select($query);

            foreach ($TabellaUtenti as $utenti) {
                if($utenti->role=="utente"){
                    $unite = $utenti->nome . " " . $utenti->cognome;
                    $unite2 = $utenti->cognome . " " . $utenti->nome;

                    if (strtolower($utenti->nome) == strtolower($params)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                        $risultati[] = DB::select($query2);
                    } else if (strtolower($utenti->cognome) == strtolower($params)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                        $risultati[] = DB::select($query2);
                    } else if (strtolower($unite) == strtolower($params) || strtolower($unite2) == strtolower($params)) {
                        $query2 = "SELECT * FROM users WHERE id = $utenti->id";

                        $risultati[] = DB::select($query2);
                    }
                }
            }
        }
        if(!empty($risultati))return $risultati;
    }
    
   }
 

