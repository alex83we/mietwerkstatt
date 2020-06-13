<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AnfrageMail;
use App\Mail\AnfrageMailFahrzeug;
use App\Models\FahrzeugAnfrage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yoeunes\Toastr\Facades\Toastr;

class FahrzeugAnfrageController extends Controller
{
    public function store(Request $request)
    {
        $anfrage = new FahrzeugAnfrage();
        $anfrage->user_id = $request->user_id;
        $anfrage->betreff = $request->betreff;
        $anfrage->anrede = $request->anrede;
        $anfrage->name = $request->name;
        $anfrage->email = $request->email;
        $anfrage->telefon = $request->telefon;
        $anfrage->datenschutz = $request->datenschutz;
        $anfrage->text = nl2br(e($request->text));

        if ($anfrage->save()) {
            Toastr::success('Anfrage erfolgreich versendet', 'Erfolg');

            Mail::to($anfrage->email)->send(new AnfrageMail($anfrage));
            Mail::to('info@mietwerkstatt-rossleben.de')->send(new AnfrageMailFahrzeug($anfrage));
            return redirect()->back();
        } else {
            Toastr::error('Es ist ein fehler aufgetreten', 'Error');
            return redirect()->back($request);
        }
    }
}
