<?php

namespace App\Models\Fahrzeuge;

use Illuminate\Database\Eloquent\Model;

class Ausstattung extends Model
{
    protected $table = 'fahrzeuges_ausstattung';

    public function fahrzeuges_verkauf()
    {
        return $this->belongsTo(Verkauf::class);
    }
}
