<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();

//        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'Admin')->first();
        $mitarbeiterRole = Role::where('name', 'Mitarbeiter')->first();
        $benutzerRole = Role::where('name', 'Benutzer')->first();

        $admin = User::create([
            'username' => 'alex83we',
            'anrede' => 'Herr',
            'vorname' => 'Alexander',
            'name' => 'Guthmann',
            'straße' => 'Fuldaer Straße 141',
            'plz' => '99423',
            'ort' => 'Weimar',
            'telefon' => '01721020770',
            'email' => 'aguthmann83@gmail.com',
            'terms' => '1',
            'password' => Hash::make('alex2801')
        ]);

        $mitarbeiter = User::create([
            'username' => 'heisen',
            'anrede' => 'Herr',
            'vorname' => 'Heiko',
            'name' => 'Eisenschmidt',
            'straße' => 'Windhöfe 13',
            'plz' => '99628',
            'ort' => 'Buttstädt',
            'telefon' => '017643813854',
            'email' => 'heiko.e@thueringer-tuning-freunde.de',
            'terms' => '1',
            'password' => Hash::make('he131169')
        ]);

        $benutzer = User::create([
            'username' => 'benutzer',
            'anrede' => 'Herr',
            'vorname' => 'Benutzer',
            'name' => 'Benutzer',
            'straße' => 'Benutzerstraße 99',
            'plz' => '99999',
            'ort' => 'Benutzerstadt',
            'telefon' => '0123456789',
            'email' => 'benutzer@thueringer-tuning-freunde.de',
            'terms' => '1',
            'password' => Hash::make('benutzer')
        ]);

        $admin->roles()->attach($adminRole);
        $mitarbeiter->roles()->attach($mitarbeiterRole);
        $benutzer->roles()->attach($benutzerRole);
    }
}
