@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Reifen ')

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
                                <h2 class="dp-title-h2 prime-color mb-3">Reifen</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 mb-3 mb-lg-0">
                                <h2 class="dp-title-h2 prime-color mb-3 text-center">Angebote für Winter-, Sommer- und Ganzjahresreifen</h2>
                                <b>Für „jeden” die richtigen Reifen ...</b><br><br>
                                <p>Sie erhalten bei uns Reifen in unterschiedlichsten Größen und Profilen. Ob es ein
                                    Reifen der Größe „155“ oder ein „205er“ sein soll, Sie einen „Ventus Prime3 (K125)“
                                    oder „Vector 4Seasons“ Reifen wünschen, wir haben das Passende für Sie.</p>
                                <p>Selbst wenn wir Ihre Reifengröße nicht vorrätig haben, können wir sie kurzfristig besorgen. Wir sind dabei an keinen Reifenhersteller gebunden. Egal ob Pirelli, Dunlop oder ein anderer Hersteller - wir finden die passenden Reifen!</p>
                                <p>Unsere Reifenpreise sind Tagespreise und wir können Ihnen somit immer ein günstiges Angebot machen.</p>
                                <b>Vergleichen Sie selbst!</b>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2 class="dp-title-h2 prime-color mb-3 mt-3 mt-lg-0 text-center">AKTION</h2>
                                        <p>Beachten Sie auch unsere preiswerten Montagekosten:</p>
                                        <p>Reifenmontage inklusive Gewichte ab 6,50 € pro Stahlfelge und ab 7,50 € pro Alufelge.</p>
                                        <div class="text-right">
                                            <small>Alle Preise beinhalten die gesetzlichen MwSt.</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2 class="dp-title-h2 prime-color mb-3 mt-3 mt-lg-0 text-center">Reifenmontage</h2>
                                        <div class="text-center" style="padding: 55px 0px;">
                                            <img src="{{ url('images/preise/Reifenmontage.png') }}" title="MIETWERKSTATT ROßLEBEN: Reifenmontage" alt="MIETWERKSTATT ROßLEBEN: Reifenmontage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2" style="min-height: 400px;">
                                <h2 class="dp-title-h2 prime-color mb-3 text-center">Reifen-Hersteller</h2>
                                <div class=" d-flex justify-content-center">
                                    <img src="{{ url('images/preise/Reifenhersteller.png') }}" alt="Reifen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
