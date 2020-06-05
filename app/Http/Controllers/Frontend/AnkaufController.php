<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AnkaufMail;
use App\Models\Ankauf;
use App\Models\Backend\Fahrzeuge\Getriebe;
use App\Models\Backend\Fahrzeuge\Kategorie;
use App\Models\Backend\Fahrzeuge\Kraftstoff;
use App\Models\Backend\Fahrzeuge\Marke;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AnkaufController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marke = Marke::all();
        $kraftstoff = Kraftstoff::all();
        $getriebe = Getriebe::all();
        $kategorie = Kategorie::all();

        return view('ankauf.index', compact('marke', $marke, 'kraftstoff', $kraftstoff, 'kategorie', $kategorie, 'getriebe', $getriebe));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marke = "";
        $marken = DB::table('items_marke')->where('id', '=', $request->marke)->select('marke')->get();
        foreach ($marken as $item) {
            $marke = $item->marke;
        }

        $zulassung = $request->zulassung.'/'.$request->jahr;
        $ps = $request->PS;
        $kw = $ps / 1.35962;

        $img = $request->hasFile('images');
        if (!empty($img))
        {
            foreach ($request->file('images') as $image)
            {
                $name = 'MwRKFZAnkauf_'.$image->getClientOriginalName();
                $nameToString = str_replace(' ', '_', $name);

                if (!Storage::disk('public')->exists('ankauf')) {
                    Storage::disk('public')->makeDirectory('ankauf');
                }

                $path = public_path('storage/ankauf/'.$nameToString);
                $fahrzeugImage = Image::make($image)->resize(640, 480, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $fahrzeugImage->save($path);
                $data[] = $nameToString;
            }
        } else {
            $data = array("default.png");
        }

        $ankauf = array(
            'marke' => $marke,
            'modell' => $request->modell,
            'zulassung' => $zulassung,
            'km' => $request->km,
            'tuev' => $request->tuev,
            'PS' => (int)$ps,
            'kw' => (int)round($kw),
            'kraftstoff' => $request->kraftstoff,
            'getriebe' => $request->getriebe,
            'karosserie' => $request->karosserie,
            'tuer' => $request->tuer,
            'halter' => $request->halter,
            'import' => $request->import,
            'unfall' => $request->unfall,
            'getriebeschaden' => $request->getriebeschaden,
            'motorschaden' => $request->motorschaden,
            'extras' => $request->extras,
            'description' => nl2br($request->description),
            'vorname' => $request->vorname,
            'nachname' => $request->nachname,
            'email' => $request->email,
            'telefonnummer' => $request->telefonnummer,
            'wpreis' => $request->wpreis,
            'mpreis' => $request->mpreis,
            'kfzplz' => $request->kfzplz,
            'image' => $data
        );
//        dd($ankauf);

        Mail::to('ankauf@mietwerkstatt-rossleben.de')->send(new AnkaufMail($ankauf));
        return back();
    }

    public function getModell($id)
    {
        if ($id != '') {
            $modells = DB::table('items_modell')
                ->where('marke_id', '=', $id)
                ->select('modell')
                ->get();
        }
        return response()->json($modells);
    }
}
