<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Firma;
use Illuminate\Http\Request;

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

        if($firma->save()) {
            toastr()->success('Die Firmendaten wurden gespeichert!', 'Erfolgreich gespeichert');
        } else {
            toastr()->error('Es ist ein Fehler aufgetreten!', 'Fehler aufgetreten');
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
