<?php

namespace App\Http\Controllers\Frontend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Fahrzeuge\Search;
use App\Models\Fahrzeuge\Verkauf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $fahrzeuges = Verkauf::with('fahrzeuges_ausstattung')->aktive(true)->latest()->get();

        $fahrzeuge = DB::table('fahrzeuges_verkauf')->where('aktiv', '=', 1)->select('marke')->distinct()->get();
        $kategorie = DB::table('fahrzeuges_verkauf')->where('aktiv', '=', 1)->select('kategorie')->distinct()->get();
        $fahrzeugart = DB::table('fahrzeuges_verkauf')->where('aktiv', '=', 1)->select('fahrzeugart')->distinct()->get();
        $getriebe = DB::table('fahrzeuges_verkauf')->where('aktiv', '=', 1)->select('getriebe')->distinct()->get();
        $kraftstoff = DB::table('fahrzeuges_verkauf')->where('aktiv', '=', 1)->select('kraftstoff')->distinct()->get();
        $aussenfarbe = DB::table('fahrzeuges_verkauf')->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id')->where('fahrzeuges_verkauf.aktiv', '=', 1)->select('aussenfarbe')->distinct()->get();
        $polsterung = DB::table('fahrzeuges_verkauf')->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id')->where('fahrzeuges_verkauf.aktiv', '=', 1)->select('innenmaterial')->distinct()->get();

        return view('suche.search', compact('fahrzeuge', $fahrzeuge, 'kategorie', $kategorie, 'fahrzeuges', $fahrzeuges, 'fahrzeugart', $fahrzeugart
            , 'getriebe', $getriebe, 'kraftstoff', $kraftstoff, 'aussenfarbe', $aussenfarbe, 'polsterung', $polsterung));
    }

    public function search(Request $request)
    {
//        dd($request->all());
        $marke = $request->marke;
        $modell = $request->modell;
        $kategorie = $request->kategorie;
        $zustand = $request->zustand;
        $getriebe = $request->getriebe;
        $kraftstoff = $request->kraftstoff;
        $aussenfarbe = $request->lackierung;
        $polsterung = $request->polsterung;
        $km_min = (int)$request->km_min;
        $km_max = (int)$request->km_max;
        $preis_min = (int)$request->preis_min;
        $preis_max = (int)$request->preis_max;
        $ez_min = (int)$request->erstzulassung_min;
        $ez_max = (int)$request->erstzulassung_max;
        $kw_min = (int)$request->leistung_min;
        $kw_max = (int)$request->leistung_max;

        $output = '';

        if ($kategorie !== "" && $modell !== "" && $marke !== "" && $zustand !== "" && ($preis_min != "" || $preis_max != "")
            && ($km_min != "" || $km_max != "") && $getriebe !== "" && $kraftstoff !== "" && ($ez_min != "" || $ez_max != "")
            && ($kw_min != "" || $kw_max != "") && $aussenfarbe !== "" && $polsterung !== "") {
            $output .= '';
            $fahrzeuges = DB::table('fahrzeuges_verkauf')
                ->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id')
                ->join('fahrzeuges_kontakt', 'fahrzeuges_kontakt.verkauf_id', '=', 'fahrzeuges_verkauf.id')
                ->where('fahrzeuges_verkauf.aktiv', '=', 1)
                ->where('fahrzeuges_verkauf.kategorie', 'like', '%'.$kategorie.'%')
                ->where('fahrzeuges_verkauf.modell', 'like', '%'.$modell.'%')
                ->where('fahrzeuges_verkauf.marke', 'like', '%'.$marke.'%')
                ->where('fahrzeuges_verkauf.fahrzeugart', 'like', '%'.$zustand.'%')
                ->whereBetween('fahrzeuges_verkauf.preis', [$preis_min, $preis_max])
                ->whereBetween('fahrzeuges_verkauf.km', [$km_min, $km_max])
                ->where('fahrzeuges_verkauf.getriebe', 'like', '%'.$getriebe.'%')
                ->where('fahrzeuges_verkauf.kraftstoff', 'like', '%'.$kraftstoff.'%')
                ->whereBetween('fahrzeuges_verkauf.ez', [$ez_min, $ez_max])
                ->whereBetween('fahrzeuges_verkauf.kw', [$kw_min, $kw_max])
                ->where('fahrzeuges_ausstattung.aussenfarbe', 'like', '%'.$aussenfarbe.'%')
                ->where('fahrzeuges_ausstattung.innenmaterial', 'like', '%'.$polsterung.'%')
                ->orderBy('fahrzeuges_verkauf.created_at', 'desc')
                ->get();
        }/* else {
            $output .= '';
            $fahrzeuges = DB::table('fahrzeuges_verkauf')
                ->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id')
                ->join('fahrzeuges_kontakt', 'fahrzeuges_kontakt.verkauf_id', '=', 'fahrzeuges_verkauf.id')
                ->where('fahrzeuges_verkauf.aktiv', '=', 1)
                ->get();
        }*/

//        dd($fahrzeuges, $marke, $modell, $km_max);

        if (count($fahrzeuges) > 0) {
            $output .= '<div class="row"><div class="col-md-12 col-lg-12" style="font-size: 16px; font-weight: bold; color: #ff4600;">
                            '. $fahrzeuges->count(). ' Fahrzeuge entsprechen Ihren Suchkriterien' .'
                        <div style="border-bottom: 1px solid; margin-top: 0.5rem; margin-bottom: 0.5rem; color: #3E3F3A !important;"></div>
                        </div>';
            foreach ($fahrzeuges as $key => $fahrzeug) {
                $output .= '<div class="col-12 col-md-6 col-xl-4 mt-3 mb-3"><div class="card shadow">
                            <div class="fahrzeug-section-image" style="height: 320px;">
                                <img src="' . Storage::disk('public')->url('fahrzeuge/' . $fahrzeug->images) . '" class="card-img-top p-3 img-fluid active mx-auto d-block" alt="" style="width: 480px; height: 320px; object-fit: cover; object-position: center;">
                            </div>';
                $output .= '<div class="card-body pt-0">
                                <span class="preis">
                                    <span class="preis-value">';
                if ($fahrzeug->preisx == 'Festpreis') {
                    $output .= number_format($fahrzeug->preis, 2, ',', '.') . ' €';
                } else {
                    $output .= 'VB ' . number_format($fahrzeug->preis, 2, ',', '.') . ' €';
                }
                $output .= '</span></span>';
                if (Carbon::now()->isoFormat('DD.MM.YYYY') <= Carbon::parse($fahrzeug->created_at)->addDays(7)->isoFormat('DD.MM.YYYY')) {
                    $output .= '<span class="new">
                                <span class="new-value"> Neu </span>
                            </span>';
                }
                $output .= '<h5 class="card-title">';
                if ($fahrzeug->marke == true) {
                    $output .= $fahrzeug->marke . ' ' . $fahrzeug->modell . ',';
                }
                if ($fahrzeug->allrad == true) {
                    $output .= $fahrzeug->allrad . ',';
                }
                if ($fahrzeug->getriebe == true) {
                    $output .= $fahrzeug->getriebe . ',';
                }
                if ($fahrzeug->hu == true) {
                    $output .= 'HU.' . $fahrzeug->hu . ',';
                }
                if ($fahrzeug->kraftstoff == true) {
                    $output .= $fahrzeug->kraftstoff;
                }
                $output .= '</h5>
                            <div class="detail">
                                <div class="row">
                                    <div class="col">
                                        Erstzulassung:
                                    </div>
                                    <div class="col">
                                        '.$fahrzeug->ez_monat.'/'. $fahrzeug->ez .'
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Kilometerstand:
                                    </div>
                                    <div class="col">
                                         '. number_format($fahrzeug->km, '3', '.', ',').' km' .'
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Hubraum:
                                    </div>
                                    <div class="col">
                                        '. number_format($fahrzeug->ccm, '0', ',', '.').' ccm' .'
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Leistung:
                                    </div>
                                    <div class="col">
                                        '. $fahrzeug->kw.' kW ( '.$fahrzeug->ps. ' PS)' .'
                                    </div>
                                </div>';
                if($fahrzeug->getriebe == true) {
                    $output .= '<div class="row">
                                    <div class="col">
                                        Getriebe:
                                    </div>
                                    <div class="col">
                                        '. $fahrzeug->getriebe .'
                                    </div>
                                </div>';
                }
                if($fahrzeug->aussenfarbe == true) {
                    $output .= '<div class="row">
                                    <div class="col">
                                        Lakierung:
                                    </div>
                                    <div class="col">
                                        '. $fahrzeug->aussenfarbe .'
                                    </div>
                                </div>';
                }
                $output .= '<div class="row">
                                    <div class="col">
                                        Kraftstoff:
                                    </div>
                                    <div class="col">
                                        '. $fahrzeug->kraftstoff .'
                                    </div>
                                </div>
                            </div></div>
                            <div class="button_detail">
                                <a href="'. route('verkauf.show', $fahrzeug->id) .'">
                                    <div class="button_unten">
                                        Fahrzeug ansehen
                                    </div>
                                </a>
                            </div>';
                $output .= '</div></div>';
            }
            $output .= '</div>';
            return response($output);
        } else {
            $output = '<div class="col-12 mb-3"><div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center m-0">Leider können wir ihr Wunschfahrzeug nicht finden.</h5>
                            </div>
                       </div></div>';
            return response($output);
        }
    }

    public function getModell($marke)
    {
        if ($marke != '') {
            $modells = DB::table('fahrzeuges_verkauf')
                ->where('marke', '=', $marke)
                ->select('modell')
                ->distinct()
                ->get();
        }
        return response()->json($modells);
    }
}
