<?php

namespace App\Http\Controllers\Backend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Fahrzeuge\Verkauf;
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
            'title' => 'Codespecialist',
            'fahrzeuge' => $fahrzeuge,
            'ausstattung' => $ausstattung,
        ];

        $pdf = PDF::loadView('pdf', $data);
        return $pdf->stream($fahrzeuge->slug.'.pdf');
    }
}
