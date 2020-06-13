<?php

namespace App\Http\Controllers\Backend\PDF;

use App\Http\Controllers\Controller;
use App\Models\Backend\Fahrzeuge\Verkauf;
use App\Models\PDF\Kaufvertrag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaufvertragController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
       $pdf = DB::table('kaufvertrag')
            ->select('kaufvertrag.*', 'fahrzeuges_verkauf.*', 'kaufvertrag.created_at as create', 'kaufvertrag.updated_at as update')
            ->join('fahrzeuges_verkauf', 'fahrzeuges_verkauf.id', '=', 'kaufvertrag.fahrzeug_id')
            ->get();

       return view('backend.pdf.kaufvertrag', compact('pdf', $pdf));
    }
}
