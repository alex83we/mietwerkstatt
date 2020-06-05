<?php

namespace App\Http\Controllers\Backend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Backend\Fahrzeuge\Verkauf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class AktiveUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // Switch Verkauft oder nicht Verkauft
    public function aktivupdate(Request $request, Verkauf $verkauf)
    {
//        dd($request->all());
        if ($request->aktiv == 0) {
            $verkauf = DB::table('fahrzeuges_verkauf')->where('id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);
            $ausstattung = DB::table('fahrzeuges_ausstattung')->where('verkauf_id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);
            $kontakt = DB::table('fahrzeuges_kontakt')->where('verkauf_id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);
            $images = DB::table('fahrzeuges_image')->where('verkauf_id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);

            Toastr::warning('Fahrzeug wurde Verkauft', 'Verkauft');
        } elseif ($request->aktiv == 1) {
            $verkauf = DB::table('fahrzeuges_verkauf')->where('id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);
            $ausstattung = DB::table('fahrzeuges_ausstattung')->where('verkauf_id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);
            $kontakt = DB::table('fahrzeuges_kontakt')->where('verkauf_id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);
            $images = DB::table('fahrzeuges_image')->where('verkauf_id', $request->input('id'))->update(['aktiv' => $request->aktiv, 'updated_at' => now()]);

            Toastr::info('Fahrzeug wurde wieder Aktiviert', 'Aktiv');
        }

        return redirect('/backend/verkauf');
    }
}
