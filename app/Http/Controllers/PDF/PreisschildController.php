<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\Fahrzeuge\Verkauf;
use Illuminate\Http\Request;
use PDF;

class PreisschildController extends Controller
{
    /*public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }*/

    public function preisschild($id)
    {
        $fahrzeuge = Verkauf::find($id);
        foreach ($fahrzeuge->fahrzeuges_ausstattung as $ausstattungen) {
            $ausstattung = $ausstattungen;
        }

        $data = [
            'fahrzeuge' => $fahrzeuge,
            'ausstattung' => $ausstattung,
        ];

        $pdf = PDF::loadView('pdf/preisschild', $data);
        return $pdf->stream($fahrzeuge->slug.'.pdf');
    }
}
