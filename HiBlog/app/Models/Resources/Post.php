<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Blog extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'PostId';
    protected $guarded = ['PostId'];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'id_blog',
        'contenuto_post',
        
          
    ];
    
    //relazione one to many inversa, da un post devo poter risalire a chi l' ha creato
    public function utente(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }  
    
}
