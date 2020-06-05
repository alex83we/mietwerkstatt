<?php

namespace App\Models\Backend\Fahrzeuge;

use App\Models\Fahrzeuge\Ausstattung;
use App\Models\Fahrzeuge\Images;
use App\Models\Fahrzeuge\Kontakt;
use Illuminate\Database\Eloquent\Model;

class Verkauf extends Model
{
    protected $fillable = ['user_id', 'marke', 'modell', 'ez_maonat', 'ez', 'km', 'kraftstoff', 'kategorie', 'tueren', 'schiebetueren', 'sitzplaetze',
        'kw', 'ps', 'ccm', 'getriebe', 'allrad', 'schaltwippen', 'schadstoffklasse', 'umweltplakette', 'kraftstoff_komb', 'kraftstoff_innerorts', 'kraftstoff_ausserorts',
        'co2', 'partikelfilter', 'ssa', 'halter', 'fahrzeugart', 'besfahrzeug', 'unfallfahrzeug', 'fahrtauglich', 'nichtraucher', 'hu', 'scheckheft', 'garantie', 'beschreibung',
        'preis', 'preisx'];

    protected $table = 'fahrzeuges_verkauf';

    public function fahrzeuges_ausstattung()
    {
        return $this->hasMany(Ausstattung::class);
    }

    public function fahrzeuges_kontakt()
    {
        return $this->hasMany(Kontakt::class);
    }

    public function fahrzeuges_image()
    {
        return $this->hasMany(Images::class);
    }
}
