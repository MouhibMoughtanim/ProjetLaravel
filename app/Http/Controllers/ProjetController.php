<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use  App\Models\Projet;

use Illuminate\Support\Facades\Auth;



class ProjetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createview(){
        return view('projets.create');
    }
    
    public function projetview()
    {    $projets=Projet::where('professeur_id',Auth::user()->id)->get();
        return view('projets.lesprojetsview',['lesProjets' => $projets]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projet=new Projet();

        $projet->professeur_id=Auth::user()->id;
        $projet->nom=$request->input('nom');
        $projet->description=$request->input('description');
        $projet->save();
        return redirect('/project/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Professeurs $professeur)
    {
        return view('show',compact('professeur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professeurs=Professeurs::find($id);
        return view('edit',compact('professeurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $professeurs=Professeurs::find($id);

        $professeurs->nom=$request->input('nom');
        $professeurs->prenom=$request->input('prenom');
        $professeurs->email=$request->input('email');
        $professeurs->cin=$request->input('cin');

        if($request->hasFile('image')){
            $professeurs->image=$request->image->store('image');

        }

        $professeurs->telephone=$request->input('telephone');
        $professeurs->date_recrutement=$request->input('date_recrutement');
        $professeurs->date_naissance=$request->input('date_naissance');
        $professeurs->specialite=$request->input('specialite');
        $professeurs->appartenant_a_ENSAJ=$request->input('appartenant_a_ENSAJ');
        
        if($request->hasFile('Dossier_scientifique')){
            $professeurs->Dossier_scientifique=$request->Dossier_scientifique->store('Dossier_scientifique');

        }
        if($request->hasFile('Dossier_Pedagogique')){
            $professeurs->Dossier_Pedagogique=$request->Dossier_Pedagogique->store('Dossier_Pedagogique');

        }
        if($request->hasFile('Dossier_administratif')){
            $professeurs->Dossier_administratif=$request->Dossier_administratif->store('Dossier_administratif');

        }

        
       
        
        $professeurs->save();
        return redirect('/professeurs'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $professeurs=Professeurs::find($id);
        $professeurs->delete();
        return redirect('/professeurs'); 
    }
}
