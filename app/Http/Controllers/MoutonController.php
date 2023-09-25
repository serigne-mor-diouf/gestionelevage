<?php

namespace App\Http\Controllers;

use App\Models\Mouton;
use App\Models\Proprietaire;

use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MoutonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $search = '' ;
    

    public function index(Request $request)
    {
      

        $search = $request->input('search', '');
    
        if (!empty($search)) {
            $moutons = Mouton::where('nom', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->simplePaginate(3);
        } else {
            $moutons = Mouton::simplePaginate(3);
        }
    
        return view('moutons.index', ['moutons' => $moutons, 'search' => $search]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $proprietaires =  Proprietaire::all();
        $races         =  Race::all();
       // dd($races);
        return view('moutons.create' , compact('proprietaires' , 'races')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valide = $request->validate([
            'nom' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Utiliser 'image' au lieu de 'photo'
            'nomMere' => 'required',
            'nomgrandMereMaternelle' => 'required',
            'nomArrieregrandMereMaternelle' => 'required',
            'age' => 'required' ,
            'description' =>'required' ,
            'proprietaire_id' => 'required',
            'race_id' => 'required',

        ]);
              
        
        if ($request->hasFile('photo')) {
        $imageName = $request->file('photo')->store('MYPHOTO');
        $imageTempName = $request->file('photo')->getPathname();
        $imageName = $request->file('photo')->getClientOriginalName();
        $path = base_path() . '/public/MYPHOTO/';
        $request->file('photo')->move($path , $imageName);
        DB::table('moutons')
            ->where('photo', $imageTempName);
           }
           else{
            return redirect('/create')->with('error',  'Aucun fichier n\'a été sélectionné');
           }
    
        $mouton = new Mouton();
        $mouton->nom = $request->input('nom');
        $mouton->photo = $imageName; 
         // Utiliser la valeur validée de la photo
        $mouton->nomMere = $request->input('nomMere');
        $mouton->nomgrandMereMaternelle = $request->input('nomgrandMereMaternelle');
        $mouton->nomArrieregrandMereMaternelle = $request->input('nomArrieregrandMereMaternelle');
        $mouton->age = $request->input('age');
        $mouton->description = $request->input('description');
        $mouton->proprietaire_id = $request->input('proprietaire_id');
        $mouton->race_id = $request->input('race_id');
    
        $mouton->save();
        return redirect('/index')->with('success', 'Mouton ajouté avec succès');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //afficher les details du mouton ainsi que que le proprreitaire
        $mouton = Mouton::findOrfail($id);
        return view('moutons.details' , compact('mouton'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $mouton = Mouton::findOrFail($id);
        $proprietaires = Proprietaire::all();
        $races = Race::all();
        return view('moutons.edit' , compact('mouton', 'proprietaires' , 'races'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Photo facultative
            'nomMere' => 'required',
            'nomgrandMereMaternelle' => 'required',
            'nomArrieregrandMereMaternelle' => 'required',
            'proprietaire_id' => 'required',
            'race_id' => 'required',
        ]);
    
        // Trouver le mouton à mettre à jour
        $mouton = Mouton::findOrFail($id);
    
        // Vérifier si une nouvelle photo a été téléchargée
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if (file_exists(storage_path('app/public/' . $mouton->photo))) {
                unlink(storage_path('app/public/' . $mouton->photo));
            }
    
            // Stocker la nouvelle photo avec un nom personnalisé
            $photoPath = $request->file('photo')->storeAs('public/MYPHOTO', $request->file('photo')->getClientOriginalName());
            $mouton->photo = str_replace('public/', '', $photoPath); // Stocker le chemin relatif
        }
    
        // Mettre à jour les données du mouton
        $mouton->update($validatedData);
    
        return redirect('/index')->with('success', 'Mouton mis à jour avec succès');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //supprimmer un mouton
        $mouton = Mouton::findOrFail($id);
        $mouton->delete();
        return redirect('/index')->with('success', 'Mouton  à ete  supprimer avec succès');
    }

    public function accueil(){
        return view('accueils.accueil') ;
    }
    

    public function indexlistclient(Request $request){
        
        $search = $request->input('search', '');
    
        if (!empty($search)) {
            $moutons = Mouton::where('nom', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->simplePaginate(3);
        } else {
            $moutons = Mouton::simplePaginate(3);
        }
        return view('moutons.indexlist', ['moutons' => $moutons, 'search' => $search]) ;
    }

}
