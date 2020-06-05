<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\WerkstattMail;
use App\Models\Werkstatt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yoeunes\Toastr\Facades\Toastr;

class WerkstattController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('werkstatt.werkstatt');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'anrede' => 'required',
            'vorname' => 'required',
            'nachname' => 'required',
            'strasse' => 'required',
            'plz' => 'required|max:5',
            'ort' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'wtermin' => 'required',
            'wterminuhrzeit' => 'required',
            'wterminuhrzeit1' => 'required',
            'fahrzeug' => 'required',
            'kennzeichen' => 'required',
            'km' => 'required',
            'text' => 'required',
            'datenschutz' => 'required',
        ]);

        $werkstatt = array(
            'firma' => $request->firma,
            'anrede' => $request->anrede,
            'vorname' => $request->vorname,
            'nachname' => $request->nachname,
            'strasse' => $request->strasse,
            'plz' => $request->plz,
            'ort' => $request->ort,
            'email' => $request->email,
            'tel' => $request->tel,
            'wtermin' => $request->wtermin,
            'wterminuhrzeit' => $request->wterminuhrzeit,
            'wterminuhrzeit1' => $request->wterminuhrzeit1,
            'atermin' => $request->atermin,
            'aterminuhrzeit' => $request->aterminuhrzeit,
            'aterminuhrzeit1' => $request->aterminuhrzeit1,
            'fahrzeug' => $request->fahrzeug,
            'kennzeichen' => $request->kennzeichen,
            'fahrgestell' => $request->fahrgestell,
            'km' => $request->km,
            'bj' => $request->bj,
            'text' => nl2br($request->text),
            'hebebuehne' => $request->hebebuehne,
            'reifenwechsel' => $request->reifenwechsel,
            'huau' => $request->huau,
            'service' => $request->service,
            'inspektion' => $request->inspektion,
            'sonstiges' => $request->sonstiges,
            'datenschutz' => $request->datenschutz,
        );

        Mail::to('werkstatt@mietwerkstatt-rossleben.de')->send(new WerkstattMail($werkstatt));
        Toastr::success('Ihre Werkstattanfrage wurde verschickt!', 'Erfolgreich');
        return redirect('/');
    }
}
