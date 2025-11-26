<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'datenaissance',
        'adresse',
        // + tout autre champ que tu passes à create()/update()
    ];
}
