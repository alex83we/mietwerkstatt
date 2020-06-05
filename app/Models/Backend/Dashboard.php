<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    public function fahrzeugcount()
    {
        $fahrzeugcount = DB::table('fahrzeuges_verkauf')
            ->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id')
            ->join('fahrzeuges_kontakt', 'fahrzeuges_kontakt.verkauf_id', '=', 'fahrzeuges_verkauf.id')
            ->where('fahrzeuges_verkauf.user_id', '=', Auth::user()->id)
            ->count();

        return $fahrzeugcount;
    }

    public function anfragen()
    {
        $anfragen = DB::table('fahrzeug_anfrages')->where('user_id', '=', Auth::user()->id)->count();

        return $anfragen;
    }

    public function fahrzeuge()
    {
        $fahrzeuge = DB::table('fahrzeuges_verkauf')
            ->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id')
            ->join('fahrzeuges_kontakt', 'fahrzeuges_kontakt.verkauf_id', '=', 'fahrzeuges_verkauf.id')
            ->orderBy('fahrzeuges_verkauf.created_at', 'DESC')
            ->where('fahrzeuges_verkauf.user_id', '=', Auth::user()->id)
            ->take(5)
            ->get();

        return $fahrzeuge;
    }
}
