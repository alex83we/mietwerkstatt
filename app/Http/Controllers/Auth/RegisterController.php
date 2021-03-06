<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Profil;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'vorname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'terms' => ['required', 'int', 'max:1'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'firma' => $data['firma'],
            'anrede' => $data['anrede'],
            'vorname' => $data['vorname'],
            'straße' => $data['straße'],
            'plz' => $data['plz'],
            'ort' => $data['ort'],
            'telefon' => $data['telefon'],
            'terms' => $data['terms'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::select('id')->where('name', 'Benutzer')->first();

        $user->roles()->attach($role);

        return $user;
    }

    public function redirectTo()
    {
        if (Auth::user()->hasAnyRoles(['Admin', 'Mitarbeiter'])) {
            $this->redirectTo = route('backend.dashboard');
            return $this->redirectTo;
        }

        $this->redirectTo = url('/profil/'.Auth::user()->id);
        return $this->redirectTo;
    }
}
