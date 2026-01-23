<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Appartement;

class AppartementController extends Controller
{
    public function index(Stagiaire $stagiaire)
    {
        $appartements = $stagiaire->appartements()->orderBy('id','desc')->paginate(10);
        return view('appartement.index',compact('stagiaire','appartements'));
    }
    public function create(Stagiaire $stagiaire)
    {
        return view('appartement.create', compact('stagiaire'));
    }
    public function store(Request $request,Stagiaire $stagiaire)
    {
        $appart = $request->validate([
            'adresse'=>'string|required',
            'surface'=>'integer|min:60|max:150'
        ]);
        $stagiaire->appartements()->create($appart);
        return redirect()->route('stagiaire.show',$stagiaire)->with('success','appartement créé avec succès');
    }
    public function destroy(Stagiaire $stagiaire,Appartement $a)
    {
        $a->delete();
        return redirect()->route('appartement.index',$stagiaire)->with('success','appart supprimé!');
    }
    public function edit(Stagiaire $stagiaire,Appartement $a)
    {
        return view('appartement.edit',compact('stagiaire','a'));
    }
    public function show(Stagiaire $stagiaire, Appartement $a)
    {
        return view('appartement.show',compact('stagiaire','a'));
    }
    public function update(Request $request,Stagiaire $stagiaire,Appartement $a)
    {
        $data = $request->validate([
            'adresse'=>'string|required',
            'surface'=>'integer|min:60|max:150'
        ]);
        $a->update($data);
        return redirect()->route('appartement.index',$stagiaire)->with('success','modification ok');
    }
}
