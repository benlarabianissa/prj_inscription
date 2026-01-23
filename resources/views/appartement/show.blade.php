@extends('layout')

@section('content')
<h2>Détails de l'appartement</h2>
<div class="card">
    <div class="card-body">
        <p><strong>Adresse :</strong> {{ $a->adresse }}</p>
        <p><strong>Superficie :</strong> {{ $a->surface }}</p>
        <a href="{{ route('appartement.index',$stagiaire) }}" class="btn btn-secondary mt-3">⬅ Retour</a>
        </div>
</div>
@endsection
