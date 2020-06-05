<?php

namespace App\Http\Controllers\Backend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Backend\Fahrzeuge\Aussenfarbe;
use App\Models\Backend\Fahrzeuge\Getriebe;
use App\Models\Backend\Fahrzeuge\Innenfarbe;
use App\Models\Backend\Fahrzeuge\Innenmaterial;
use App\Models\Backend\Fahrzeuge\Kategorie;
use App\Models\Backend\Fahrzeuge\Kraftstoff;
use App\Models\Backend\Fahrzeuge\Schadstoffklasse;
use App\Models\Backend\Fahrzeuge\Umweltplakette;
use App\Models\Backend\Fahrzeuge\Verkauf;
use App\Models\Fahrzeuge\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yoeunes\Toastr\Facades\Toastr;

class VerkaufController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verkauf = DB::table('fahrzeuges_verkauf')
                    ->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id' )
                    ->join('fahrzeuges_kontakt', 'fahrzeuges_kontakt.verkauf_id', '=', 'fahrzeuges_verkauf.id' )
                    ->orderBy('fahrzeuges_verkauf.aktiv', 'DESC')
                    ->get();

        return view('backend.verkauf.index', compact('verkauf', $verkauf));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Fahrzeuge\Verkauf  $verkauf
     * @return \Illuminate\Http\Response
     */
    public function edit(Verkauf $verkauf)
    {
        $marke = DB::table('items_marke')->orderBy('marke')->get();
        $marken = DB::table('items_marke')->where('marke', '=', $verkauf->marke)->orderBy('marke')->get();
        $modell = DB::table('items_modell')
            ->join('items_marke', 'items_marke.id', '=', 'items_modell.marke_id')
            ->orderBy('modell')
            ->where('items_marke.marke', '=', $verkauf->marke)
            ->get();
        $kraftstoff = Kraftstoff::all();
        $kategorie = Kategorie::all();
        $getriebe = Getriebe::all();
        $schadstoffklasse = Schadstoffklasse::all();
        $umweltplakette = Umweltplakette::all();
        $farbe = Aussenfarbe::all();
        $farbeInnen = Innenfarbe::all();
        $materialInnen = Innenmaterial::all();

        return view('backend.verkauf.edit', compact('verkauf', $verkauf, 'marke', $marke, 'marken', 'modell', $modell, 'kraftstoff', $kraftstoff, 'kategorie', $kategorie,
            'getriebe', $getriebe, 'schadstoffklasse', $schadstoffklasse, 'umweltplakette', $umweltplakette, 'farbe', $farbe, 'farbeInnen', $farbeInnen, 'materialInnen', $materialInnen));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Fahrzeuge\Verkauf  $verkauf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verkauf $verkauf)
    {
        if ($request->firma == true) { $firma = $request->firma; } else { $firma = 0; }
        if ($request->kraftstoff == 'Andere') { $kraftstoff = $request->kraftstoffAndere; } else { $kraftstoff = $request->kraftstoff; }
        if ($request->kraftstoff == 'andere') { $aussenfarbe = $request->aussenfarbeAndere; } else { $aussenfarbe = $request->aussenfarbe; }
        if ($request->innenfarbe == 'andere') { $innenfarbe = $request->innenfarbeAndere; } else { $innenfarbe = $request->innenfarbe; }
        if ($request->innenmaterial == 'andere') { $innenmaterial = $request->innenmaterialAndere; } else { $innenmaterial = $request->innenmaterial; }
        if ($request->huAendern == true) { $hu = $request->huAendern; } elseif ($request->huneu == true) { $hu = $request->huneu; } elseif ($request->huabgelaufen == true) { $hu = $request->huabgelaufen; } else { $hu = $request->hu; }
        $kw = $request->kw;
        $ps = $kw * 1.35962;

        $verkauf->marke = $request->marke;
        $verkauf->modell = $request->modell;
        $verkauf->ez_monat = $request->ez_monat;
        $verkauf->ez = $request->ez;
        $verkauf->km = $request->km;
        $verkauf->kraftstoff = $kraftstoff;
        $verkauf->kategorie = $request->kategorie;
        $verkauf->tueren = $request->tueren;
        $verkauf->scheibetueren = $request->scheibetueren;
        $verkauf->sitzplaetze = $request->sitzplaetze;
        // Antrieb & Umwelt
        $verkauf->kw = $kw;
        $verkauf->ps = (int)round($ps);
        $verkauf->ccm = $request->ccm;
        $verkauf->getriebe = $request->getriebe;
        $verkauf->allrad = $request->allradantrieb;
        $verkauf->schaltwippen = $request->schaltwippen;
        // Umwelt & Verbrauch
        $verkauf->schadstoffklasse = $request->schadstoffklasse;
        $verkauf->umweltplakette = $request->umweltplakette;
        $verkauf->kraftstoff_komb = $request->kraftstoffverbrauch_komb;
        $verkauf->kraftstoff_innerorts = $request->kraftstoffverbrauch_innerorts;
        $verkauf->kraftstoff_ausserorts = $request->kraftstoffverbrauch_ausserorts;
        $verkauf->co2 = $request->co₂emissionen;
        $verkauf->partikelfilter = $request->partikelfilter;
        $verkauf->ssa = $request->ssa;
        // Fahrzeughistory
        $verkauf->halter = $request->fahrzeughalter;
        $verkauf->fahrzeugart = $request->fahrzeugart;
        $verkauf->besfahrzeug = $request->besfahrzeug;
        $verkauf->unfallfahrzeug = $request->unfallfahrzeug;
        $verkauf->fahrtauglich = $request->fahrtauglich;
        $verkauf->nichtraucher = $request->nichtraucherfahrzeug;
        // Wartung & Inspektion
        $verkauf->hu = $hu;
        $verkauf->scheckheft = $request->scheckheft;
        $verkauf->garantie = $request->garantie;
        // Beschreibung & Preis
        $verkauf->beschreibung = nl2br($request->beschreibung);
        $verkauf->preis = $request->preis;
        $verkauf->preisx = $request->preisx;
//        $basic->images = $data[0];
//        $verkauf->save();
//
        $ausstattung = DB::table('fahrzeuges_ausstattung')->where('verkauf_id', $request->input('verkauf_id'))->update([
            'aussenfarbe' => $aussenfarbe,
            'innenfarbe' => $innenfarbe,
            'innenmaterial' => $innenmaterial,
            'metallic' => $request->metallic,
            // Sicherheit
            'antiblockiersystem' => $request->antiblockiersystem,
            'esp' => $request->esp,
            'asr' => $request->asr,
            'berganfahrassistent' => $request->berganfahrassistent,
            'muedigkeitswarner' => $request->muedigkeitswarner,
            'spurhalteassistent' => $request->spurhalteassistent,
            'totwinkelassistent' => $request->totwinkelassistent,
            'innenspiegel' => $request->innenspiegel,
            'nachtsicht' => $request->nachtsicht,
            'notbremsassistent' => $request->notbremsassistent,
            'notrufsystem' => $request->notrufsystem,
            'verkehrszeichenerkennung' => $request->verkehrszeichenerkennung,
            'tempomat' => $request->tempomat,
            'geschwindigkeitsbegrenzer' => $request->geschwindigkeitsbegrenzer,
            'abstandswarner' => $request->abstandswarner,
            'airbag' => $request->airbag,
            'isofix' => $request->isofix,
            'isofixbeifahrer' => $request->isofixbeifahrer,
            'scheinwerfer' => $request->scheinwerfer,
            'Scheinwerferreinigung' => $request->Scheinwerferreinigung,
            'fernlicht' => $request->fernlicht,
            'fernlichtassistent' => $request->fernlichtassistent,
            'tagfahrlicht' => $request->tagfahrlicht,
            'kurvenlicht' => $request->kurvenlicht,
            'nebelscheinwerfer' => $request->nebelscheinwerfer,
            'alarmanlage' => $request->alarmanlage,
            'wegfahrsperre' => $request->wegfahrsperre,
            // Komfort
            'klimatisierung' => $request->klimatisierung,
            'standheizung' => $request->standheizung,
            'beheizbarefrontscheibe' => $request->beheizbarefrontscheibe,
            'beheizbareslenkrad' => $request->beheizbareslenkrad,
            'selbstlenkend' => $request->selbstlenkend,
            'vorneep' => $request->vorneep,
            'hintenep' => $request->hintenep,
            'kamera' => $request->kamera,
            'kamera_360' => $request->kamera_360,
            'vornesv' => $request->vornesv,
            'hintensh' => $request->hintensh,
            'vorneesv' => $request->vorneesv,
            'hintenesh' => $request->hintenesh,
            'sportsitze' => $request->sportsitze,
            'armlehne' => $request->armlehne,
            'lordosenstuetze' => $request->lordosenstuetze,
            'massagesitze' => $request->massagesitze,
            'sitzbelueftung' => $request->sitzbelueftung,
            'umklappbarerbeifahrersitz' => $request->umklappbarerbeifahrersitz,
            'efensterheber' => $request->efensterheber,
            'eseitenspiegel' => $request->eseitenspiegel,
            'eheckklappe' => $request->eheckklappe,
            'zv' => $request->zv,
            'szv' => $request->szv,
            'lichtsensor' => $request->lichtsensor,
            'regensensor' => $request->regensensor,
            'servo' => $request->servo,
            'ambilight' => $request->ambilight,
            'lederlenkrad' => $request->lederlenkrad,
            // Infotainment
            'tunerradio' => $request->tunerradio,
            'dab' => $request->dab,
            'cd' => $request->cd,
            'tv' => $request->tv,
            'navigationssystem' => $request->navigationssystem,
            'soundsystem' => $request->soundsystem,
            'touchscreen' => $request->touchscreen,
            'sprachsteuerung' => $request->sprachsteuerung,
            'multifunktionslenkrad' => $request->multifunktionslenkrad,
            'freisprecheinrichtung' => $request->freisprecheinrichtung,
            'usb' => $request->usb,
            'bluetooth' => $request->bluetooth,
            'androidauto' => $request->androidauto,
            'carplay' => $request->carplay,
            'wlanwifi' => $request->wlanwifi,
            'streaming' => $request->streaming,
            'induktionsladen' => $request->induktionsladen,
            'bordcomputer' => $request->bordcomputer,
            'headup' => $request->headup,
            'kombiinstrument' => $request->kombiinstrument,
            // Extras
            'leichtmetallfelgen' => $request->leichtmetallfelgen,
            'sommerreifen' => $request->sommerreifen,
            'winterreifen' => $request->winterreifen,
            'allwetterreifen' => $request->allwetterreifen,
            'pannenhilfe' => $request->pannenhilfe,
            'reifendruckkontrolle' => $request->reifendruckkontrolle,
            'winterpaket' => $request->winterpaket,
            'raucherpaket' => $request->raucherpaket,
            'sportpaket' => $request->sportpaket,
            'sportfahrwerk' => $request->sportfahrwerk,
            'luftfederung' => $request->luftfederung,
            'anhaengerkupplung' => $request->anhaengerkupplung,
            'gepaeckraumabtrennung' => $request->gepaeckraumabtrennung,
            'skisack' => $request->skisack,
            'schiebedach' => $request->schiebedach,
            'panoramadach' => $request->panoramadach,
            'dachreling' => $request->dachreling,
            'behindertengerecht' => $request->behindertengerecht,
            'taxi' => $request->taxi,
            'updated_at' => now()
        ]);


        $kontakt = DB::table('fahrzeuges_kontakt')->where('verkauf_id', $request->input('verkauf_id'))->update([
            'kontakt' => $request->kontakt,
            'anrede' => $request->anrede,
            'firma' => $firma,
            'vorname' => $request->vorname,
            'nachname' => $request->nachname,
            'strasse' => $request->strasse,
            'plz' => $request->plz,
            'ort' => $request->ort,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'updated_at' => now()
        ]);


        $verkauf->save();

        Toastr::success('Fahrzeug erfolgreich geändert', 'Erfolgreich');
        return redirect()->route('backend.verkauf.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Fahrzeuge\Verkauf  $verkauf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verkauf $verkauf, Images $images)
    {
        if (Storage::disk('public')->exists('fahrzeuge/'.$images->images)) {
            Storage::disk('public')->delete('fahrzeuge/'.$images->images);
        }
        $verkauf->fahrzeuges_ausstattung()->delete();
        $verkauf->fahrzeuges_kontakt()->delete();
        $verkauf->fahrzeuges_image()->delete();
        $verkauf->delete();
        Toastr::error('Fahrzeug wurde gelöscht!', 'Erfolgreich vernichtet');
        return redirect()->back();
    }
}
