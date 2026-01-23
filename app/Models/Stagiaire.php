<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Appartement;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'datenaissance',
        'adresse',
        // + tout autre champ que tu passes à create()/update()
    ];
    public function appartements():HasMany
    {
        return $this->hasMany(Appartement::class,'stg_id');
    }
}
