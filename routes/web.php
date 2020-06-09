<?php

use App\Models\Backend\Dashboard;
use App\Models\Fahrzeuge\Verkauf;
use Illuminate\Support\Facades\Route;
use Robots\Facades\Robots;
use Spatie\Sitemap\SitemapGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('sitemap', function () {
    SitemapGenerator::create('https://www.mietwerkstatt-rossleben.de')
        ->writeToFile('sitemap.xml');

    return 'Sitemap erstellt';
});

Auth::routes();
Auth::routes(['verify' => true]);

// Profil
Route::get('/profil/{id}', 'Frontend\ProfilController@index')->name('profil.index');
Route::resource('/profil', 'Frontend\ProfilController', ['except' => ['index']]);
Route::match(['put', 'patch'], '/profil/{profil}/image', 'Frontend\ProfilController@updateImage')->name('profil.updateImage');

// Password
Route::get('/passwort-aendern', 'Frontend\ChangePasswordController@index');
Route::post('/passwort-aendern', 'Frontend\ChangePasswordController@store')->name('profil.change-password');

// Fahrzeugverkauf
Route::get('/', 'Frontend\Fahrzeuge\VerkaufController@index')->name('verkauf.index');
Route::resource('/verkauf', 'Frontend\Fahrzeuge\VerkaufController', ['except' => ['index', 'edit', 'update', 'destroy']]);
Route::post('/verkauf/anfrage', 'Frontend\FahrzeugAnfrageController@store')->name('verkauf.anfrage');
Route::get('/verkauf/pdf/{id}', 'Frontend\Fahrzeuge\PDFController@generatePDF')->name('verkauf.pdf');
Route::get('/verkauf/{id}/modell', 'Frontend\Fahrzeuge\VerkaufController@getModell');


// Fahrzeugsuche
Route::get('/suche', 'Frontend\Fahrzeuge\SearchController@index')->name('verkauf.search');
Route::get('/suche/search', 'Frontend\Fahrzeuge\SearchController@search');
Route::get('/suche/{marke}/marke', 'Frontend\Fahrzeuge\SearchController@getModell');

// Fahrzeugankauf
Route::resource('/ankauf', 'Frontend\AnkaufController', ['except' => ['show', 'create', 'edit', 'update', 'destroy']]);
Route::get('ankauf/{id}/marke', 'Frontend\AnkaufController@getModell');


// Kontakt
Route::resource('/kontakt', 'Frontend\KontaktController', ['except' => ['show', 'create', 'edit', 'update', 'destroy']]);

// Werkstatt
Route::resource('/werkstatt', 'Frontend\WerkstattController', ['except' => ['show', 'create', 'edit', 'update', 'destroy']]);

// Datenschutz
Route::get('/datenschutz', function () {
    return view('datenschutz');
});

// Impressum
Route::get('/impressum', function () {
    return view('impressum');
});

// Cookie
Route::get('/cookie', function () {
    return view('cookie');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-users')->group(function () {
    // Dashboard
    Route::get('/dashboard', function (Dashboard $dashboard) {
        return view('backend.dashboard', compact('dashboard', $dashboard));
    })->name('dashboard');

    // User Management
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/firma', 'FirmenController');

    // Fahrzeug Hersteller und Model anlegen
    Route::get('/add', 'Add\ItemsController@index')->name('add.index');
    Route::post('/add/storeMarke', 'Add\ItemsController@storeMarke')->name('add.storeMarke');
    Route::post('/add/storeModell', 'Add\ItemsController@storeModell')->name('add.storeModell');

    // Fahrzeugverkauf Backend Management
    Route::resource('/verkauf', 'Fahrzeuge\VerkaufController', ['except' => ['create', 'store', 'show']]);
    Route::match(['put', 'patch'], 'verkauf/aktiv/{verkauf}', 'Fahrzeuge\AktiveUpdateController@aktivupdate')->name('verkauf.aktivupdate');

    // Fahrzeugverkauf Backend Management > Bilder updaten und bearbeiten
    Route::get('/verkauf/{verkauf}/images', 'Fahrzeuge\ImageUpdateController@editImages')->name('verkauf.images');
    Route::get('/verkauf/{images}/image', 'Fahrzeuge\ImageUpdateController@editImage')->name('verkauf.image');
    Route::post('/verkauf/add', 'Fahrzeuge\ImageUpdateController@addsImage')->name('verkauf.adds');
    Route::match(['put', 'patch'], '/verkauf/updateImages/{images}', 'Fahrzeuge\ImageUpdateController@updateImages')->name('verkauf.updateImages');
    Route::match(['put', 'patch'], '/verkauf/previewupdate/{images}', 'Fahrzeuge\ImageUpdateController@previewupdateImages')->name('verkauf.previewupdateImages');
    Route::delete('/verkauf/images/{images}', 'Fahrzeuge\ImageUpdateController@destroy')->name('verkauf.images.destroy');

    // Fahrzeuganfrage
    Route::get('/anfrage/{anfrage}', 'Fahrzeuge\AnfrageController@show')->name('anfrage.show');
    Route::delete('/anfrage/{anfrage}', 'Fahrzeuge\AnfrageController@destroy')->name('anfrage.destroy');


});

// PDF
Route::namespace('PDF')->prefix(config('mwr.pdf.route.attributes.prefix'))->name('pdf.')->middleware(config('mwr.pdf.route.attributes.middleware'))->group(function () {
    Route::get('preisschild/{id}', 'PreisschildController@preisschild')
    ->name('pdf');
    Route::get('kaufvertrag/{id}', 'KaufvertragController@index')->name('kaufvertrag.index');
    Route::post('kaufvertrag', 'KaufvertragController@store')->name('kaufvertrag.store');
});


Route::get('robots.txt', function() {

    // If on the live server
    if (App::environment() == 'production') {
        Robots::addUserAgent('*');
        Robots::addSitemap('sitemap.xml');
    } else {
        // If you're on any other server, tell everyone to go away.
        Robots::addDisallow("/");
    }

    return response(Robots::generate(), 200)->header('Content-Type', 'text/plain');
});
