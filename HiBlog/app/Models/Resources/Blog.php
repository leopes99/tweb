<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'BlogId';
    protected $guarded = ['BlogId'];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'nome',
        'tema',
        'descrizione',
        'indirizzo',
        'descrizione',
        'immagine',
          
    ];
    
    
      
}
