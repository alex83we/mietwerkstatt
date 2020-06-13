<?php

namespace App\Http\Controllers\Backend\Preisliste;

use App\Http\Controllers\Controller;
use App\Models\Preisliste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreislisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aoh = 'Arbeitsplatz ohne Hebebühne';
        $moh = 'Arbeitsplatz mit Hebebühne';
        $fus = 'Flüssigkeiten & Schmierstoffe';
        $wuw = 'Werkzeuge und Werkzeugzubehör';
        $rs = 'Reifenservice';
        $en = 'Entsorgung';
        $ohneBühne = DB::table('preislistes')->where('kategorie', '=', $aoh)->get();
        foreach ($ohneBühne as $item) {
            $ohneBühne = $item;
        }
        $ohneBühne = Preisliste::where('kategorie', '=', $aoh)->get();

        $mitBühne = DB::table('preislistes')->where('kategorie', '=', $moh)->get();
        foreach ($mitBühne as $item) {
            $mitBühne = $item;
        }
        $mitBühne = Preisliste::where('kategorie', '=', $moh)->get();

        $fluessigkeiten = DB::table('preislistes')->where('kategorie', '=', $fus)->get();
        foreach ($fluessigkeiten as $item) {
            $fluessigkeiten = $item;
        }
        $fluessigkeiten = Preisliste::where('kategorie', '=', $fus)->get();

        $werkzeug = DB::table('preislistes')->where('kategorie', '=', $wuw)->get();
        foreach ($werkzeug as $item) {
            $werkzeug = $item;
        }
        $werkzeug = Preisliste::where('kategorie', '=', $wuw)->get();

        $reifenservice = DB::table('preislistes')->where('kategorie', '=', $rs)->get();
        foreach ($werkzeug as $item) {
            $reifenservice = $item;
        }
        $reifenservice = Preisliste::where('kategorie', '=', $rs)->get();

        $entsorgung = DB::table('preislistes')->where('kategorie', '=', $en)->get();
        foreach ($werkzeug as $item) {
            $entsorgung = $item;
        }
        $entsorgung = Preisliste::where('kategorie', '=', $en)->get();

        return view('preisliste', compact('ohneBühne', $ohneBühne, 'mitBühne', $mitBühne, 'fluessigkeiten',
            $fluessigkeiten, 'werkzeug', $werkzeug, 'reifenservice', $reifenservice, 'entsorgung', $entsorgung));
    }

    public function backendIndex()
    {
        $preisliste = Preisliste::all();

//        dd($preisliste);

        return view('backend.preisliste.index', compact('preisliste', $preisliste));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.preisliste.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preisliste = new Preisliste();
        $preisliste->kategorie = $request->kategorie;
        $preisliste->title = $request->title;
        $preisliste->zusatztitle = $request->zusatztitel;
        $preisliste->preis = $request->preis;
        $preisliste->preiszusatz = $request->preiszusatz;
        $preisliste->save();

        toastr()->success('Erfolgreich angelegt', 'Erfolgreich');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Preisliste $preisliste
     * @return void
     */
    public function show(Preisliste $preisliste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Preisliste $preisliste
     * @return void
     */
    public function edit(Preisliste $preisliste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Preisliste $preisliste
     * @return void
     */
    public function update(Request $request, Preisliste $preisliste)
    {
        $preisliste->kategorie = $request->kategorie;
        $preisliste->title = $request->title;
        $preisliste->zusatztitle = $request->zusatztitel;
        $preisliste->preis = $request->preis;
        $preisliste->preiszusatz = $request->preiszusatz;
        $preisliste->save();

        toastr()->success('Erfolgreich geändert', 'Erfolgreich');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Preisliste $preisliste
     * @return void
     */
    public function destroy(Preisliste $preisliste)
    {
        $preisliste->delete();
        toastr()->error('Preis wurde gelöscht!', 'Erfolgreich vernichtet');
        return redirect()->back();
    }
}
