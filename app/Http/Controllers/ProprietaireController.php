<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProprietaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $search = '' ;

    public function __construct(){
        $this->search = ''  ;
      
    }
    public function index(Request $request)
    {
        //
        $this->search = $request->input('search' , '');

    if (!empty($this->search)) {
        $proprietaires = Proprietaire::where('nom', 'like', '%' . $this->search . '%')
            ->orWhere('prenom', 'like', '%' . $this->search . '%')
            ->simplePaginate(2);
    } else {
        $proprietaires = Proprietaire::simplePaginate(2);
    }

    return view('proprietaires.index', compact('proprietaires'))->with('search', $this->search);
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('proprietaires.create' , compact('users')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validte = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone'=>'required',
            'user_id'=>'required',
        ]);

        $proprietaire  = new Proprietaire() ;
        $proprietaire->nom = $request->input('nom');
        $proprietaire->prenom = $request->input('prenom');
        $proprietaire->telephone = $request->input('telephone');
        $proprietaire->user_id= $request->input('user_id');

       $proprietaire->save();
        return redirect('/indexProprietaire')->with('success' , 'eleveur creer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $proprietaire = Proprietaire::find($id);
        return view('proprietaires.details' , compact('proprietaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $proprietaire = Proprietaire::findOrFail($id) ;
        return view('proprietaires.edit' , compact('proprietaire')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validte = $request->validate([
            'nom' =>'required',
            'prenom' =>'required',
            'telephone'=>'required'

        ]) ;
        $proprietaire = Proprietaire::findOrFail($id) ;
        $proprietaire->update($validte) ;

        return  redirect('/indexProprietaire')->with('success', 'eleveur a ete modifer avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $proprietaire = Proprietaire::findOrFail($id);
        $proprietaire->delete();
        return redirect('/indexProprietaire')->with('success', 'eleveur  à ete  supprimer avec succès');

    }

    public function accueil()
    {
        //
        return view('proprietaires.accueil') ;
    }


    public function contact()
    {
        //   
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Récupérer le téléphone à partir de la table Proprietaire
            $telephone = Proprietaire::where('user_id', $user->id)->value('telephone');

            // Récupérer l'email et le profil à partir de la table User
            $email = $user->email;
            $profil = $user->profil;

            // Passer les données à la vue
            return view('proprietaires.contact', compact('telephone', 'email', 'profil'));
        }

        // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
        return redirect()->route('login');
    
    }


    public function parametre()
    {
        //    
        return view('proprietaires.parametre');
    }
}
