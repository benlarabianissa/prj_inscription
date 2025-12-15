<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::orderBy('id','asc')->paginate(10);
        return view('stagiaire.index', compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stagiaire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'nom'=>['required','string','max:25'],
            'prenom'=>['required','string','max:25'],
            'datenaissance'=>['required','before:today'],
            'adresse'=>[]
        ]);
        Stagiaire::create($validated);
        return redirect()->route('stagiaire.create')->with('success','stagiaire créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        return view('stagiaire.show', compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaire.edit', compact('stagiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $data = $request->validate([
        'nom'            => 'required|string|max:255',
        'prenom'         => 'required|string|max:255',
        'datenaissance' => 'required|date',
        'adresse'        => 'nullable|string|max:255',
    ]);

    $stagiaire->update($data);

    return redirect()->route('stagiaire.index')
                     ->with('success', 'Stagiaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
         $stagiaire->delete();

    return redirect()
        ->route('stagiaire.index')
        ->with('success', 'Stagiaire supprimé avec succès.');
    }
}
