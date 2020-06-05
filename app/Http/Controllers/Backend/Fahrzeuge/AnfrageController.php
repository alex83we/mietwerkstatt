<?php

namespace App\Http\Controllers\Backend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Fahrzeuge\Anfrage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class AnfrageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show(Request $request, int $anfrage)
    {
        $anfragen = DB::table('fahrzeug_anfrages')->where('user_id', '=', $anfrage)
            ->orderBy('created_at', 'DESC')
            ->whereRaw('fahrzeug_anfrages.created_at > DATE_SUB(NOW(), INTERVAL 20160 MINUTE)')
            ->get();

        $user = User::find(Auth::user()->id);

        return view('backend.anfrage.index', compact('anfragen', $anfragen, 'user', $user));
    }

    public function destroy(Anfrage $anfrage)
    {
        if ($anfrage->delete()) {
            Toastr::success('Anfrage erfolgreich gelöscht', 'Gelöscht');
        }
        return redirect()->back();
    }
}
