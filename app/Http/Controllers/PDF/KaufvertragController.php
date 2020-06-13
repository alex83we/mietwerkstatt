<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\Fahrzeuge\Verkauf;
use App\Models\PDF\Kaufvertrag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function store(Request $request, Kaufvertrag $kaufvertrag)
    {
        $fahrzeuge = Verkauf::find($request->verkauf);
        $kaufvertrag_id = Kaufvertrag::where('fahrzeug_id', '=', $request->verkauf)->get();
        $fahrzeug = false;
        foreach ($kaufvertrag_id as $fahrzeug_id) {
            $fahrzeug = $fahrzeug_id->fahrzeug_id;
        }

        $data = [
            'title' => 'Kaufvertrag',
            'fahrzeuge' => $fahrzeuge,
            'user' => Auth::user($fahrzeuge->user_id),
            'request' => $request,
        ];

        $pdf = PDF::loadView('pdf/kaufvertrag/store', $data)->save(public_path('storage/kaufvertrag/'.date('d.m.Y').'_'.$fahrzeuge->slug.'_kaufvertrag.pdf'));
        $pdf->setPaper('A4', 'portrait');

        $kaufvertragpath = date('d.m.Y').'_'.$fahrzeuge->slug.'_kaufvertrag.pdf';

        if ($request->verkauf == $fahrzeug) {
            DB::table('kaufvertrag')->where('fahrzeug_id', '=', $fahrzeuge->id)->update([
                'fahrzeug_id' => $fahrzeuge->id,
                'path' => $kaufvertragpath,
                'updated_at' => now(),
            ]);
        } else {
            $kaufvertrag->fahrzeug_id = $fahrzeuge->id;
            $kaufvertrag->path = $kaufvertragpath;
            $kaufvertrag->save();
        }

        return $pdf->stream(date('d.m.Y').'_'.$fahrzeuge->slug.'_kaufvertrag.pdf');
    }
}
