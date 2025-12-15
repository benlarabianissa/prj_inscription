@extends('layout')
@section('content')
<h2>Modifier le stagiaire</h2>

<form action="{{ route('stagiaire.update', $stagiaire->id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="{{ old('nom', $stagiaire->nom) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" value="{{ old('prenom', $stagiaire->prenom) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Date de naissance</label>
        <input type="date" class="form-control" name="datenaissance" value="{{ old('datenaissance', $stagiaire->datenaissance) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="{{ old('adresse', $stagiaire->adresse) }}">
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('stagiaire.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
