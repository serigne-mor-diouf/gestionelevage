<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

   
    protected $fillable = [
        'id' ,
        'name',
        'email',
        'password',
        'prenom',
        'sexe',
        'age',
        'profil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

//     public function canToggleStatus()
// {
//     // Implémentez ici votre logique de vérification des autorisations.
//     // Par exemple, vérifiez le rôle ou les permissions de l'utilisateur actuel.
//     // Si l'utilisateur a la permission d'activer/désactiver le statut, renvoyez true, sinon false.
//     return Auth::user()->getAuthIdentifierName('toggle_status');
// }

public function isAdmin()
{
    return $this->profil === 'Administrateur'; // Vérifie si le profil de l'utilisateur est "Administrateur".
}


public function proprietaire()
{
    return $this->hasOne(Proprietaire::class);
} 
    

}
