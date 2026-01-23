@extends('layout')

@section('content')
<h2>Détails du stagiaire</h2>

<div class="card">
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $stagiaire->nom }}</p>
        <p><strong>Prénom :</strong> {{ $stagiaire->prenom }}</p>
        <p><strong>Date de naissance :</strong> {{ $stagiaire->date_naissance }}</p>
        <p><strong>Adresse :</strong> {{ $stagiaire->adresse }}</p>

        <a href="{{ route('stagiaire.index') }}" class="btn btn-secondary mt-3">⬅ Retour</a>
        <a class="btn btn-primary" href="{{ route('appartement.create', $stagiaire) }}">
        Ajouter un appartement</a>
        <a href="{{ route('appartement.index', $stagiaire) }}" class="btn btn-outline-primary btn-sm">
        Appartements
        </a>


    </div>
</div>
@endsection
