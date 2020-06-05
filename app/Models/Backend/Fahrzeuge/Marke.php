<?php

namespace App\Models\Backend\Fahrzeuge;

use Illuminate\Database\Eloquent\Model;

class Marke extends Model
{
    protected $table = 'items_marke';

    protected $fillable = ['marke'];

    public function items_modell()
    {
        return $this->hasMany(Modell::class);
    }
}
