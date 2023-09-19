<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Client;
use App\Models\Mouton;
use App\Models\Payement;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clients = Client::all();
        $moutons = Mouton::all();
    
        return view('achats.create', compact('clients', 'moutons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
             //ceux qui ont au achats
            'client_id' =>'required',
            'mouton_id' =>'required',
            'montant' => 'required' ,
            'dateAchat' =>'required', 
            //ceux qui ont au payements
            // 'achat_id' =>'required',
            'montantPaye' =>'required',
            'statutPayement' => 'required' ,
            'datePayement' =>'required',   
             ]);

        $achat = new Achat();
        $achat->client_id = $request->input('client_id');
        $achat->mouton_id = $request->input('mouton_id');
        $achat->montant = $request->input('montant');
        $achat->dateAchat = $request->input('dateAchat');
        // Assignez d'autres attributs de l'achat
    
        $achat->save();
        $paiement = new Payement();
        $paiement->achat_id = $request->input('achat_id');
        $paiement->montantPaye = $request->input('montantPaye');
        $paiement->statutPayement = $request->input('statutPayement');
        $paiement->datePayement = $request->input('datePayement');
    // Assignez d'autres attributs du paiement

    // Associez le paiement à l'achat
        $achat->payements()->save($paiement);
        return redirect('/createAchat')->with('success', 'votre achat a ete effectuer avec success') ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $achat = Achat::findOrFail($id) ;
        return view('achats.details' , compact('achat')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $achat = Achat::find($id); // Récupérer l'enregistrement à modifier
        $clients = Client::all(); // Récupérer la liste des clients
        $moutons = Mouton::all(); // Récupérer la liste des moutons

        return view('achats.edit', compact('achat', 'clients', 'moutons'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validate = $request->validate([
        // Ajoutez ici vos règles de validation pour les champs d'achat et de paiement
    ]);

    // Récupérez l'achat existant
    $achat = Achat::findOrFail($id);
    $achat->client_id = $request->input('client_id');
    $achat->mouton_id = $request->input('mouton_id');
    $achat->montant = $request->input('montant');
    $achat->dateAchat = $request->input('dateAchat');
    // Mettez à jour d'autres champs ici pour l'achat

    $achat->save();

    // Récupérez les paiements existants pour cet achat depuis le modèle achat
    $paiementsExistant = $achat->payements;

    // Mettez à jour les paiements existants s'ils existent
    if ($paiementsExistant->isNotEmpty()) {
        $paiement = $paiementsExistant->first(); // Supposons qu'il n'y en ait qu'un
        $paiement->montantPaye = $request->input('montantPaye');
        $paiement->statutPayement = $request->input('statutPayement');
        $paiement->datePayement = $request->input('datePayement');
        // Mettez à jour d'autres champs ici pour le paiement existant

        $paiement->save();
    } else {
        // S'il n'y a pas de paiements existants, créez-en un nouveau
        $paiement = new Payement();
        $paiement->achat_id = $achat->id; // Associez-le à l'achat
        $paiement->montantPaye = $request->input('montantPaye');
        $paiement->statutPayement = $request->input('statutPayement');
        $paiement->datePayement = $request->input('datePayement');
        // Ajoutez d'autres champs ici pour le paiement

        $paiement->save();
    }

    return redirect('/indexAchat')->with('success', 'L\'achat et le paiement ont été mis à jour avec succès');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $payement = Achat::findOrFail($id) ;
        $payement->delete();
        return redirect('/indexAchat')->with('success' , 'votre achat a ete supprimer avec success') ;
    }
}
