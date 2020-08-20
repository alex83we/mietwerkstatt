@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Preise - Reifendienst ')

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
                                <h2 class="dp-title-h2 prime-color mb-3">Preise - Reifendienst</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <img src="{{ url('images/pexels-andrea-piacquadio-3806252.jpg') }}" alt="Reifen" style="width: 510px; height: 253px; object-fit: cover; object-position: center center;">
                            </div>
                            <div class="col-lg-7">
                                <b>Alles rund um den Reifenwechsel ...</b>
                                <br><br>
                                <p>"Von O(ktober) bis O(stern)" und umgekehrt. Jedes Jahr erneut: Der Wechsel von Winter- auf Sommerreifen und dann wieder von Sommer- auf Winterreifen.</p>
                                <p class="m-0">Wir führen kostengünstig Reifenwechsel durch.</p>
                                <br>
                                <p>Von der Reifenmontage bis zur Altreifenentsorgung bieten wir Ihnen  umfangreiche Dienstleistungen.</p>
                                <div class="text-right">
                                    <small>Alle Preise beinhalten die gesetzlichen MwSt.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-12">
                                <div class="table-responsive d-flex justify-content-center">
                                    <table class="table table-sm m-0" style="width: 640px;">
                                        <thead style="background-color: lightgrey; color: #ff4400;">
                                            <tr class="font-weight-bold text-red text-left">
                                                <th style="width: 434px; height: 24px;">Reifendienst</th>
                                                <th style="width: 191px; height: 24px;" class="text-right">Preis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Reifendemontage bis 17 Zoll</td>
                                                <td class="text-right">Stahl 6,50 € / Alu 7,50 €</td>
                                            </tr>
                                            <tr>
                                                <td>Reifendemontage ab 18 Zoll</td>
                                                <td class="text-right">Stahl 7,50 € / Alu 8,50 €</td>
                                            </tr>
                                            <tr>
                                                <td>Reifenmontage bis 17 Zoll</td>
                                                <td class="text-right">Stahl 6,50 € / Alu 7,50 €</td>
                                            </tr>
                                            <tr>
                                                <td>Reifenmontage ab 18 Zoll</td>
                                                <td class="text-right">Stahl 7,50 € / Alu 8,50 €</td>
                                            </tr>
                                            <tr>
                                                <td>Reifenwuchten</td>
                                                <td class="text-right">Stahl 4,00 € / Alu 5,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Mietwerkstatt Roßleben Radwechsel</td>
                                                <td class="text-right">0,5 Std. 10,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Kompletträder zur Saison umstecken/Montieren am Fahrzeug</td>
                                                <td class="text-right">ab 15,00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Altreifenentsorgung</td>
                                                <td class="text-right">pro Rad ab 3,50 €</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-12">
                                <p>Preise gelten pro Rad inkl. Gummiventil in verschiedenen Längen / Metallventile auf Anfrage. Mehrkosten bei Niederquerschnittstreifen / mehr als 50 Gramm pro Rad.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
