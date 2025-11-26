@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Stagiaires</h1>
  <a href="{{ route('stagiaire.create') }}" class="btn btn-primary">Nouveau</a>
</div>

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>#</th><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Adresse</th><th></th>
    </tr>
  </thead>
  <tbody>
    @forelse($stagiaires as $s)
      <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->nom }}</td>
        <td>{{ $s->prenom }}</td>
        <td>{{ $s->datenaissance }}</td>
        <td>{{ $s->adresse}}</td>
        <td class="text-end">
          <a class="btn btn-sm btn-outline-secondary" href="{{ route('stagiaire.show',$s) }}">Voir</a>
          <a class="btn btn-sm btn-secondary" href="{{ route('stagiaire.edit',$s) }}">Éditer</a>
          <form action="{{ route('stagiaire.destroy',$s) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="text-center text-muted">Aucun stagiaire pour le moment.</td></tr>
    @endforelse
  </tbody>
</table>

{{ $stagiaires->links() }}
@endsection

