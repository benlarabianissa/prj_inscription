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
          <form id="delete-form-{{ $s->id }}" action="{{ route('stagiaire.destroy',$s) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
          </form>
          <button class="btn btn-sm btn-danger" onclick="deleteStagiaire({{$s->id }})">Supprimer</button>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="text-center text-muted">Aucun stagiaire pour le moment.</td></tr>
    @endforelse
  </tbody>
</table>

{{ $stagiaires->links() }}
<script>
function deleteStagiaire(id) {
    Swal.fire({
        title: "Supprimer ce stagiaire ?",
        text: "Cette action est irréversible.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Oui, supprimer",
        cancelButtonText: "Annuler"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}
</script>
@endsection

