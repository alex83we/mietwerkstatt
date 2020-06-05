<?php

namespace App\Http\Controllers\Backend\Add;

use App\Http\Controllers\Controller;
use App\Models\Add\Items;
use App\Models\Backend\Fahrzeuge\Marke;
use App\Models\Backend\Fahrzeuge\Modell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class ItemsController extends Controller
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
        $marke = Marke::with('items_modell')->orderBy('items_marke.marke', 'ASC')->get();

        return view('backend.add.index', compact('marke', $marke));
    }

    // Marke anlegen
    public function storeMarke(Request $request)
    {
        $marke = new Marke();
        $marke->marke = $request->marke;
        $marke->save();

        Toastr::success('Marke erfolgreich angelegt!', 'Erfolgreich');
        return redirect()->back();
    }

    // Modell anlegen
    public function storeModell(Request $request)
    {
        $modell = new Modell();
        $modell->marke_id = $request->marke_id;
        $modell->modell = $request->modell;
        $modell->save();

        Toastr::success('Modell erfolgreich angelegt!', 'Erfolgreich');
        return redirect()->back();
    }
}
