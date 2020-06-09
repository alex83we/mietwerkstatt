<?php

namespace App\Http\Controllers\Frontend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Backend\Fahrzeuge\Aussenfarbe;
use App\Models\Backend\Fahrzeuge\Getriebe;
use App\Models\Backend\Fahrzeuge\Innenfarbe;
use App\Models\Backend\Fahrzeuge\Innenmaterial;
use App\Models\Backend\Fahrzeuge\Kategorie;
use App\Models\Backend\Fahrzeuge\Kraftstoff;
use App\Models\Backend\Fahrzeuge\Schadstoffklasse;
use App\Models\Backend\Fahrzeuge\Umweltplakette;
use App\Models\Fahrzeuge\Ausstattung;
use App\Models\Fahrzeuge\Images;
use App\Models\Fahrzeuge\Kontakt;
use App\Models\Fahrzeuge\Verkauf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\Activitylog\Models\Activity;
use Yoeunes\Toastr\Facades\Toastr;

class VerkaufController extends Controller
{
    /*public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verkaufen = DB::table('fahrzeuges_verkauf')
            ->join('fahrzeuges_ausstattung', 'fahrzeuges_ausstattung.verkauf_id', '=', 'fahrzeuges_verkauf.id')
            ->join('fahrzeuges_kontakt', 'fahrzeuges_kontakt.verkauf_id', '=', 'fahrzeuges_verkauf.id')
            ->where('fahrzeuges_verkauf.aktiv', '=', 1)
//            ->whereRaw('fahrzeuges_verkauf.created_at > DATE_SUB(NOW(), INTERVAL 129600 MINUTE)')
            ->inRandomOrder()
            ->take(3)
            ->get();

        $image = Verkauf::with('fahrzeuges_image')->get();

        /*if (Auth::check() == false) {
            Log::info('Ein Benutzer hat ihre Seite betreten!');
        } else {
            Log::info('Der Benutzer ' . Auth::user()->vorname . ' ' . Auth::user()->name . ' hat ihre Seite betreten!');
        }*/
        return view('index', compact('verkaufen', $verkaufen, 'image', $image));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create-vk')) {
            return redirect(route('verkauf.index'));
        }
        $marke = DB::table('items_marke')->orderBy('marke')->get();
        $modell = DB::table('items_modell')->orderBy('modell')->get();
        $kraftstoff = Kraftstoff::all();
        $kategorie = Kategorie::all();
        $getriebe = Getriebe::all();
        $schadstoffklasse = Schadstoffklasse::all();
        $umweltplakette = Umweltplakette::all();
        $farbe = Aussenfarbe::all();
        $farbeInnen = Innenfarbe::all();
        $materialInnen = Innenmaterial::all();

        return view('verkauf.create', compact('marke', $marke, 'modell', $modell, 'kraftstoff',
            $kraftstoff, 'kategorie', $kategorie, 'getriebe', $getriebe, 'schadstoffklasse', $schadstoffklasse, 'umweltplakette',
            $umweltplakette, 'farbe', $farbe, 'farbeInnen', $farbeInnen, 'materialInnen', $materialInnen));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'marke' => 'required',
            'modell' => 'required',
            'ez_monat' => 'required',
            'ez_jahr' => 'required',
            'km' => 'required',
            'kraftstoff' => 'required',
            'kategorie' => 'required',
            'kw' => 'required',
            'ccm' => 'required',
            'getriebe' => 'required',
            'schadstoffklasse' => 'required',
            'umweltplakette' => 'required',
            'preis' => 'required',
            'preisx' => 'required',
            'anrede' => 'required',
            'vorname' => 'required',
            'nachname' => 'required',
            'strasse' => 'required',
            'plz' => 'required',
            'ort' => 'required',
            'telefon' => 'required',
            'anzeigetext' => 'required',
            'email' => 'required|email',
        ]);

        $marke = DB::table('items_marke')->where('id', '=', $request->marke)->get();

        if ($request->hu_monat == true) { $hu = $request->hu_monat.'/'.$request->hu_jahr; } elseif ($request->huneu == true) { $hu = $request->huneu; } else { $hu = $request->huabgelaufen; }
        if ($request->firma == true) { $firma = $request->firma; } else { $firma = 0; }
        if ($request->kraftstoff == 'Andere') { $kraftstoff = $request->kraftstoffAndere; } else { $kraftstoff = $request->kraftstoff; }
        if ($request->aussenfarbe == 'andere') { $aussenfarbe = $request->aussenfarbeAndere; } else { $aussenfarbe = $request->aussenfarbe; }
        if ($request->aussenfarbe == 0) { $aussenfarbe = 'Keine Farbe angegeben'; }
        if ($request->innenfarbe == 'andere') { $innenfarbe = $request->innenfarbeAndere; } else { $innenfarbe = $request->innenfarbe; }
        if ($request->innenfarbe == 0) { $innenfarbe = 'Keine Farbe angegeben'; }
        if ($request->innenmaterial == 'andere') { $innenmaterial = $request->innenmaterialAndere; } else { $innenmaterial = $request->innenmaterial; }
        if ($request->innenmaterial == 0) { $innenmaterial = 'Keine Material angegeben'; }
        $kw = $request->kw;
        $ps = $kw * 1.35962;

        $img = $request->hasFile('images');
        if (!empty($img))
        {
            foreach ($request->file('images') as $image)
            {
                $name = 'MwRKFZMietwerkstatt_'.uniqid().'_'.$image->getClientOriginalName();
                $nameToString = str_replace(' ', '_', $name);

                if (!Storage::disk('public')->exists('fahrzeuge')) {
                    Storage::disk('public')->makeDirectory('fahrzeuge');
                }

                $path = public_path('storage/fahrzeuge/'.$nameToString);
                $watermark = public_path('images/WatermarkRahmen.png');
                $fahrzeugImage = Image::make($image)->resize(640, 480, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $fahrzeugImage->insert($watermark, 'center');
                $fahrzeugImage->save($path);
                $data[] = $nameToString;
            }
        } else {
            $data = array("0");
        }

        $anzeigetext = $request->anzeigetext;
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        if ($anzeigetext == false) {
            $slug = str_replace($search, $replace, $marke[0]->marke . '-' . $request->modell . '-' . $request->ez_monat . '-' . $request->ez_jahr);
        } else {
            $slug = str_replace($search, $replace, $request->anzeigetext);
        }

        $basic = new Verkauf();
        $basic->marke = $marke[0]->marke;
        $basic->user_id = Auth::user()->id;
        $basic->slug = Str::slug($slug);
        $basic->modell = $request->modell;
        $basic->anzeigetext = $anzeigetext;
        $basic->ez_monat = $request->ez_monat;
        $basic->ez = $request->ez_jahr;
        $basic->km = number_format($request->km, 3, '', '.');
        $basic->kraftstoff = $kraftstoff;
        $basic->kategorie = $request->kategorie;
        $basic->tueren = $request->tueren;
        $basic->scheibetueren = $request->scheibetueren;
        $basic->sitzplaetze = $request->sitzplaetze;
        // Antrieb & Umwelt
        $basic->kw = $kw;
        $basic->ps = (int)round($ps);
        $basic->ccm = $request->ccm;
        $basic->getriebe = $request->getriebe;
        $basic->allrad = $request->allradantrieb;
        $basic->schaltwippen = $request->schaltwippen;
        // Umwelt & Verbrauch
        $basic->schadstoffklasse = $request->schadstoffklasse;
        $basic->umweltplakette = $request->umweltplakette;
        $basic->kraftstoff_komb = $request->kraftstoffverbrauch_komb;
        $basic->kraftstoff_innerorts = $request->kraftstoffverbrauch_innerorts;
        $basic->kraftstoff_ausserorts = $request->kraftstoffverbrauch_ausserorts;
        $basic->co2 = $request->co₂emissionen;
        $basic->partikelfilter = $request->partikelfilter;
        $basic->ssa = $request->ssa;
        // Fahrzeughistory
        $basic->halter = $request->fahrzeughalter;
        $basic->fahrzeugart = $request->fahrzeugart;
        $basic->besfahrzeug = $request->besfahrzeug;
        $basic->unfallfahrzeug = $request->unfallfahrzeug;
        $basic->fahrtauglich = $request->fahrtauglich;
        $basic->nichtraucher = $request->nichtraucherfahrzeug;
        // Wartung & Inspektion
        $basic->hu = $hu;
        $basic->scheckheft = $request->scheckheft;
        $basic->garantie = $request->garantie;
        // Beschreibung & Preis
        $basic->beschreibung = nl2br($request->beschreibung);
        $basic->preis = number_format($request->preis, 2, '.', '');
        $basic->preisx = $request->preisx;
        $basic->images = $data[0];
        $basic->save();

        if ($request->images == true) {
            if (count($request->images) > 0) {
                foreach ($request->images as $item => $v) {
                    $bilder = array(
                        'verkauf_id' => $basic->id,
                        'user_id' => Auth::user()->id,
                        'images' => $data[$item],
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                    Images::insert($bilder);
//                dd($bilder);
                }
            }
        } else {
            $bilder = array(
                'verkauf_id' => $basic->id,
                'user_id' => Auth::user()->id,
                'images' => $data[0],
                'created_at' => now(),
                'updated_at' => now(),
            );
            Images::insert($bilder);
        }

        $ausstattung = new Ausstattung();
        $ausstattung->verkauf_id = $basic->id;
        $ausstattung->user_id = Auth::user()->id;
        $ausstattung->aussenfarbe = $aussenfarbe;
        $ausstattung->innenfarbe = $innenfarbe;
        $ausstattung->innenmaterial = $innenmaterial;
        $ausstattung->metallic = $request->metallic;
        // Sicherheit
        $ausstattung->antiblockiersystem = $request->antiblockiersystem;
        $ausstattung->esp = $request->esp;
        $ausstattung->asr = $request->asr;
        $ausstattung->berganfahrassistent = $request->berganfahrassistent;
        $ausstattung->muedigkeitswarner = $request->muedigkeitswarner;
        $ausstattung->spurhalteassistent = $request->spurhalteassistent;
        $ausstattung->totwinkelassistent = $request->totwinkelassistent;
        $ausstattung->innenspiegel = $request->innenspiegel;
        $ausstattung->nachtsicht = $request->nachtsicht;
        $ausstattung->notbremsassistent = $request->notbremsassistent;
        $ausstattung->notrufsystem = $request->notrufsystem;
        $ausstattung->verkehrszeichenerkennung = $request->verkehrszeichenerkennung;
        $ausstattung->tempomat = $request->tempomat;
        $ausstattung->geschwindigkeitsbegrenzer = $request->geschwindigkeitsbegrenzer;
        $ausstattung->abstandswarner = $request->abstandswarner;
        $ausstattung->airbag = $request->airbag;
        $ausstattung->isofix = $request->isofix;
        $ausstattung->isofixbeifahrer = $request->isofixbeifahrer;
        $ausstattung->scheinwerfer = $request->scheinwerfer;
        $ausstattung->Scheinwerferreinigung = $request->Scheinwerferreinigung;
        $ausstattung->fernlicht = $request->fernlicht;
        $ausstattung->fernlichtassistent = $request->fernlichtassistent;
        $ausstattung->tagfahrlicht = $request->tagfahrlicht;
        $ausstattung->kurvenlicht = $request->kurvenlicht;
        $ausstattung->nebelscheinwerfer = $request->nebelscheinwerfer;
        $ausstattung->alarmanlage = $request->alarmanlage;
        $ausstattung->wegfahrsperre = $request->wegfahrsperre;
        // Komfort
        $ausstattung->klimatisierung = $request->klimatisierung;
        $ausstattung->standheizung = $request->standheizung;
        $ausstattung->beheizbarefrontscheibe = $request->beheizbarefrontscheibe;
        $ausstattung->beheizbareslenkrad = $request->beheizbareslenkrad;
        $ausstattung->selbstlenkend = $request->selbstlenkend;
        $ausstattung->vorneep = $request->vorneep;
        $ausstattung->hintenep = $request->hintenep;
        $ausstattung->kamera = $request->kamera;
        $ausstattung->kamera_360 = $request->kamera_360;
        $ausstattung->vornesv = $request->vornesv;
        $ausstattung->hintensh = $request->hintensh;
        $ausstattung->vorneesv = $request->vorneesv;
        $ausstattung->hintenesh = $request->hintenesh;
        $ausstattung->sportsitze = $request->sportsitze;
        $ausstattung->armlehne = $request->armlehne;
        $ausstattung->lordosenstuetze = $request->lordosenstuetze;
        $ausstattung->massagesitze = $request->massagesitze;
        $ausstattung->sitzbelueftung = $request->sitzbelueftung;
        $ausstattung->umklappbarerbeifahrersitz = $request->umklappbarerbeifahrersitz;
        $ausstattung->efensterheber = $request->efensterheber;
        $ausstattung->eseitenspiegel = $request->eseitenspiegel;
        $ausstattung->eheckklappe = $request->eheckklappe;
        $ausstattung->zv = $request->zv;
        $ausstattung->szv = $request->szv;
        $ausstattung->lichtsensor = $request->lichtsensor;
        $ausstattung->regensensor = $request->regensensor;
        $ausstattung->servo = $request->servo;
        $ausstattung->ambilight = $request->ambilight;
        $ausstattung->lederlenkrad = $request->lederlenkrad;
        // Infotainment
        $ausstattung->tunerradio = $request->tunerradio;
        $ausstattung->dab = $request->dab;
        $ausstattung->cd = $request->cd;
        $ausstattung->tv = $request->tv;
        $ausstattung->navigationssystem = $request->navigationssystem;
        $ausstattung->soundsystem = $request->soundsystem;
        $ausstattung->touchscreen = $request->touchscreen;
        $ausstattung->sprachsteuerung = $request->sprachsteuerung;
        $ausstattung->multifunktionslenkrad = $request->multifunktionslenkrad;
        $ausstattung->freisprecheinrichtung = $request->freisprecheinrichtung;
        $ausstattung->usb = $request->usb;
        $ausstattung->bluetooth = $request->bluetooth;
        $ausstattung->androidauto = $request->androidauto;
        $ausstattung->carplay = $request->carplay;
        $ausstattung->wlanwifi = $request->wlanwifi;
        $ausstattung->streaming = $request->streaming;
        $ausstattung->induktionsladen = $request->induktionsladen;
        $ausstattung->bordcomputer = $request->bordcomputer;
        $ausstattung->headup = $request->headup;
        $ausstattung->kombiinstrument = $request->kombiinstrument;
        // Extras
        $ausstattung->leichtmetallfelgen = $request->leichtmetallfelgen;
        $ausstattung->sommerreifen = $request->sommerreifen;
        $ausstattung->winterreifen = $request->winterreifen;
        $ausstattung->allwetterreifen = $request->allwetterreifen;
        $ausstattung->pannenhilfe = $request->pannenhilfe;
        $ausstattung->winterpaket = $request->winterpaket;
        $ausstattung->raucherpaket = $request->raucherpaket;
        $ausstattung->sportpaket = $request->sportpaket;
        $ausstattung->sportfahrwerk = $request->sportfahrwerk;
        $ausstattung->luftfederung = $request->luftfederung;
        $ausstattung->anhaengerkupplung = $request->anhaengerkupplung;
        $ausstattung->gepaeckraumabtrennung = $request->gepaeckraumabtrennung;
        $ausstattung->skisack = $request->skisack;
        $ausstattung->schiebedach = $request->schiebedach;
        $ausstattung->panoramadach = $request->panoramadach;
        $ausstattung->dachreling = $request->dachreling;
        $ausstattung->behindertengerecht = $request->behindertengerecht;
        $ausstattung->taxi = $request->taxi;
        $ausstattung->save();

        $kontakt = new Kontakt();
        $kontakt->verkauf_id = $basic->id;
        $kontakt->user_id = Auth::user()->id;
        $kontakt->kontakt = $request->kontakt;
        $kontakt->anrede = $request->anrede;
        $kontakt->firma = $firma;
        $kontakt->vorname = $request->vorname;
        $kontakt->nachname = $request->nachname;
        $kontakt->strasse = $request->strasse;
        $kontakt->plz = $request->plz;
        $kontakt->ort = $request->ort;
        $kontakt->telefon = $request->telefon;
        $kontakt->email = $request->email;
        $kontakt->save();

        Toastr::success('Ihr Fahrzeug wurde erfolgreich angelegt!', 'Erfolgreich angelegt');
//        Mail::to($kontakt->email)->send(new FahrzeugAnlage($basic));
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fahrzeuge\Verkauf  $verkauf
     * @return \Illuminate\Http\Response
     */
    public function show(Verkauf $verkauf)
    {
        $previous_record = Verkauf::where('id', '<', $verkauf->id)->orderBy('id', 'desc')->first();
        $next_record = Verkauf::where('id', '>', $verkauf->id)->orderBy('id')->first();
        return view('verkauf.show', compact('verkauf', $verkauf, 'previous_record', 'next_record'));
    }


    public function getModell($id)
    {
        if ($id != 0) {
            $modells = DB::table('items_modell')->where('marke_id', '=', $id)->orderBy('items_modell.modell')->get();
        }
        return response()->json($modells);
    }
}
