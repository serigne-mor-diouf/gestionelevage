<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class RegisterController extends Controller
{
    use  RegistersUsers ; 

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/inscrire';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:0'],
            'sexe' => ['required', 'in:homme,femme'],
            'profil' => ['required', 'in:Proprietaire,Client'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'statut' => ['required', 'integer', 'in:1,0'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'age' => $data['age'],
            'sexe' => $data['sexe'],
            'profil' => $data['profil'],
           // 'statut' =>$data['statut'] ,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        return redirect('/inscrire')->with('success', 'Inscription réussie !');
    }

    
    public function showRegistrationForm()
    {
        return view('auth.register'); // Remplacez 'auth.register' par le chemin de la vue que vous avez créée pour le formulaire d'inscription
    }
}
