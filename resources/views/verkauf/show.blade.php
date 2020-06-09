@extends('layouts.main')

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel')@if($verkauf->anzeigetext == true) {{ $verkauf->anzeigetext }} @else{{ $verkauf->marke.' '.$verkauf->modell.' Erstzulassung '.$verkauf->ez_monat.'/'.$verkauf->ez }} @endif @endsection

@section('description'){!! Str::limit($verkauf->beschreibung, 160) !!}@endsection
@section('url'){{ route('verkauf.show', $verkauf->slug) }}@endsection
@if($verkauf->images == true)
@section('image'){{ Storage::disk('public')->url('fahrzeuge/'.$verkauf->images) }}@endsection
@else
@section('image'){{ asset('images/default.png') }}@endsection
@endif

@push('css')
    <link rel="stylesheet" href="{{ asset('css/fotorama.css') }}">
    <style type="text/css">
        .whatsapp {
            color: #fff !important;
            background-color: #435A64;
            border-color: #435A64;
            box-shadow: none;
            margin-bottom: 10px;
            padding: 2px 12px;
        }
        .whatsapp:hover {
            background-color: #3B4F58;
        }
    </style>
@endpush

@include('partials.social')

@section('content')
    <div class="container">
        @foreach($verkauf->fahrzeuges_ausstattung as $ausstattung)
            <div class="row mt-4 mb-4">
                <div class="col">
                    <a href="{{ url('/') }}" class="btn btn-secondary">Zurück zur Fahrzeugsuche</a>
                    <div class="beschreibung">
                        <h1 class="prime-color dp-title-h1"
                            color="#555;">
                            @if($verkauf->anzeigetext == true)
                                {{ $verkauf->anzeigetext }}
                            @else
                                {{ $verkauf->marke.' '.$verkauf->modell.' Erstzulassung '.$verkauf->ez_monat.'/'.$verkauf->ez }}
                            @endif
                        </h1>
                        <p class="dp-intern-nummer" style="line-height: 10px; margin: 0;">
                            Auftragsnummer: {{ $verkauf->id }}-{{ date('m-Y') }}</p>
                    </div>
                </div>
            </div>
            <!-- Zusammenfassung -->
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="container-content">
                        <div class="container-inner">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div id="fahrzeugGallery" class="fotorama" data-nav="thumbs" data-autoplay="true"
                                         data-allowfullscreen="native" data-height="500" data-width="100%"
                                         data-arrows="false" data-click="true"
                                         data-swipe="true" data-trackpad="true">
                                        @if($verkauf->images == false)
                                            <a href="/images/default.png"><img
                                                    src="/images/default.png"
                                                    width="200" height="150"
                                                    alt="{{ $verkauf->anzeigetext }}"></a>
                                        @else
                                            @foreach($verkauf->fahrzeuges_image as $key=>$item)
                                                <a href="{{ Storage::disk('public')->url('fahrzeuge/'.$item->images) }}"><img
                                                        src="{{ Storage::disk('public')->url('fahrzeuge/'.$item->images) }}"
                                                        width="200" height="150"
                                                        alt="{{ $verkauf->anzeigetext }}"></a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="technik-preis-container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p class="technik-preis">{{ number_format($verkauf->preis, 2, ',', '.') }} € @if ($verkauf->preisx === 'Verhandlungsbasis') VB @endif</p>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                @can('manage-users')
                                                    <a href="{{ route('backend.verkauf.edit', $verkauf->id) }}" class="btn btn-light mr-1"><i class="fas fa-edit"></i> </a>
                                                    <a href="{{ route('pdf.pdf', $verkauf->id) }}" class="btn btn-light">Preisschild</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="platzhalter"></div>-->
                                    <h2 class="dp-title-h2 prime-color">Kontakt</h2>
                                    <div style="width: 100%">
                                        <div style="display: inline-block; width: 49%;">
                                            @foreach($verkauf->fahrzeuges_kontakt as $key=>$kontakt)
                                                @if($kontakt->kontakt == '0')
                                                    <span>{{ ucfirst($kontakt->anrede) }} {{ ucfirst($kontakt->vorname) }} {{ ucfirst($kontakt->nachname) }}</span>
                                                    <br>
                                                    <span>{{ ucfirst($kontakt->strasse) }}</span>
                                                    <br>
                                                    <span>{{ ucfirst($kontakt->plz) }} {{ ucfirst($kontakt->ort) }}</span>
                                                    <br><br>
                                                    <span>Tel: <a
                                                            href="tel:{{ $kontakt->telefon }}">{{ $kontakt->telefon }}</a></span>
                                                    <br><br>
                                                    <span>Mail: <a
                                                            href="mailto:{{ $kontakt->email }}?subject=Anfrage bezüglich folgendem Fahrzeug {{$verkauf->anzeigetext.' mit der Auftragsnummer: '.$verkauf->id.'-'.date('m-Y')}}&body=Anfrage zu: {{$verkauf->marke.' '.$verkauf->modell.' Baujahr: '.$verkauf->ez_monat.'/'.$verkauf->ez}}%0D%0A%0D%0AAuftragsnummer: {{$verkauf->id.'-'.date('m-Y')}}">{{ $kontakt->email }}</a></span>
                                                    <br><br>
                                                @elseif($kontakt->kontakt == '1')
                                                    @if ($kontakt->firma == true)
                                                        <span>{{ ucfirst($kontakt->firma) }}</span><br>
                                                    @endif
                                                        <span>{{ ucfirst($kontakt->anrede) }} {{ ucfirst($kontakt->vorname) }} {{ ucfirst($kontakt->nachname) }}</span>
                                                        <br>
                                                        <span>{{ ucfirst($kontakt->strasse) }}</span>
                                                        <br>
                                                        <span>{{ ucfirst($kontakt->plz) }} {{ ucfirst($kontakt->ort) }}</span>
                                                    <br><br>
                                                    <span>Tel: <a
                                                            href="tel:{{ $kontakt->telefon }}">{{ $kontakt->telefon }}</a></span>
                                                    <br><br>
                                                    <span>Mail: <a
                                                            href="mailto:{{ $kontakt->email }}?subject=Anfrage bezüglich folgendem Fahrzeug {{$verkauf->anzeigetext.' mit der Auftragsnummer: '.$verkauf->id.'-'.date('m-Y')}}&body=Anfrage zu: {{$verkauf->marke.' '.$verkauf->modell.' Baujahr: '.$verkauf->ez_monat.'/'.$verkauf->ez}}%0D%0A%0D%0AAuftragsnummer: {{$verkauf->id.'-'.date('m-Y')}}">{{ $kontakt->email }}</a></span>
                                                    <br><br>
                                                @elseif($kontakt->kontakt == '2')
                                                    <span>Thüringer Tuning Freunde</span>
                                                    <br>
                                                    <span>Rosenstraße 2a</span>
                                                    <br>
                                                    <span>06571 Roßleben</span>
                                                    <br><br>
                                                    <span>Tel: <a href="tel:034672 / 1798-61">034672 / 1798-61</a></span>
                                                    <br>
                                                    <span>Fax: <a href="fax:034672 / 1798-61">034672 / 1798-63</a></span>
                                                    <br><br>
                                                    <span>Mail: <a href="verkauf@thüringer-tuning-freunde.de">Verkauf</a></span>
                                                    <br><br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="platzhalter"></div>
                                    <h2 class="dp-title-h2 prime-color">Technische Daten</h2>
                                    <div class="row">
                                        <div class="col">Fahrzeugart:</div>
                                        <div class="col">{{ $verkauf->fahrzeugart }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Kategorie:</div>
                                        <div class="col">{{ $verkauf->kategorie }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Erstzulassung:</div>
                                        <div class="col">{{ $verkauf->ez_monat.'/'.$verkauf->ez }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Kilometerstand:</div>
                                        <div class="col">{{ number_format($verkauf->km, 3, '.', ',') }} km</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Kraftstoff:</div>
                                        <div class="col">{{ $verkauf->kraftstoff }}</div>
                                    </div>
                                    @if($verkauf->kw == true)
                                        <div class="row">
                                            <div class="col">Leistung:</div>
                                            <div class="col">{{ $verkauf->kw }} kW ({{ $verkauf->ps }} PS)</div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col">Auftragsnummer:</div>
                                        <div class="col">{{ $verkauf->id }}-{{ date('m-Y') }}</div>
                                    </div>
                                    <div class="technik-button-container">
                                        <a href="{{ route('verkauf.pdf', $verkauf->id) }}" id="ttf-druck-off" class="btn btn-danger mb-2">Angebot ausdrucken</a>
                                        <a href="#" id="ttf-request-fahrzeuge" class="btn btn-secondary mb-2">Fahrzeuganfrage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Technische Daten -->
            <div class="row mt-4 mb-4">
                <div class="col-12">
                    <div class="container-content">
                        <div class="container-inner">
                            <h2 class="dp-title-h2 prime-color">Technische Daten</h2>
                            <div class="technik-daten-liste-container">
                                <div class="technik-daten-liste">
                                    <ul>
                                        @if($ausstattung->aussenfarbe == true)
                                            <li><b>Lackierung:</b>
                                                {{ $ausstattung->aussenfarbe }}
                                            </li>
                                        @endif
                                        @if($ausstattung->innenfarbe == true)
                                            <li><b>Innenausstattung:</b>
                                                {{ $ausstattung->innenfarbe }}
                                            </li>
                                        @endif
                                        @if($ausstattung->innenmaterial == true)
                                            <li><b>Polsterung:</b>
                                                {{ $ausstattung->innenmaterial }}
                                            </li>
                                        @endif
                                        @if($verkauf->besfahrzeug == true)
                                            <li><b>Beschädigtes Fahrzeug:</b> {{ $verkauf->besfahrzeug }}</li>
                                        @endif
                                        @if($verkauf->unfallfahrzeug == true)
                                            <li><b>Unfallfahrzeug:</b> {{ $verkauf->unfallfahrzeug }}</li>
                                        @endif
                                        @if($verkauf->fahrtauglich == true)
                                            <li><b>Fahrtauglich:</b> {{ $verkauf->fahrtauglich }}</li>
                                        @endif
                                        @if($verkauf->nichtraucher == true)
                                            <li><b>Nichtraucherfahrzeug</b></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="technik-daten-liste">
                                    <ul>
                                        @if($verkauf->kw == true and $verkauf->ps == true)
                                            <li><b>Leistung:</b> {{ $verkauf->kw .' kW ('. $verkauf->ps }} PS)</li>
                                        @endif
                                        @if($verkauf->ccm == true)
                                            <li><b>Hubraum:</b> {{ $verkauf->ccm }} cm³</li>
                                        @endif
                                        @if($verkauf->getriebe == true)
                                            <li><b>Getriebe:</b> {{ $verkauf->getriebe }}</li>
                                        @endif
                                        @if($verkauf->allrad == true)
                                            <li><b>Allradantrieb</b></li>
                                        @endif
                                        @if($verkauf->schaltwippen == true)
                                            <li><b>Schaltwippen</b></li>
                                        @endif
                                        @if($verkauf->halter == true)
                                            <li><b>Vorbesitzer:</b> {{ $verkauf->halter }}</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="technik-daten-liste">
                                    <ul>
                                        @if($verkauf->tueren == true)
                                            <li><b>Anzahl Türen:</b> {{ $verkauf->tueren }}</li>
                                        @endif
                                        @if($verkauf->scheibetueren == true)
                                            <li><b>Schiebetüren:</b> {{ $verkauf->scheibetueren }}</li>
                                        @endif
                                        @if($verkauf->sitzplaetze == true)
                                            <li><b>Anzahl Sitzplätze:</b> {{ $verkauf->sitzplaetze }}</li>
                                        @endif
                                        @if($verkauf->scheckheft == true)
                                            <li><b>Scheckheftgepflegt</b></li>
                                        @endif
                                        @if($verkauf->garantie == true)
                                            <li><b>Garantie/Werksgarantie</b></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="technik-daten-liste">
                                    <ul>
                                        <!--<li>HSN / TSN: 7593 / AGO</li>-->
                                        @if($verkauf->hu == true)
                                            <li><b>HU / AU:</b>
                                                <span> {{ $verkauf->hu }} </span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kraftstoffverbrauch -->
            @if($verkauf->schadstoffklasse == true or $verkauf->partikelfilter == true or $verkauf->umweltplakette == true or $verkauf->ssa == true or $verkauf->kraftstoff_komb == true
                or $verkauf->kraftstoff_innerorts == true or $verkauf->kraftstoff_ausserorts == true or $verkauf->co2 == true)
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="container-content">
                            <div class="container-inner">
                                <h2 class="dp-title-h2 prime-color">Kraftstoffverbrauch &amp; CO2-Emission*</h2>
                                @if($verkauf->schadstoffklasse == true)
                                    <div class="row">
                                        <div class="col">Schadstoffklase:</div>
                                        <div class="col">{{ $verkauf->schadstoffklasse }}</div>
                                    </div>
                                @endif
                                @if($verkauf->partikelfilter == true)
                                    <div class="row">
                                        <div class="col">Partikelfilter:</div>
                                        <div class="col">Ja</div>
                                    </div>
                                @endif
                                @if($verkauf->umweltplakette == true)
                                    <div class="row">
                                        <div class="col">Umweltplakette:</div>
                                        @if($verkauf->umweltplakette == '4 (Grün)')
                                            <div class="col"><img src="{{ url('images/Gruene_Plakette.png') }}" width="50px" alt="Grüne Plakette"></div>
                                        @elseif ($verkauf->umweltplakette == '3 (Gelb)')
                                            <div class="col"><img src="{{ url('images/Gelbe_Plakette.png') }}" width="50px" alt="Gelbe Plakette"></div>
                                        @elseif ($verkauf->umweltplakette == '2 (Rot)')
                                            <div class="col"><img src="{{ url('images/Rote_Plakette.png') }}" width="50px" alt="Rote Plakette"></div>
                                        @elseif ($verkauf->umweltplakette == '1 (Keine)')
                                            <div class="col">1 (Keine)</div>
                                        @endif
                                    </div>
                                @endif
                                @if($verkauf->ssa == true)
                                    <div class="row">
                                        <div class="col">Start / Stopp-Automatik</div>
                                        <div class="col">Ja</div>
                                    </div>
                                @endif
                                @if($verkauf->kraftstoff_komb == true)
                                    <div class="row">
                                        <div class="col">Kraftstoffverbrauch (komb.)</div>
                                        <div class="col">{{ $verkauf->kraftstoff_komb }} l/100km</div>
                                    </div>
                                @endif
                                @if($verkauf->kraftstoff_innerorts == true)
                                    <div class="row">
                                        <div class="col">Kraftstoffverbrauch (innerorts)</div>
                                        <div class="col">{{ $verkauf->kraftstoff_innerorts }} l/100km</div>
                                    </div>
                                @endif
                                @if($verkauf->kraftstoff_ausserorts == true)
                                    <div class="row">
                                        <div class="col">Kraftstoffverbrauch (außerorts)</div>
                                        <div class="col">{{ $verkauf->kraftstoff_ausserorts }} l/100km</div>
                                    </div>
                                @endif
                                @if($verkauf->co2 == true)
                                    <div class="row">
                                        <div class="col">CO₂-Emissionen (komb.)</div>
                                        <div class="col">{{ $verkauf->co2 }} g/km</div>
                                    </div>
                                @endif
                                <div style="padding-top: 20px; clear: both;">
                                    <p class="ttf-small-font">* Weitere Informationen zum offiziellen Kraftstoffverbrauch und zu den
                                        offiziellen spezifischen CO2-Emissionen und ggf. zum Stromverbrauch neuer Pkw können dem
                                        Leitfaden über den offiziellen Kraftstoffverbrauch, die offiziellen spezifischen
                                        CO2-Emissionen und den offiziellen Stromverbrauch neuer Pkw entnommen werden. Dieser ist an
                                        allen Verkaufsstellen und bei der Deutschen Automobil Treuhand GmbH unentgeltlich
                                        erhältlich, sowie unter <a href="https://www.dat.de" target="_blank">www.dat.de</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        <!-- Ausstattung -->
            @if($ausstattung->antiblockiersystem == true or $ausstattung->esp == true or $ausstattung->asr == true or $ausstattung->berganfahrassistent == true or $ausstattung->muedigkeitswarner == true
                or $ausstattung->spurhalteassistent == true or $ausstattung->totwinkelassistent == true or $ausstattung->innenspiegel == true or $ausstattung->nachtsicht == true
                or $ausstattung->notbremsassistent == true or $ausstattung->verkehrszeichenerkennung == true or $ausstattung->tempomat == true or $ausstattung->geschwindigkeitsbegrenzer == true or $ausstattung->abstandswarner == true
                or $ausstattung->airbag == true or $ausstattung->isofix == true or $ausstattung->isofixbeifahrer == true or $ausstattung->scheinwerfer == true or $ausstattung->Scheinwerferreinigung == true or $ausstattung->fernlicht == true or $ausstattung->fernlichtassistent == true
                or $ausstattung->tagfahrlicht == true or $ausstattung->kurvenlicht == true or $ausstattung->nebelscheinwerfer == true or $ausstattung->alarmanlage == true or $ausstattung->wegfahrsperre == true or $ausstattung->klimatisierung == true or $ausstattung->standheizung == true
                or $ausstattung->beheizbarefrontscheibe == true or $ausstattung->beheizbareslenkrad == true or $ausstattung->selbstlenkend == true or $ausstattung->vorneep == true or $ausstattung->hintenep == true or $ausstattung->kamera == true or $ausstattung->kamera_360 == true
                or $ausstattung->vornesv == true or $ausstattung->hintensh == true or $ausstattung->vorneesv == true or $ausstattung->hintenesh == true or $ausstattung->sportsitze == true or $ausstattung->armlehne == true or $ausstattung->lordosenstuetze == true or $ausstattung->massagesitze == true
                or $ausstattung->sitzbelueftung == true or $ausstattung->umklappbarerbeifahrersitz == true or $ausstattung->efensterheber == true or $ausstattung->eheckklappe == true or $ausstattung->eseitenspiegel == true or $ausstattung->zv == true or $ausstattung->szv == true
                or $ausstattung->lichtsensor == true or $ausstattung->regensensor == true or $ausstattung->servo == true  or $ausstattung->ambilight == true or $ausstattung->lederlenkrad == true or $ausstattung->tunerradio == true or $ausstattung->dab == true or $ausstattung->cd == true
                or $ausstattung->tv == true or $ausstattung->navigationssystem == true or $ausstattung->soundsystem == true or $ausstattung->touchscreen == true or $ausstattung->sprachsteuerung == true or $ausstattung->multifunktionslenkrad == true or $ausstattung->freisprecheinrichtung == true
                or $ausstattung->leichtmetallfelgen == true or $ausstattung->sommerreifen == true or $ausstattung->winterreifen == true or $ausstattung->allwetterreifen == true or $ausstattung->pannenhilfe == true or $ausstattung->reifendruckkontrolle == true
                or $ausstattung->winterpaket == true or $ausstattung->raucherpaket == true or $ausstattung->sportpaket == true or $ausstattung->sportfahrwerk == true or $ausstattung->luftfederung == true or $ausstattung->anhaengerkupplung == true or $ausstattung->gepaeckraumabtrennung == true
                or $ausstattung->skisack == true or $ausstattung->schiebedach == true or $ausstattung->panoramadach == true or $ausstattung->dachreling == true or $ausstattung->behindertengerecht == true or $ausstattung->taxi == true)
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="container-content">
                            <div class="container-inner">
                                <h2 class="dp-title-h2 prime-color">Ausstattung</h2>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                        @if($ausstattung->antiblockiersystem == true or $ausstattung->esp == true or $ausstattung->asr == true or $ausstattung->berganfahrassistent == true or $ausstattung->muedigkeitswarner == true
                                            or $ausstattung->spurhalteassistent == true or $ausstattung->totwinkelassistent == true or $ausstattung->innenspiegel == true or $ausstattung->nachtsicht == true
                                            or $ausstattung->notbremsassistent == true or $ausstattung->verkehrszeichenerkennung == true or $ausstattung->tempomat == true or $ausstattung->geschwindigkeitsbegrenzer == true or $ausstattung->abstandswarner == true)
                                            <span class="font-weight-bold prime-color">Assistenzsysteme:</span><br>
                                            @if($ausstattung->antiblockiersystem == true)
                                                <span>Antiblockiersystem</span><br>
                                            @endif
                                            @if($ausstattung->esp == true)
                                                <span>Elektronisches Stabilitätsprogramm (ESP)</span><br>
                                            @endif
                                            @if($ausstattung->asr == true)
                                                <span>Traktionskontrolle (ASR)</span><br>
                                            @endif
                                            @if($ausstattung->berganfahrassistent == true)
                                                <span>Berganfahrassistent</span><br>
                                            @endif
                                            @if($ausstattung->muedigkeitswarner == true)
                                                <span>Muedigkeitswarner</span><br>
                                            @endif
                                            @if($ausstattung->spurhalteassistent == true)
                                                <span>Spurhalteassistent</span><br>
                                            @endif
                                            @if($ausstattung->totwinkelassistent == true)
                                                <span>Totwinkelassistent</span><br>
                                            @endif
                                            @if($ausstattung->innenspiegel == true)
                                                <span>Innenspiegel autom. abblendend</span><br>
                                            @endif
                                            @if($ausstattung->nachtsicht == true)
                                                <span>Nachtsicht-Assistent</span><br>
                                            @endif
                                            @if($ausstattung->notbremsassistent == true)
                                                <span>Notbremsassistent</span><br>
                                            @endif
                                            @if($ausstattung->notrufsystem == true)
                                                <span>Notrufsystem</span><br>
                                            @endif
                                            @if($ausstattung->verkehrszeichenerkennung == true)
                                                <span>Verkehrszeichenerkennung</span><br>
                                            @endif
                                            @if($ausstattung->tempomat == true)
                                                <span>{{ $ausstattung->tempomat }}</span><br>
                                            @endif
                                            @if($ausstattung->geschwindigkeitsbegrenzer == true)
                                                <span>Geschwindigkeitsbegrenzer</span><br>
                                            @endif
                                            @if($ausstattung->abstandswarner == true)
                                                <span>Abstandswarner</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->airbag == true or $ausstattung->isofix == true or $ausstattung->isofixbeifahrer == true)
                                            <span class="font-weight-bold prime-color">Insassenschutz:</span><br>
                                            @if($ausstattung->airbag == true)
                                                <span>{{ $ausstattung->airbag }}</span><br>
                                            @endif
                                            @if($ausstattung->isofix == true)
                                                <span>Isofix (Kindersitzbefestigung)</span><br>
                                            @endif
                                            @if($ausstattung->isofixbeifahrer == true)
                                                <span>Isofix Beifahrersitz</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->scheinwerfer == true or $ausstattung->Scheinwerferreinigung == true or $ausstattung->fernlicht == true or $ausstattung->fernlichtassistent == true
                                            or $ausstattung->tagfahrlicht == true or $ausstattung->kurvenlicht == true or $ausstattung->nebelscheinwerfer == true)
                                            <span class="font-weight-bold prime-color">Licht und Sicht:</span><br>
                                            @if ($ausstattung->scheinwerfer == true)
                                                <span>{{ $ausstattung->scheinwerfer }}</span><br>
                                            @endif
                                            @if ($ausstattung->Scheinwerferreinigung == true)
                                                <span>Scheinwerferreinigung</span><br>
                                            @endif
                                            @if ($ausstattung->fernlicht == true)
                                                <span>Blendfreies Fernlicht</span><br>
                                            @endif
                                            @if ($ausstattung->fernlichtassistent == true)
                                                <span>Fernlichtassistent</span><br>
                                            @endif
                                            @if ($ausstattung->tagfahrlicht == true)
                                                <span>{{ $ausstattung->tagfahrlicht }}</span><br>
                                            @endif
                                            @if ($ausstattung->kurvenlicht == true)
                                                <span>{{ $ausstattung->kurvenlicht }}</span><br>
                                            @endif
                                            @if ($ausstattung->nebelscheinwerfer == true)
                                                <span>Nebelscheinwerfer</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->alarmanlage == true or $ausstattung->wegfahrsperre == true)
                                            <span class="font-weight-bold prime-color">Diebstahlschutz:</span><br>
                                            @if ($ausstattung->alarmanlage == true)
                                                <span>Alarmanlage</span><br>
                                            @endif
                                            @if ($ausstattung->wegfahrsperre == true)
                                                <span>Elektrische Wegfahrsperre</span><br>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                        @if($ausstattung->klimatisierung == true or $ausstattung->standheizung == true or $ausstattung->beheizbarefrontscheibe == true or $ausstattung->beheizbareslenkrad == true)
                                            <span class="font-weight-bold prime-color">Klimatisierung:</span><br>
                                            @if ($ausstattung->klimatisierung == true)
                                                <span>{{ $ausstattung->klimatisierung }}</span><br>
                                            @endif
                                            @if ($ausstattung->standheizung == true)
                                                <span>Standheizung</span><br>
                                            @endif
                                            @if ($ausstattung->beheizbarefrontscheibe == true)
                                                <span>Beheizbare Frontscheibe</span><br>
                                            @endif
                                            @if ($ausstattung->beheizbareslenkrad == true)
                                                <span>Beheizbares Lenkrad</span><br>
                                            @endif
                                        @endif
                                        <div class="mb-2"></div>
                                        @if($ausstattung->selbstlenkend == true or $ausstattung->vorneep == true or $ausstattung->hintenep == true or $ausstattung->kamera == true or $ausstattung->kamera_360 == true)
                                            <span class="font-weight-bold prime-color">Einparkhilfe:</span><br>
                                            @if ($ausstattung->selbstlenkend == true)
                                                <span>Selbstlenkende Systeme</span><br>
                                            @endif
                                            @if ($ausstattung->vorneep == true and $ausstattung->hintenep == true)
                                                <span>Akkustische Einparkhilfe: Vorne & Hinten</span><br>
                                            @elseif($ausstattung->hintenep == true)
                                                <span>Akkustische Einparkhilfe: Hinten</span><br>
                                            @elseif($ausstattung->vorneep == true)
                                                <span>Akkustische Einparkhilfe: Vorne</span><br>
                                            @endif
                                            @if ($ausstattung->kamera == true and $ausstattung->kamera_360 == true)
                                                <span>Visuelle Einparkhilfe: Kamera & 360°-Kamera</span><br>
                                            @elseif($ausstattung->kamera == true)
                                                <span>Visuelle Einparkhilfe: Kamera</span><br>
                                            @elseif($ausstattung->kamera_360 == true)
                                                <span>Visuelle Einparkhilfe: 360°-Kamera</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->vornesv == true or $ausstattung->hintensh == true or $ausstattung->vorneesv == true or $ausstattung->hintenesh == true or $ausstattung->sportsitze == true
                                             or $ausstattung->armlehne == true or $ausstattung->lordosenstuetze == true or $ausstattung->massagesitze == true or $ausstattung->sitzbelueftung == true or $ausstattung->umklappbarerbeifahrersitz == true)
                                            <span class="font-weight-bold prime-color">Sitze:</span><br>
                                            @if ($ausstattung->vornesv == true and $ausstattung->hintensh == true)
                                                <span>Sitzheizung: Vorne & Hinten</span><br>
                                            @elseif ($ausstattung->vornesv == true)
                                                <span>Sitzheizung: Vorne</span><br>
                                            @elseif ($ausstattung->hintensh == true)
                                                <span>Sitzheizung: Hinten</span><br>
                                            @endif
                                            @if ($ausstattung->vorneesv == true and $ausstattung->hintenesh == true)
                                                <span>Elektrische Sitzeinstellung: Vorne & Hinten</span><br>
                                            @elseif ($ausstattung->vorneesv == true)
                                                <span>Elektrische Sitzeinstellung: Vorne</span><br>
                                            @elseif ($ausstattung->hintenesh == true)
                                                <span>Elektrische Sitzeinstellung: Hinten</span><br>
                                            @endif
                                            @if ($ausstattung->sportsitze == true)
                                                <span>Sportsitze</span><br>
                                            @endif
                                            @if ($ausstattung->armlehne == true)
                                                <span>Armlehne</span><br>
                                            @endif
                                            @if ($ausstattung->lordosenstuetze == true)
                                                <span>Lordosenstütze</span><br>
                                            @endif
                                            @if ($ausstattung->massagesitze == true)
                                                <span>Massagesitze</span><br>
                                            @endif
                                            @if ($ausstattung->sitzbelueftung == true)
                                                <span>Sitzbelüftung</span><br>
                                            @endif
                                            @if ($ausstattung->umklappbarerbeifahrersitz == true)
                                                <span>Umklappbarer Beifahrersitz</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->efensterheber == true or $ausstattung->eheckklappe == true or $ausstattung->eseitenspiegel == true or $ausstattung->zv == true or $ausstattung->szv == true
                                            or $ausstattung->lichtsensor == true or $ausstattung->regensensor == true or $ausstattung->servo == true  or $ausstattung->ambilight == true or $ausstattung->lederlenkrad == true)
                                            <span class="font-weight-bold prime-color">Weitere Komfortausstattungen:</span><br>
                                            @if ($ausstattung->efensterheber == true)
                                                <span>Elektrische Fensterheber</span><br>
                                            @endif
                                            @if ($ausstattung->eheckklappe == true)
                                                <span>Elektrische Heckklappe</span><br>
                                            @endif
                                            @if ($ausstattung->eseitenspiegel == true)
                                                <span>Elektrische Seitenspiegel</span><br>
                                            @endif
                                            @if ($ausstattung->zv == true)
                                                <span>Zentralverriegelung</span><br>
                                            @endif
                                            @if ($ausstattung->szv == true)
                                                <span>Schlüssellose Zentralverriegelung</span><br>
                                            @endif
                                            @if ($ausstattung->lichtsensor == true)
                                                <span>Lichtsensor</span><br>
                                            @endif
                                            @if ($ausstattung->regensensor == true)
                                                <span>Regensensor</span><br>
                                            @endif
                                            @if ($ausstattung->servo == true)
                                                <span>Servolenkung</span><br>
                                            @endif
                                            @if ($ausstattung->ambilight == true)
                                                <span>Ambiente-Beleuchtung</span><br>
                                            @endif
                                            @if ($ausstattung->lederlenkrad == true)
                                                <span>Lederlenkrad</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                        @if($ausstattung->tunerradio == true or $ausstattung->dab == true or $ausstattung->cd == true or $ausstattung->tv == true or $ausstattung->navigationssystem == true or $ausstattung->soundsystem == true
                                             or $ausstattung->touchscreen == true or $ausstattung->sprachsteuerung == true or $ausstattung->multifunktionslenkrad == true or $ausstattung->freisprecheinrichtung == true)
                                            <span class="font-weight-bold prime-color">Multimedia, Bedienung und Steuerung:</span>
                                            @if ($ausstattung->tunerradio == true)
                                                <span>Tuner/Radio</span><br>
                                            @endif
                                            @if ($ausstattung->dab == true)
                                                <span>Radio DAB</span><br>
                                            @endif
                                            @if ($ausstattung->cd == true)
                                                <span>CD-Spieler</span><br>
                                            @endif
                                            @if ($ausstattung->tv == true)
                                                <span>TV</span><br>
                                            @endif
                                            @if ($ausstattung->navigationssystem == true)
                                                <span>Navigationssystem</span><br>
                                            @endif
                                            @if ($ausstattung->soundsystem == true)
                                                <span>Soundsystem</span><br>
                                            @endif
                                            @if ($ausstattung->touchscreen == true)
                                                <span>Touchscreen</span><br>
                                            @endif
                                            @if ($ausstattung->sprachsteuerung == true)
                                                <span>Sprachsteuerung</span><br>
                                            @endif
                                            @if ($ausstattung->multifunktionslenkrad == true)
                                                <span>Multifunktionslenkrad</span><br>
                                            @endif
                                            @if ($ausstattung->freisprecheinrichtung == true)
                                                <span>Freisprecheinrichtung</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->usb == true or $ausstattung->bluetooth == true or $ausstattung->androidauto == true or $ausstattung->carplay == true or $ausstattung->wlanwifi == true or $ausstattung->streaming == true or $ausstattung->induktionsladen == true)
                                            <span class="font-weight-bold prime-color">Konnektivität und Schnittstellen:</span><br>
                                            @if ($ausstattung->usb == true)
                                                <span>USB</span><br>
                                            @endif
                                            @if ($ausstattung->bluetooth == true)
                                                <span>Bluetooth</span><br>
                                            @endif
                                            @if ($ausstattung->androidauto == true)
                                                <span>Android Auto</span><br>
                                            @endif
                                            @if ($ausstattung->carplay == true)
                                                <span>Apple CarPlay</span><br>
                                            @endif
                                            @if ($ausstattung->wlanwifi == true)
                                                <span>WLAN / Wifi Hotspot</span><br>
                                            @endif
                                            @if ($ausstattung->streaming == true)
                                                <span>Musikstreaming integriert</span><br>
                                            @endif
                                            @if ($ausstattung->induktionsladen == true)
                                                <span>Induktionsladen für Smartphones</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->bordcomputer == true or $ausstattung->headup == true or $ausstattung->kombiinstrument == true)
                                            <span class="font-weight-bold prime-color">Instrumentenanzeige:</span><br>
                                            @if ($ausstattung->bordcomputer == true)
                                                <span>Boardcomputer</span><br>
                                            @endif
                                            @if ($ausstattung->headup == true)
                                                <span>Head-Up Display</span><br>
                                            @endif
                                            @if ($ausstattung->kombiinstrument == true)
                                                <span>Volldigitales Kombiinstrument</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                        @if($ausstattung->leichtmetallfelgen == true or $ausstattung->sommerreifen == true or $ausstattung->winterreifen == true or $ausstattung->allwetterreifen == true or $ausstattung->pannenhilfe == true or $ausstattung->reifendruckkontrolle == true)
                                            <span class="font-weight-bold prime-color">Reifen und Felgen:</span><br>
                                            @if($ausstattung->leichtmetallfelgen == true)
                                                <span>Leichtmetallfelgen</span><br>
                                            @endif
                                            @if($ausstattung->sommerreifen == true)
                                                <span>Sommerreifen</span><br>
                                            @endif
                                            @if($ausstattung->winterreifen == true)
                                                <span>Winterreifen</span><br>
                                            @endif
                                            @if($ausstattung->allwetterreifen == true)
                                                <span>Allwetterreifen</span><br>
                                            @endif
                                            @if($ausstattung->pannenhilfe == true)
                                                <span>Pannenhilfe</span><br>
                                            @endif
                                            @if($ausstattung->reifendruckkontrolle == true)
                                                <span>Reifendruckkontrolle</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                        @if($ausstattung->winterpaket == true or $ausstattung->raucherpaket == true or $ausstattung->sportpaket == true or $ausstattung->sportfahrwerk == true or $ausstattung->luftfederung == true
                                            or $ausstattung->anhaengerkupplung == true or $ausstattung->gepaeckraumabtrennung == true or $ausstattung->skisack == true or $ausstattung->schiebedach == true or $ausstattung->panoramadach == true
                                            or $ausstattung->dachreling == true or $ausstattung->behindertengerecht == true or $ausstattung->taxi == true)
                                            <span class="font-weight-bold prime-color">Sonderausstattung:</span><br>
                                            @if($ausstattung->winterpaket == true)
                                                <span>Winterpaket</span><br>
                                            @endif
                                            @if($ausstattung->raucherpaket == true)
                                                <span>Raucherpaket</span><br>
                                            @endif
                                            @if($ausstattung->sportpaket == true)
                                                <span>Sportpaket</span><br>
                                            @endif
                                            @if($ausstattung->sportfahrwerk == true)
                                                <span>Sportfahrwerk </span><br>
                                            @endif
                                            @if($ausstattung->luftfederung == true)
                                                <span>Luftfederung</span><br>
                                            @endif
                                            @if($ausstattung->anhaengerkupplung == true)
                                                <span>{{ $ausstattung->anhaengerkupplung }}</span><br>
                                            @endif
                                            @if($ausstattung->gepaeckraumabtrennung == true)
                                                <span>Gepäckraumabtrennung</span><br>
                                            @endif
                                            @if($ausstattung->skisack == true)
                                                <span>Skisack</span><br>
                                            @endif
                                            @if($ausstattung->schiebedach == true)
                                                <span>Schiebedach</span><br>
                                            @endif
                                            @if($ausstattung->panoramadach == true)
                                                <span>Panorama-Dach</span><br>
                                            @endif
                                            @if($ausstattung->dachreling == true)
                                                <span>Dachreling</span><br>
                                            @endif
                                            @if($ausstattung->behindertengerecht == true)
                                                <span>Behindertengerecht</span><br>
                                            @endif
                                            @if($ausstattung->taxi == true)
                                                <span>Taxi</span><br>
                                            @endif
                                            <div class="mb-2"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        <!-- Beschreibung -->
            @if($verkauf->beschreibung == true)
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="container-content">
                            <div class="container-inner">
                                <h2 class="dp-title-h2 prime-color">Beschreibung</h2>
                                <br>{!! $verkauf->beschreibung !!}<br>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Kontakt -->
            @foreach($verkauf->fahrzeuges_kontakt as $key=>$kontakt)
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="container-content">
                            <div class="container-inner">
                                <h2 class="dp-title-h2 prime-color">Kontakt / Fahrzeugstandort</h2>
                                <div style="width: 100%">
                                    <div style="display: inline-block; width: 49%;">
                                        @if($kontakt->kontakt == '0')
                                            <span class="font-weight-bold">Private Anzeige</span>
                                            <br><br>
                                            <span>{{ ucfirst($kontakt->anrede) }} {{ ucfirst($kontakt->vorname) }} {{ ucfirst($kontakt->nachname) }}</span>
                                            <br>
                                            <span>{{ ucfirst($kontakt->strasse) }}</span>
                                            <br>
                                            <span>{{ ucfirst($kontakt->plz) }} {{ ucfirst($kontakt->ort) }}</span>
                                            <br><br>
                                            <span>Tel: <a
                                                    href="tel:{{ $kontakt->telefon }}">{{ $kontakt->telefon }}</a></span>
                                            <br><br>
                                            <span>Mail: <a href="mailto:{{ $kontakt->email }}">{{ $kontakt->email }}</a></span>
                                            <br><br>
                                        @elseif($kontakt->kontakt == '1')
                                            <span class="font-weight-bold">Gewerbliche Anzeige</span>
                                            <br><br>
                                            @if($kontakt->firma == true)<span>{{ ucfirst($kontakt->firma) }}</span>
                                            <br>@endif
                                            <span>{{ ucfirst($kontakt->anrede) }} {{ ucfirst($kontakt->vorname) }} {{ ucfirst($kontakt->nachname) }}</span>
                                            <br>
                                            <span>{{ ucfirst($kontakt->strasse) }}</span>
                                            <br>
                                            <span>{{ ucfirst($kontakt->plz) }} {{ ucfirst($kontakt->ort) }}</span>
                                            <br><br>
                                            <span>Tel: <a
                                                    href="tel:{{ $kontakt->telefon }}">{{ $kontakt->telefon }}</a></span>
                                            <br><br>
                                            <span>Mail: <a href="mailto:{{ $kontakt->email }}">{{ $kontakt->email }}</a></span>
                                            <br><br>
                                        @elseif($kontakt->kontakt == '2')
                                            <span>Thüringer Tuning Freunde</span>
                                            <br>
                                            <span>Rosenstraße 2a</span>
                                            <br>
                                            <span>06571 Roßleben</span>
                                            <br><br>
                                            <span>Tel: <a href="tel:034672 / 1798-61">034672 / 1798-61</a></span>
                                            <br>
                                            <span>Fax: <a href="fax:034672 / 1798-61">034672 / 1798-63</a></span>
                                            <br><br>
                                            <span>Mail: <a href="mailto:verkauf@thüringer-tuning-freunde.de">Verkauf</a></span>
                                            <br><br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Anfrage -->
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="container-content">
                        <div class="container-inner" id="anfrage">
                            <h2 class="dp-title-h2 prime-color">Intressiert? / Senden sie eine Anfrage</h2>
                            <p>Für Ihre Anfrage benötigen wir einige Persönliche Angaben. Bitte senden sie diese Formular
                                für
                                ihre Fahrzeuganfrage ausgefült an uns, damit wir Kontakt aufnehmen können.</p>
                            <form method="POST" action="{{ route('verkauf.anfrage') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <select id="inputAnrede" class="form-control mb-2" name="anrede">
                                            <option value="Herr">Herr</option>
                                            <option value="Frau">Frau</option>
                                        </select>
                                        <input type="hidden" class="form-control mb-2" name="user_id" placeholder="Name"
                                               value="{{ $verkauf->user_id }}">
                                        <input type="hidden" class="form-control mb-2" name="betreff" placeholder="Betreff"
                                               value="{{ $verkauf->marke }} {{ $verkauf->modell }} Auftr.-Nr.: {{ $verkauf->id }}-{{ date('m-Y') }}">
                                        <input type="text" class="form-control mb-2" name="name" placeholder="Name">
                                        <input type="email" class="form-control mb-2" name="email"
                                               placeholder="E-Mail-Adresse">
                                        <input type="tel" class="form-control" name="telefon" placeholder="Telefonnummer">
                                    </div>
                                    <div class="form-group col-lg-6">
                                    <textarea class="form-control" style="height: 176px;" name="text"
                                              placeholder="Bitte kontaktieren sie uns."></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="datenschutz"
                                                   id="datenschutz" checked
                                                   value="1">
                                            <label class="form-check-label" for="datenschutz">
                                                Ich bin damit einverstanden, das meine persönlichen Daten entsprechend der
                                                deutschen
                                                <a href="/datenschutz">Datenschutzbestimmungen</a> gespeichert und
                                                verarbeitet
                                                werden.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <button class="btn btn-outline-secondary btn-block">Absenden</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if(isset($previous_record))
        <!-- Previous to Next -->
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="container-content">
                    <div class="container-inner">
                        <div class="row">
                            <div class="col-lg-6">
                                @if(isset($previous_record))
                                    <a href="{{ url($previous_record->slug) }}" class="text-decoration-none text-dark">
                                        <div class="btn-content">
                                            <div class="btn-content-title"><i class="fa fa-arrow-left"></i> {{ $previous_record->anzeigetext }}</div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                @if(isset($previous_record))
                                    <a href="{{ url($previous_record->slug) }}" class="text-decoration-none text-dark">
                                        <div class="btn-content text-right">
                                            <div class="btn-content-title">{{ $previous_record->anzeigetext }} <i class="fa fa-arrow-right"></i></div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div><!-- Container end -->

@endsection

@push('js')
    <script src="{{ asset('js/fotorama.js') }}"></script>
    <script>
        $(document).ready(function (){
            $("#ttf-request-fahrzeuge").click(function (){
                $('html, body').animate({
                    scrollTop: $("#anfrage").offset().top
                }, 2500);
            });
        });
    </script>
@endpush
