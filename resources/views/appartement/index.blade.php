@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h1>Appartements</h1>
    <div class="text-muted">
      Personne : <strong>{{ $stagiaire->nom }}</strong> (CIN: {{ $stagiaire->cin }})
    </div>
  </div>

  <a href="{{ route('appartement.create', $stagiaire) }}" class="btn btn-primary">
    Ajouter
  </a>
</div>
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>#</th>
      <th>Adresse</th>
      <th>Surface</th>
      <th class="text-end">Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($appartements as $a)
      <tr>
        <td>{{ $a->id }}</td>
        <td>{{ $a->adresse }}</td>
        <td>{{ $a->surface ?? '-' }}</td>
        <td class="text-end">

          {{-- Exemple actions (à adapter à tes routes) --}}
          <a class="btn btn-sm btn-outline-secondary" href="{{ route('appartement.show', [$stagiaire, $a]) }}">Voir</a>
          <a class="btn btn-sm btn-outline-secondary" href="{{ route('appartement.edit', [$stagiaire, $a]) }}">Editer</a>
          <form action="{{route('appartement.destroy',[$stagiaire,$a])}}" method="POST">
            @csrf
            @method('delete')
          <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="text-center text-muted">Aucun appartement pour cette personne.</td>
      </tr>
    @endforelse
  </tbody>
</table>

{{ $appartements->links() }}

<a href="{{ route('stagiaire.index') }}" class="btn btn-link">← Retour stagiaire</a>
@endsection
