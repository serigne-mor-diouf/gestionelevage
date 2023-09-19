<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
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
         $this->search = $request->input('search' , '');
 
     if (!empty($this->search)) {
         $clients = Client::where('nom', 'like', '%' . $this->search . '%')
             ->orWhere('prenom', 'like', '%' . $this->search . '%')
             ->simplePaginate(2);
     } else {
         $clients = Client::simplePaginate(2);
     }
 
 
     return view('clients.index', compact('clients'))->with('search', $this->search);
         
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clients.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'nom' => 'required',
            'prenom' =>'required',
            'adresse' =>'required',
        ]);

        $client = new Client() ;
        $client->nom = $request->input('nom') ;
        $client->prenom = $request->input('prenom') ;
        $client->adresse = $request->input('adresse') ;
        $client->save() ;
        return redirect('/indexClient')->with('success', 'le cient a ajouter avec success ') ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $client = Client::findOrFail($id) ;
        return view('clients.edit' , compact('client')) ;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            'nom' => 'required',
            'prenom' =>'required',
            'adresse' =>'required',
        ]);

        $clients = Client::findOrFail($id) ;
        $clients->update($validate) ;
        return redirect('/indexClient')->with('success' , 'client mis en jour avec succes') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $client = Client::findOrfail($id);
        $client->delete() ;
        return redirect('/clientIndex')->with('success' , 'client supprimer avec succces') ;
    }

    public function accueil()
    {
        //
        return view('clients.accueil') ;
    }
}
