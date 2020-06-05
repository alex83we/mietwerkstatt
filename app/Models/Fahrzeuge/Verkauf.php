<?php

namespace App\Models\Fahrzeuge;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Verkauf extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['user_id', 'marke', 'modell', 'ez_maonat', 'ez', 'km', 'kraftstoff', 'kategorie', 'tueren', 'schiebetueren', 'sitzplaetze',
        'kw', 'ps', 'ccm', 'getriebe', 'allrad', 'schaltwippen', 'schadstoffklasse', 'umweltplakette', 'kraftstoff_komb', 'kraftstoff_innerorts', 'kraftstoff_ausserorts',
        'co2', 'partikelfilter', 'ssa', 'halter', 'fahrzeugart', 'besfahrzeug', 'unfallfahrzeug', 'fahrtauglich', 'nichtraucher', 'hu', 'scheckheft', 'garantie', 'beschreibung',
        'preis', 'preisx'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Verkauf';

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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlugAttribute($value) {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }

        $this->attributes["slug"] = $slug;
    }

    public function incrementSlug($slug) {
        $original = $slug;
        $count = 1;
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-". $count++;
        }

        return $slug;
    }

    public function scopeAktive($query, $value)
    {
        return $query->where('aktiv', $value);
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }
}
