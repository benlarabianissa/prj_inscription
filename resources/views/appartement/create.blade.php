@extends('layout')
@section('content')

<h1>Ajouter un appartement</h1>

<div class="mb-3">
  <strong>stagiaire :</strong> {{ $stagiaire->nom }} (CIN: {{ $stagiaire->cin }})
</div>

<form method="POST" action="{{ route('appartement.store', $stagiaire) }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Adresse</label>
    <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
    @error('adresse') <div class="text-danger">{{ $message }}</div> @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Surface (m²)</label>
    <input type="number" step="0.01" name="surface" class="form-control" value="{{ old('surface') }}">
    @error('surface') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <button class="btn btn-success">Enregistrer</button>
  <a href="{{ route('stagiaire.show', $stagiaire) }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection