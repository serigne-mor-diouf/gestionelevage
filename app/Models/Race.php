<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    protected $fillable  = [
        "id" ,
        "nom" ,
        "description",
    ] ;

    public function moutons(){
        return $this->hasMany(Mouton::class, 'race_id') ;
    }
}
