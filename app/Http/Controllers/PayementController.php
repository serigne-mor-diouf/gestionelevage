<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Payement;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;

class PayementController extends Controller
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
        $payements = Payement::where('nom', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%')
            ->simplePaginate(2);
    } else {
        $payements = Payement::simplePaginate(2);
    }

    return view('payements.index', compact('payements'))->with('search', $this->search);
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      
        
        $achats =  Achat::all();   
       // dd(achats);
        return view('payements.create' , compact('achats')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'achat_id' =>'required',
            'montantPaye' =>'required',
            'statutPayement' => 'required' ,
            'datePayement' =>'required',   
             ]);

             $payement = new Payement();
             $payement->achat_id = $request->input("achat_id");
             $payement->montantPaye = $request->input("montantPaye");
             $payement->statutPayement = $request->input("statutPayement");
             $payement->datePayement = $request->input("datePayement");

             $payement->save();
             return redirect('/indexPayement')->with('success', 'votre payement a ete effectuer avec success') ;
            
            }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $payement = Payement::findOrfail($id);
        return view('payements.details' , compact('payement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $payement = Payement::findOrFail($id);
        $achats = Achat::all();
        return view('payements.edit', compact('payement' , 'achats')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            'achat_id' =>'required',
            'montantPaye' =>'required',
            'statutPayement' => 'required' ,
            'datePayement' =>'required', 
        ]);
        $payement = Payement::findOrFail($id) ;
        $payement->update($validate);
        return redirect('/indexPayement')->with('success' , 'votre payement a ete mis en jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $payement = Payement::findOrFail($id) ;
        $payement->delete();
        return redirect('/indexPayement')->with('success' ,'votre payement a ete  supprimer avec succes') ;
    }
}
