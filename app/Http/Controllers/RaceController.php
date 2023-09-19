<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
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
        $races = Race::where('nom', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%')
            ->simplePaginate(2);
    } else {
        $races = Race::simplePaginate(2);
    }

    return view('races.index', compact('races'))->with('search', $this->search);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('races.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            "nom" => "required" ,
            "description" =>"required",
        ]);
        $race = new Race() ;
        $race->nom = $request->input("nom");
        $race->description = $request->input("description");

        $race->save();
        return redirect('/createRace')->with('success' , 'la race a ete enregistrer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $race  = Race::findOrFail($id) ;
        return view('races.details' , compact("race")) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $race = Race::findOrFail($id) ;
        return view('races.edit' , compact('race')) ;
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            "nom" => "required" ,
            "description" =>"required",
        ]);
        $race = Race::findOrfail($id) ;
        $race->update($validate);
        return redirect('/indexRace')->with('success' , 'la race a ete modifier avec succes') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $race = Race::findOrFail($id) ;
        $race->delete();
        return redirect('/indexRace')->with('success', 'race  à ete  supprimer avec succès');

    }
}
