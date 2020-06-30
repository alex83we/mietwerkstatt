<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Firma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirmenController extends Controller
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
        $firma = firma::first();

        return view('backend.firma.index', compact('firma', $firma));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'firmenname' => 'required',
            'firmenzusatz' => 'required',
            'straße' => 'required',
            'plz' => 'required|max:5',
            'ort' => 'required',
            'telefon' => 'required|max:25',
            'www' => 'required',
            'mobil' => 'required|max:25',
            'email' => 'required|email',
            'fax' => 'required|max:25',
        ]);

        if ($request->id == 1) {
            DB::table('backend_firmendaten')->where('id', '=', 1)->update([
                'firmenname' => $request->firmenname,
                'firmenzusatz' => $request->firmenzusatz,
                'straße' => $request->straße,
                'plz' => $request->plz,
                'ort' => $request->ort,
                'telefon' => $request->telefon,
                'www' => $request->www,
                'mobil' => $request->mobil,
                'email' => $request->email,
                'fax' => $request->fax,
                'ustid' => $request->ustid,
                'steuernr' => $request->steuernr,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'montag' => $request->montag,
                'dienstag' => $request->dienstag,
                'mittwoch' => $request->mittwoch,
                'donnerstag' => $request->donnerstag,
                'freitag' => $request->freitag,
                'samstag' => $request->samstag,
                'bmontag' => $request->bmontag,
                'bdienstag' => $request->bdienstag,
                'bmittwoch' => $request->bmittwoch,
                'bdonnerstag' => $request->bdonnerstag,
                'bfreitag' => $request->bfreitag,
                'bsamstag' => $request->bsamstag,
                'updated_at' => now(),
            ]);
            toastr()->success('Die Firmendaten wurden gespeichert!', 'Erfolgreich gespeichert');
        } else {
            $firma = new Firma();
            $firma->firmenname = $request->firmenname;
            $firma->firmenzusatz = $request->firmenzusatz;
            $firma->straße = $request->straße;
            $firma->plz = $request->plz;
            $firma->ort = $request->ort;
            $firma->telefon = $request->telefon;
            $firma->www = $request->www;
            $firma->mobil = $request->mobil;
            $firma->email = $request->email;
            $firma->fax = $request->fax;
            $firma->ustid = $request->ustid;
            $firma->steuernr = $request->steuernr;
            $firma->facebook = $request->facebook;
            $firma->instagram = $request->instagram;
            $firma->twitter = $request->twitter;
            $firma->montag = $request->montag;
            $firma->dienstag = $request->dienstag;
            $firma->mittwoch = $request->mittwoch;
            $firma->donnerstag = $request->donnerstag;
            $firma->freitag = $request->freitag;
            $firma->samstag = $request->samstag;
            $firma->bmontag = $request->bmontag;
            $firma->bdienstag = $request->bdienstag;
            $firma->bmittwoch = $request->bmittwoch;
            $firma->bdonnerstag = $request->bdonnerstag;
            $firma->bfreitag = $request->bfreitag;
            $firma->bsamstag = $request->bsamstag;

            if ($firma->save()) {
                toastr()->success('Die Firmendaten wurden gespeichert!', 'Erfolgreich gespeichert');
            } else {
                toastr()->error('Es ist ein Fehler aufgetreten!', 'Fehler aufgetreten');
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function show(Firma $firma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function edit(Firma $firma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firma $firma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firma $firma)
    {
        //
    }
}
