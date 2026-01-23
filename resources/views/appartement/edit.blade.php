@extends('layout')
@section('content')
<h2>Modifier l'appartement</h2>

<form action="{{ route('appartement.update', [$stagiaire,$a]) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="{{ old('adresse', $a->adresse) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">surface</label>
        <input type="text" class="form-control" name="surface" value="{{ old('surface', $a->surface) }}">
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('appartement.index',$stagiaire) }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
