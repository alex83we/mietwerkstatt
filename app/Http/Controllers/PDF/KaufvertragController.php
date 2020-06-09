<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\Fahrzeuge\Verkauf;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class KaufvertragController extends Controller
{
    //

    public function index(int $id)
    {
        $verkauf = Verkauf::find($id);
        $users = User::find($verkauf->user_id);
        return view('pdf.kaufvertrag.index', compact('verkauf', $verkauf, 'users', $users));
    }

    public function store(Request $request)
    {
        $fahrzeuge = Verkauf::find($request->verkauf);

        $data = [
            'title' => 'Kaufvertrag',
            'fahrzeuge' => $fahrzeuge,
            'user' => Auth::user($fahrzeuge->user_id),
            'request' => $request,
        ];
        dd($data, $request->all());
        $pdf = PDF::loadView('pdf/kaufvertrag/store', $data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream(date('d.m.Y').'_'.$fahrzeuge->slug.'_kaufvertrag.pdf');
    }
}
