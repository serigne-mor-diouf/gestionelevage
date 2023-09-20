<?php

namespace App\Http\Controllers;

use App\Models\Mouton;
use App\Models\Proprietaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $search = '' ;
    

    public function __construct()
    {
        $this->search = '' ;
    }



    public function index(Request $request)
    {
        //
        $user = auth()->user();
       // $moutons = $user->proprietaire->moutons;
        $this->search = $request->input('search' , '');

    if (!empty($this->search)) {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('prenom', 'like', '%' . $this->search . '%')
            ->simplePaginate(3);
    } else {
        $users = User::simplePaginate(3);
    }


    return view('admin.index', compact('users'))->with('search', $this->search);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create') ;
    }


    //recuperer les mouton poster par un proprietaire apres avoir hauthentifcation

    public function userList(Request $request)
    {   
        $user = auth()->user();
    
        // Vérifiez si l'utilisateur est un propriétaire de moutons
        if ($user->proprietaire) {
            $proprietaireId = $user->proprietaire->id;
    
            // Utilisez une requête Eloquent pour récupérer les moutons paginés du propriétaire
            $moutons = Mouton::where('proprietaire_id', $proprietaireId)->paginate(3);
    
            return view('moutons.index', compact('moutons'))->with('search', $this->search);
        } else {
            // Gérez le cas où l'utilisateur n'est pas un propriétaire de moutons
            return redirect()->route('/')->with('error', 'Vous n\'avez pas de moutons');
        }
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validte = $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'sexe'=>'sexe' ,
            'email'=>'email' ,
            'profil'=>'required' ,
            'password'=>'required' ,
        ]);

        $user  = new User() ;
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->age = $request->input('age');
        $user->sexe = $request->input('sexe');
        $user->email = $request->input('email');
        $user->profil = $request->input('profil');
        $user->password = $request->input('password');

       $user->save();
        return redirect('/inscrire')->with('success' , 'votre inscription a ete effectue avec succes');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('proprietaires.details' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
            $user = User::find($id) ;
            return view('admin.edit' , compact('user') ) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validte = $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'sexe'=>'required' ,
            'email'=>'required' ,
            'profil'=>'required' ,
            'password'=>'required' ,
        ]);

        $user  =  User::find($id );
       $user->update($validte);
        return redirect('/indexUser')->with('success' , 'votre compte a ete modifier avec succes');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users = User::findOrFail($id) ;
        $users->delete();
        return redirect('/indexUser')->with('success' , 'l\'utilisateur a ete supprimer  avec success') ;
       
    }

    // Assurez-vous d'importer la classe Mouton
    public function mesMoutons()
    {
        // Obtenez l'utilisateur connecté
        $user = auth()->user();
    
        // Utilisez la relation pour récupérer les moutons du propriétaire connecté
        $moutons = $user->proprietaire->moutons;
    
        return view('proprietaires.accueil', compact('moutons'));
    }
    
    public function toggleStatut($userId)
    {
        $user = User::find($userId);
    
        if (!$user) {
            // Gérez le cas où l'utilisateur n'est pas trouvé.
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
    
        // changer le statut de l'utilisateur.
        $user->statut = $user->statut == '1' ? '0' : '1';
        $user->save();
    
        // Affichez un message différent en fonction du nouveau statut.
        if ($user->statut == '1') {
            return redirect()->back()->with('success', 'Votre compte a été debloqué! pouvez connecter avec ');
        } else {
            return redirect()->back()->with('error', 'Votre compte a été bloqué ! Veuillez contacter votre administrateur.');
        }
    }  
}
