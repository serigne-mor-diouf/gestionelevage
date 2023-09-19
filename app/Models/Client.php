<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable  = [
        "id" ,
        "nom" ,
        "prenom",
        "adresse",
    ] ;


    public  function achats(){
        return $this->hasMany(Achat::class , 'client_id') ;
    }


    public function moutons(){
        return $this->belongsToMany(Mouton::class , 'achat_mouton' , 'client_id' , 'mouton_id' )
        ->withPivot('statutDemande', 'dateDemande');
    }
}
