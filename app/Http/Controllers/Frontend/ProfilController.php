<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yoeunes\Toastr\Facades\Toastr;

class ProfilController extends Controller
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
    public function index($id)
    {
        $profil =User::find($id);
        $role = User::find($id)->roles()->get()->implode('name', ', ');
        $roles = Role::all();

        return view('profil.index', compact('profil', $profil, 'role', 'roles', $roles));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $profil
     * @return \Illuminate\Http\Response
     */
    public function show(User $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profil)
    {
        /*$role = Role::all();
        return view('profil.edit', compact('user', $profil, 'role', $role));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profil)
    {
        $profil->update([
            'username' => $request->username,
            'firma' => $request->firma,
            'anrede' => $request->anrede,
            'vorname' => $request->vorname,
            'name' => $request->name,
            'straße' => $request->straße,
            'plz' => $request->plz,
            'ort' => $request->ort,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'images' => $request->images,
        ]);

//        dd($profil);

        if ($profil->save()) {
            Toastr::success($profil->vorname.' '.$profil->name.' wurde aktualisiert', 'Erfolgreich aktualisiert');
            $request->session();
        } else {
            Toastr::error('Beim Aktualisieren des Benutzers ist ein Fehler aufgetreten!', 'Error!');
            $request->session();
        }

        return redirect('profil/'.$profil->id);
    }

    /**
     * @param Request $request
     * @param App\User $profil
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request, User $profil)
    {

        $image = $request->file('images');

        if (isset($image)) {
            $imageName = 'MwRKFZService-'.$image->getClientOriginalName();

            if (!Storage::disk('public')->exists('profil/'.$profil->id)) {
                Storage::disk('public')->makeDirectory('profil/'.$profil->id);
            }

            if (Storage::disk('public')->exists('profil/'.$profil->id.'/'.$profil->images)) {
                Storage::disk('public')->delete('profil/'.$profil->id.'/'.$profil->images);
            }

            $profilImage = Image::make($image)->resize(140,140)->stream();
            Storage::disk('public')->put('profil/'.$profil->id.'/'.$imageName,$profilImage);
        } else {
            $imageName = "0";
        }

//        $profil->name = $request->name;
//        $profil->email = $request->email;
        $profil->images = $imageName;

        if ($profil->save()) {
            Toastr::success('Das Bild von '.$profil->vorname.' '.$profil->name.' wurde aktualisiert', 'Erfolgreich aktualisiert');
            $request->session();
        } else {
            Toastr::error('Beim Aktualisieren des Benutzers ist ein Fehler aufgetreten!', 'Error!');
            $request->session();
        }


        return redirect('profil/'.$profil->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $profil)
    {
        //
    }
}
