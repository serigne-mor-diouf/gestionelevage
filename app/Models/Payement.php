<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'achat_id' ,
        'montantPaye' ,
        'statutPayement',
        'datePayement' ,
    ];
    
    public function achat(){
        return $this->belongsTo(Achat::class , 'achat_id') ;
    }
}
