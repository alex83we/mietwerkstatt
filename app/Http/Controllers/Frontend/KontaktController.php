<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\KontaktMail;
use App\Models\Kontakt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontaktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kontakt.kontakt');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate ($request, [
            'anrede' => 'required',
            'vorname' => 'required',
            'nachname' => 'required',
            'strasse' => 'required',
            'plz' => 'required|max:5',
            'ort' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'text' => 'required',
            'datenschutz' => 'required',
        ]);

        $kontakt = array(
            'anrede' => $request->anrede,
            'firma' => $request->firma,
            'vorname' => $request->vorname,
            'nachname' => $request->nachname,
            'strasse' => $request->strasse,
            'plz' => $request->plz,
            'ort' => $request->ort,
            'email' => $request->email,
            'tel' => $request->tel,
            'text' => nl2br($request->text),
            'datenschutz' => $request->datenschutz,
        );

        Mail::to('info@mietwerkstatt-rossleben.de')->send(new KontaktMail($kontakt));
        return back();
    }
}
