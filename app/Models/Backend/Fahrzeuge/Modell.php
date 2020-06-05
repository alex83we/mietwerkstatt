<?php

namespace App\Models\Backend\Fahrzeuge;

use Illuminate\Database\Eloquent\Model;

class Modell extends Model
{
    protected $table = 'items_modell';

    protected $fillable = ['modell'];

    public function items_marke()
    {
        return $this->belongsTo(Marke::class);
    }
}
