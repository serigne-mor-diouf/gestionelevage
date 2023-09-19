<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    use HasFactory;


    protected $fillable =[
        'nom',
        'prenom',
        'adresse',
        'telephone',
    ];
    public  function moutons(){
        return $this->hasMany(Mouton::class, 'proprietaire_id') ;
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
