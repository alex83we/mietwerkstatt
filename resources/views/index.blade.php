@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Willkommen bei KFZ Service ')

@push('css')

@endpush

@section('content')
    <div style="background-color: #d3d3d3;">
        <div class="container">
            <div class="row">

                <div class="col-12 mb-3">

                    <div class="beschreibung">
                        <h1 class="prime-color dp-title-h1">Herzlich willkommen bei der Mietwerkstatt Rossleben</h1>
                    </div>

                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h4>Was wir ihnen bieten:</h4>
                    <p>Wir führen folgende Arbeiten an ihrem PKW durch Öl Wechsel inklusive aller Filter, Kleinarbeiten wie
                        Zündkerzen wechseln Kühlmittel prüfen und gegebenenfalls ersetzen.</p>
                    <p>Reparaturen an der elektrischen Anlage Batteriezustand prüfen, Batterie laden, Funktionen der
                        Scheinwerfer und Leuchtmittel kontrollieren gegebenenfalls ersetzen, Kabelanschlüsse und Sicherungen Prüfen,
                        Scheibenwischerblätter erneuern.</p>
                    <p>Wir vermieten unsere Hebebühne an sie damit sie ihr Auto bei uns Reparieren können und dies nicht zu
                        Hause auf der Einfahrt oder der Straße erledigen müssen.</p>
                    <p>Sollten sie Arbeiten an ihrem Kraftfahrzeug ausführen die über unsere Servicetätigkeiten hinaus
                        gehen so bieten wir ihnen wie oben erwähnt unsere Hebebühne zur Miete an.</p>
                    <p>Auch hier steht ihnen ein Mitarbeiter mit Rat und Tat zur Seite.</p>
                    <p>Wir wechseln auch ihren Reifen im Falle einer Panne oder auch zur Sommer- oder Wintersaison auf
                        Wunsch wird vor jedem wechsel auch ihr Rad gewuchtet bei uns.</p>
                    <p>Gerne tauschen wir auch ihren Alten Reifen gegen neue Reifen.</p>
                    <ul>
                        <li>KFZ-Service Arbeiten</li>
                        <li>Hebebühnen Vermietung</li>
                        <li>Öl-Service</li>
                        <li>Reifenservice</li>
                        <li>KFZ Teileverkauf</li>
                        <!-- <li>KFZ An- & Verkauf</li> -->
                    </ul>
                </div>

            </div>
        </div>
    </div>


    {{--<div style="padding-bottom: 25px;">
        <div class="container">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h4>Ein Auszug aus unserem Fahrzeugen</h4>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <!-- Start Verkaufsanzeige -->
                @if (count($verkaufen) > 0)
                    @foreach($verkaufen as $item)
                        @if($item->aktiv == true)
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <!-- Card -->
                                <div class="card shadow">
                                    <div class="fahrzeug-section-image" style="height: 320px;">
                                        @if($item->images == false)
                                            <a href="{{ route('verkauf.show', $item->slug) }}"><img src="{{ url('images/default.png') }}"
                                                 class="card-img-top p-3 img-fluid active mx-auto d-block" alt=""
                                                 style="width: 480px; height: 320px; object-fit: cover; object-position: center;">
                                            </a>
                                        @else
                                            <a href="{{ route('verkauf.show', $item->slug) }}"><img src="{{ Storage::disk('public')->url('fahrzeuge/'.$item->images) }}"
                                                 class="card-img-top p-3 img-fluid active mx-auto d-block" alt=""
                                                 style="width: 480px; height: 320px; object-fit: cover; object-position: center;">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card-body pt-0">
                                        <span class="preis">
                                          <span class="preis-value">@if ($item->preisx == 'Festpreis'){{ number_format($item->preis, 2, ',', '.'). ' €' }}@else {{ 'VB '.number_format($item->preis, 2, ',', '.'). ' €' }} @endif</span>
                                        </span>
                                        <h5 class="card-title">
                                            @if($item->anzeigetext == true)
                                                {{ \Illuminate\Support\Str::limit($item->anzeigetext, 40) }}
                                            @else
                                                {{ \Illuminate\Support\Str::limit($verkauf->marke.' '.$verkauf->modell.' Erstzulassung '.$verkauf->ez_monat.'/'.$verkauf->ez, 40) }}
                                            @endif
                                        </h5>
                                        <div class="detail">
                                            <div class="row">
                                                <div class="col">
                                                    Erstzulassung:
                                                </div>
                                                <div class="col">
                                                    {{ $item->ez_monat.'/'.$item->ez }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Kilometerstand:
                                                </div>
                                                <div class="col">
                                                    {{ number_format($item->km, '3', '.', ',').' km' }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Hubraum:
                                                </div>
                                                <div class="col">
                                                    {{ number_format($item->ccm, '0', ',', '.').' ccm' }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Leistung:
                                                </div>
                                                <div class="col">
                                                    {{ $item->kw.' kW ( '.$item->ps. ' PS)' }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Getriebe:
                                                </div>
                                                <div class="col">
                                                    {{ $item->getriebe }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Lakierung:
                                                </div>
                                                <div class="col">
                                                    {{ $item->aussenfarbe }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Kraftstoff:
                                                </div>
                                                <div class="col">
                                                    {{ $item->kraftstoff }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button_detail">
                                        <a href="{{ route('verkauf.show', $item->slug) }}">
                                            <div class="button_unten">
                                                Fahrzeug ansehen
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Aktuell stehen keine Fahrzeuge zum Verkauf.</h4>
                            </div>
                        </div>
                    </div>
                @endif

            </div><!-- row end -->
        </div><!-- Container end -->
    </div>--}}

    <div style="background-color: #d3d3d3;">
        <div class="container" style="padding-top: 25px; padding-bottom: 25px;">
            @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma)
            <div class="row">
                <div class="col-lg-12 col-xl-4 py-3" style="background-color: #ff4400; color: #ffffff;">
                    <h4 class="text-uppercase">so können sie uns erreichen.</h4>
                    <div class="pt-4 pb-2">
                            {{ $firma->firmenname }}<br>
                            {{ $firma->firmenzusatz }}<br>
                            {{ $firma->straße }}<br>
                            {{ $firma->plz.' '.$firma->ort }}<br>
                            <br>
                            {{ 'Telefon: '.$firma->telefon }}<br>
                            {{ 'Telefon: '.$firma->mobil }}<br>
                            {{ 'Telefax: '.$firma->fax }}<br>
                            <br>
{{--                            {{ 'E-Mail: '.$firma->email }}<br>--}}
                        @php
                            function no_spam($mail) {
                                $str = "";
                                $a = unpack("C*", $mail);
                                foreach ($a as $b) {
                                    $str .= sprintf("%%%X", $b);
                                }
                                return $str;
                            }

                            $mail = no_spam("info@mietwerkstatt-rossleben.de");
                            $link = "<a href=mailto:$mail style='color: #FFFFFF;'>info(at)mietwerkstatt-rossleben.de</a>";
                            echo 'E-Mail: '.$link;
                        @endphp<br>
                            {{ 'Internet: '.$firma->www }}<br>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 py-3" style="background-color: #404040; color: #ffffff">
                    <h5>Öffnungszeiten</h5>
                    <div class="pt-4 pb-2">
                        <table class="w-100">
                            <tbody>
                            <tr>
                                <td class="text-left">Montag:</td>
                                <td>{{ $firma->montag }} @if($firma->bmontag == true) </td>
                                <td class="float-right">{{ $firma->bmontag }} @endif</td>
                            </tr>
                            <tr>
                                <td class="text-left">Dienstag:
                                <td>{{ $firma->dienstag }} @if($firma->bdienstag == true)</td>
                                <td class="float-right"> {{ $firma->bdienstag }} @endif</td>
                            </tr>
                            <tr>
                                <td class="text-left">Mittwoch:
                                <td>{{ $firma->mittwoch }} @if($firma->bmittwoch == true)</td>
                                <td class="float-right"> {{ $firma->bmittwoch }} @endif</td>
                            </tr>
                            <tr>
                                <td class="text-left">Donnerstag:
                                <td>{{ $firma->donnerstag }} @if($firma->bdonnerstag == true)</td>
                                <td class="float-right"> {{ $firma->bdonnerstag }} @endif</td>
                            </tr>
                            <tr>
                                <td class="text-left">Freitag:
                                <td>{{ $firma->freitag }} @if($firma->bfreitag == true)</td>
                                <td class="float-right"> {{ $firma->bfreitag }} @endif</td>
                            </tr>
                            <tr>
                                <td class="text-left">Samstag:
                                <td>{{ $firma->samstag }} @if($firma->bsamstag == true)</td>
                                <td class="float-right"> {{ $firma->bsamstag }} @endif</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Samstags sind wir nur an geraden KW vor Ort.<br>
                                        Außerhalb der Öffnungszeiten sind Termine nach Vereinbarung möglich.</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 py-3" style="background-color: #d3d3d3">
                    <h5>Rufen Sie uns an!</h5>
                    <div class="pt-4 pb-2">
                        <table>
                            <tbody>
                            <tr>
                                <td>Verkauf:</td>
                                <td>{{ $firma->telefon }}</td>
                            </tr>
                            <tr>
                                <td>Reparaturannahme:</td>
                                <td>{{ $firma->mobil }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Außerhalb der Öffnungszeiten stehen wir ihnen Montag - Freitags von 09:00 - 19:00 Uhr telefonisch zur Verfügung.</td>
                            </tr>
                            <tr>
                                <td colspan="2">Das Büro ist Montag und Mittwoch von 15:30 - 17:00 Uhr besetzt und in jeder geraden KW Samstags von 10:00 - 13:00 Uhr</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container" style="padding-top: 25px;">
        <div class="row">

            <div class="col-lg-12 p-0">
                <iframe
                    title="Google Maps Karte mit unserer Standort Makierung."
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2494.5337647270426!2d11.4336235!3d51.3013035!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a405bfa95dab67%3A0x95ced3453404d44a!2sTh%C3%BCringer%20Tuning%20Freunde!5e0!3m2!1sde!2sde!4v1588748233099!5m2!1sde!2sde"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>

        </div>
    </div>

@endsection

@push('js')

@endpush
