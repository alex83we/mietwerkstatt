@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Preise - Hebebühnen ')

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
                                <h2 class="dp-title-h2 prime-color mb-3">Preise - Hebebühnen</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <img src="{{ url('images/auto-3230876_1920.jpg') }}" alt="hebebühne" style="width: 510px; height: 330px; object-fit: cover; object-position: center center;">
                            </div>
                            <div class="col-lg-7">
                                <b>Selbst nachsehen, wie es aussieht...</b>
                                <br><br>
                                <p>Je nach Ihren Wünschen können sie die Hebebühne in unserer Werkstatt für eine
                                    Unterschiedliche Dauer mieten. Ob sie nur wenige Stunden oder auch einige Tage
                                    benötigen, wir haben für sie das richtige Angebot.</p>
                                <b>Volle Kraft...</b>
                                <br><br>
                                <p>Unsere Hebebühnen haben eine Tragkraft von max. 2500 kg.</p>
                                <b>Sonderwerkzeuge erforderlich?</b>
                                <br><br>
                                <p>Bei der Mietwerkstatt Roßleben kein Problem: Vom Schweißgerät über unseren Motorkran
                                    bis hin zum Radlagerwerkzeug - Einfach mieten statt teueres <a href="{{ url('werkzeuge') }}">Werkzeug</a> selbst zu
                                    kaufen!</p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <div class="text-center" style="padding: 55px 0px;">
                                    <img src="{{ url('images/preise/Hebebuehne.png') }}" title="MIETWERKSTATT ROßLEBEN: Hebebühne" alt="MIETWERKSTATT ROßLEBEN: Hebebühne">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="table-responsive d-flex justify-content-center">
                                    <table class="table table-sm m-0" style="width: 451px;">
                                        <thead style="background-color: lightgrey; color: #ff4400;">
                                            <tr class="font-weight-bold text-red text-left">
                                                <th style="width: 243px; height: 24px;">Hebebühnen</th>
                                                <th style="width: 83px; height: 24px;">pro Std.</th>
                                                <th style="width: 103px; height: 24px;">pro Tag a 8h</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">
                                            <tr>
                                                <td>Mo. 09:00 - 15:00 Uhr</td>
                                                <td>12,00 €</td>
                                                <td>70,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Mi. 09:00 - 15:00 Uhr</td>
                                                <td>12,00 €</td>
                                                <td>70,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Do. 09:00 - 15:00 Uhr</td>
                                                <td>12,00 €</td>
                                                <td>70,00 €</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Samstag nur in geraden Wochen</td>
                                            </tr>
                                            <tr>
                                                <td>Sa. 10:00 - 16:00 Uhr</td>
                                                <td>12,00 €</td>
                                                <td>70,00 €</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Andere Termine nach Vereinbarung</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-7 mb-3 mb-lg-0">
                                <h2 class="dp-title-h2 prime-color mb-3 text-center">Volle Tragkraft - Kleiner Preis</h2>
                                <b>Wie rechnen wir ab?</b>
                                <br><br>
                                <p class="m-0">Die erste Stunde wird immer voll berechnet, danach im ¼ Stunden Takt.</p>
                                <p>Beachten Sie auch die Sonderkonditionen für „Tagespreise”, für den Fall, das es einmal etwas länger dauert!</p>
                                <br>
                                <b>... und als kleines Extra ...</b>
                                <br><br>
                                <p>Die Nutzung unseres Werkzeugkoffer ist im Preis enthalten. Da ist das richtige Werkzeug immer dabei. Gutes Werkzeug - gute Arbeit!</p>
                                <div class="text-right">
                                    <small>Alle Preise beinhalten die gesetzlichen MwSt.</small>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="dp-title-h2 prime-color mb-3 text-center">Werkzeugwagen</h2>
                                <img src="{{ url('images/werkstattwagen-bestueckt.jpg') }}" title="MIETWERKSTATT ROßLEBEN: Werkzeug" alt="MIETWERKSTATT ROßLEBEN: Werkzeug" style="width: 510px; height: 330px; object-fit: cover; object-position: center center;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
