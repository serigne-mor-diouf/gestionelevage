<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'mouton_id',
        'montant' ,
        'dateAchat' 	
    ] ;
   
    public $timestamps = false;


    public function clent(){
     return $this->belongsTo(Client::class , 'client_id') ;
    }
    
    public function mouton(){
        return $this->belongsTo(Mouton::class , 'mouton_id') ;
       } 

       public function payements(){
        return $this->hasMany(Payement::class, 'achat_id');
       }
}
