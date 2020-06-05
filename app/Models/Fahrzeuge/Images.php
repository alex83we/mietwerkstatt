<?php

namespace App\Models\Fahrzeuge;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'fahrzeuges_image';

    public function fahrzeuges_verkauf()
    {
        return $this->belongsTo(Verkauf::class);
    }
}
