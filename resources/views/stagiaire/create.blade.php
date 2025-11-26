@extends('layout')

@section('content')
<h1>Nouveau stagiaire</h1>
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
  </div>
@endif
@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('stagiaire.store') }}">
  @csrf

  <div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input
      type="text"
      id="nom"
      name="nom"
      class="form-control @error('nom') is-invalid @enderror"
      value="{{ old('nom') }}"
      placeholder="Ex. El Amrani">
    @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label for="prenom" class="form-label">Prénom</label>
    <input
      type="text"
      id="prenom"
      name="prenom"
      class="form-control @error('prenom') is-invalid @enderror"
      value="{{ old('prenom') }}"
      placeholder="Ex. Salma">
    @error('prenom') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label for="date_naissance" class="form-label">Date de naissance</label>
    <input
      type="date"
      id="date_naissance"
      name="datenaissance"
      class="form-control @error('datenaissance') is-invalid @enderror"
      value="{{ old('datenaissance') }}">
    @error('datenaissance') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label for="adresse" class="form-label">Adresse</label>
    <textarea
      id="adresse"
      name="adresse"
      rows="3"
      class="form-control @error('adresse') is-invalid @enderror"
      placeholder="N° rue, quartier, ville">{{ old('adresse') }}</textarea>
    @error('adresse') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <button class="btn btn-primary" type="submit">Créer</button>
  <a href="{{ route('stagiaire.index') }}" class="btn btn-light">Annuler</a>
</form>
@endsection

