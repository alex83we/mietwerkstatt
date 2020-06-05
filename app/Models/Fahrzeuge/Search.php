<?php

namespace App\Models\Fahrzeuge;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Search extends Model
{
    public $table = 'fahrzeuges_verkauf';

    public function getKategorie(Request $request)
    {
        $kategorie = DB::table($this->table)->where('kategorie', '=', $request->kategorie)
            ->select('kategorie')
            ->distinct('kategorie')
            ->get();
    }
}
