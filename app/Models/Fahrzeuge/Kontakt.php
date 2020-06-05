<?php

namespace App\Models\Fahrzeuge;

use Illuminate\Database\Eloquent\Model;

class Kontakt extends Model
{
    protected $table = 'fahrzeuges_kontakt';

    public function fahrzeuges_verkauf()
    {
        return $this->belongsTo(Verkauf::class);
    }
}
