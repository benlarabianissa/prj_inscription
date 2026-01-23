<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Stagiaire;

class Appartement extends Model
{
    /** @use HasFactory<\Database\Factories\AppartementFactory> */
    use HasFactory;
    protected $fillable = ['adresse','surface','stg_id'];
    
    public function stagiaire():BelongsTo
    {
        return $this->belongsTo(Stagiaire::class,'stg_id');
    }
}
