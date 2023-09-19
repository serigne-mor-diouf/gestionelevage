<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouton extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom',
        'photo',
        'nomMere',
        'nomgrandMereMaternelle' ,
        'nomArrieregrandMereMaternelle' ,
        'age',
        'description',
         'proprietaire_id',
        'race_id'
    ];
    public function proprietaire() {
        return $this->belongsTo(Proprietaire::class, 'proprietaire_id');
    }

    public function race() {
        return $this->belongsTo(Race::class, 'race_id');
    }

    public function achats(){
        return $this->hasMany(Achat::class , 'mouton_id') ;
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'achat_mouton', 'mouton_id', 'client_id')
            ->withPivot('statutDemande', 'dateDemande'); 
    }
}
