@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Preise - Werkzeuge ')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="container-content" style="border: none;">
                    <div class="container-inner mb-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="dp-title-h2 prime-color mb-3">Preise - Werkzeuge</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="dp-title-h2 prime-color mb-3 d-none d-lg-inline-block">&nbsp;</h2>
                                <img src="{{ url('images/knarrenkasten.jpg') }}" alt="Werkzeuge" style="width: 510px; height: 330px; object-fit: cover; object-position: center center;">
                            </div>
                            <div class="col-lg-7">
                                <h2 class="dp-title-h2 prime-color mb-3 text-center">„Selbst schrauben” macht Spass!</h2>
                                <b>Mieten sie unsere Werkzeuge</b>
                                <br><br>
                                <p>Wenn sie mal wieder „selbst schrauben” möchten, so können Sie bei uns günstig die dazu erforderlichen Werkzeuge mieten, ohne sie sich selbst teuer kaufen zu müssen!</p>
                                <b>Wie rechnen wir ab?</b>
                                <p class="m-0">Die erste Stunde wird immer voll berechnet, danach im ¼ Stunden Takt.</p>
                                <br>
                                <b>... und als kleines Extra</b>
                                <br><br>
                                <p>Wenn sie bei uns eine <a href="{{ route('preise/hebebuehnen') }}">Hebebühne mieten</a>, ist
                                    die Nutzung unseres Werkzeugkoffers im Mietpreis enthalten: Da ist das richtige Werkzeug immer dabei. Gutes Werkzeug - gute Arbeit!</p>
                                <div class="text-right">
                                    <small>Alle Preise beinhalten die gesetzlichen MwSt.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <div class="table-responsive d-flex justify-content-center">
                                    <table class="table table-sm m-0" style="width: 451px;">
                                        <thead style="background-color: lightgrey; color: #ff4400;">
                                        <tr class="font-weight-bold text-red text-left">
                                            <th style="width: 353px; height: 24px;">Werkzeug</th>
                                            <th style="width: 123px; height: 24px;" class="text-right">pro Std.</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Schutzgasschweißgerät</td>
                                            <td class="text-right">22,00 €</td>
                                        </tr>
                                        <tr>
                                            <td>Elektroden Schweißgerät</td>
                                            <td class="text-right">18,00 €</td>
                                        </tr>
                                        <tr>
                                            <td>Elektrowerkzeuge</td>
                                            <td class="text-right">ab 1,00 €</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive d-flex justify-content-center my-4">
                                    <table class="table table-sm m-0" style="width: 451px;">
                                        <thead style="background-color: lightgrey; color: #ff4400;">
                                        <tr class="font-weight-bold text-red text-left">
                                            <th style="width: 353px; height: 24px;">Werkzeug</th>
                                            <th style="width: 123px; height: 24px;" class="text-right">pro Tag</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Motorheber</td>
                                            <td class="text-right">10,00 €</td>
                                        </tr>
                                        <tr>
                                            <td>Getriebeheber</td>
                                            <td class="text-right">6,00 €</td>
                                        </tr>
                                        <tr>
                                            <td>Federspanner</td>
                                            <td class="text-right">6,00 €</td>
                                        </tr>
                                        <tr>
                                            <td>Fettpresse ohne Fett</td>
                                            <td class="text-right">1,00 €</td>
                                        </tr>
                                        <tr>
                                            <td>Unterbodenschutzpistole</td>
                                            <td class="text-right">ab 2,00 €</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="table-responsive d-flex justify-content-center">
                                    <table class="table table-sm m-0" style="width: 451px;">
                                        <thead style="background-color: lightgrey; color: #ff4400;">
                                            <tr class="font-weight-bold text-red text-left">
                                                <th style="width: 353px; height: 24px;">Werkzeug</th>
                                                <th style="width: 123px; height: 24px;" class="text-right">pro Tag</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Kugelgelenkausdrücker</td>
                                                <td class="text-right">3,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Aufweiter-Set für Auspuffrohre</td>
                                                <td class="text-right">3,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Radlagerwerkzeug</td>
                                                <td class="text-right">10,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Bremsenrücksteller</td>
                                                <td class="text-right">6,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Hydraulikpresse inkl. Triebsatz</td>
                                                <td class="text-right">10,00 €</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-12 mb-3 mb-lg-0">
                                <p class="text-center">Weitere Preise und Werkzeuge können sie unserer <a href="{{ url('docs/preisliste.pdf') }}" target="_blank">Preisliste</a> entnehmen.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
