@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

@section('titel', 'Dashboard')

@push('css')
    <style type="text/css">
        .custom-radio {
            padding-top: 5px;
        }

        #zustandinspektion, #antriebumwelt, #Individualisierung, #Details, #Sicherheit, #komfort, #infotainment, #extras {
            display: none;
        }

        .card .card-title {
            color: rgb(255, 70, 0) !important;
            font-weight: bold !important;
            font-size: 24px !important;
            float: none;
        }

        .card-title {
            margin-bottom: 0.75rem !important;
        }
    </style>
@endpush

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Aktuelles Fahrzeug: {{ $verkauf->marke.' '.$verkauf->modell }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
{{--            {{ Breadcrumbs::render('verkaufEdit', $verkauf) }}--}}
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <section class="content">

        <div class="container-fluid">

            <form action="{{ route('backend.verkauf.update', $verkauf->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="verkauf_id" value="{{ $verkauf->id }}">

                <div class="card shadow">

                    <div class="card-header bg-dark text-light">
                        <h3 class="mb-0" id="ueberschrift">Fahrzeugdaten (1/3)</h3>
                    </div>

                    <div class="card-body">
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                 id="progressBar" style="width: 0%; background: #ff4600">
                            </div>
                        </div>
                        <div id="fahrzeugdaten">
                            <h4 class="card-title" id="basisdaten">Basisdaten</h4>

                            <!-- Dein Fahrzeug -->
                            <div id="deinfahrzeug">
                                <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-2">Dein
                                    Fahrzeug</h6>
                                <div class="form-row">
                                    <div class="form-group col-md-4 mt-2">
                                        <label for="selectMarke" class="font-weight-bold">Marke <span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="form-control form-control-sm @error('marke') {{ 'Bitte wählen sie einen Fahrzeughersteller aus!' }} is-invalid @enderror"
                                            id="selectMarke" disabled>
                                            {{--                                                    <option value="{{ $verkauf->marke }}" selected>{{ 'Dein Fahrzeug: '.$verkauf->marke }}</option>--}}
                                            @foreach($marke as $item)
                                                <option value="{{ $item->marke }}" @if ($verkauf->marke == $item->marke){{ 'selected=selected' }}@endif>{{ $item->marke }}</option>
                                            @endforeach
                                            @foreach($marken as $item)
                                            <input type="hidden" name="marke" value="{{ $item->marke }}">
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 mt-2">
                                        <label for="selectModell" class="font-weight-bold">Modell <span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="form-control form-control-sm @error('modell') {{ 'Bitte wählen sie eine Fahrzeugmarke aus!' }} is-invalid @enderror"
                                            name="modell" id="selectModell">
                                            {{--                                                    <option value="{{ $verkauf->modell }}">{{ 'Dein Fahrzeugmodell: '.$verkauf->modell }}</option>--}}
                                            @foreach($modell as $item)
                                                <option value="{{ $item->modell }}" @if ($verkauf->modell == $item->modell){{'selected=selected'}}@endif>{{ $item->modell }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="selectMonat" class="font-weight-bold">Erstzulassung <span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="form-control form-control-sm @error('ez_monat') {{ 'Bitte geben sie ihre Erstzulassung an!' }} is-invalid @enderror"
                                            name="ez_monat" id="selectMonat">
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option
                                                    value="{{ str_pad($i, 2, 0, STR_PAD_LEFT) }}" {{ $verkauf->ez_monat[0].''.$verkauf->ez_monat[1] == str_pad($i, 2, 0, STR_PAD_LEFT) ? 'selected=selected' : '' }}>{{ str_pad($i, 2, 0, STR_PAD_LEFT) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="selectJahr" class="font-weight-bold">&nbsp;</label>
                                        <select
                                            class="form-control form-control-sm @error('ez_jahr') {{ 'Bitte geben sie ihre Erstzulassung an!' }} is-invalid @enderror"
                                            name="ez" id="selectJahr">
                                            @for ($i = date('Y'); $i >= 1975; $i--)
                                                <option
                                                    value="{{ str_pad($i, 4, 0, STR_PAD_LEFT) }}" {{ $verkauf->ez[0].''.$verkauf->ez[1].''.$verkauf->ez[2].''.$verkauf->ez[3] == str_pad($i, 4, 0, STR_PAD_LEFT) ? 'selected=selected' : '' }}>{{ str_pad($i, 4, 0, STR_PAD_LEFT) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputKM" class="font-weight-bold">Kilometerstand <span
                                                class="text-danger">*</span>
                                            <button type="button" class="btn btn-link myPopover"
                                                    style="color: #cccccc; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover" data-placement="right"
                                                    title="Kilometerstand"
                                                    data-trigger="focus"
                                                    data-content="Bitte gib die tatsächliche Gesamtlaufleistung des Fahrzeugs an. Bei einem Austauschmotor ist nicht dessen Kilometerstand relevant, sondern die Laufleistung des Fahrzeugs! Gibt es Hinweise, dass die Gesamtlaufleistung nicht mit dem angezeigten Kilometerstand übereinstimmt, erwähne dies bitte im Feld 'Beschreibung'.">
                                                <i class="fas fa-info-circle" style="color: #ff4600;"></i>
                                            </button> <small>(bitte ohne punkt oder komma eingeben)</small>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <input type="text"
                                                   class="form-control form-control-sm border-right-0 @error('km') {{ 'Bitte geben sie ihren aktuellen Kilometerstand an!' }} is-invalid @enderror"
                                                   name="km" id="inputKM" placeholder="Kilometerstand" value="{{ $verkauf->km }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text border-left-0 bg-transparent">KM</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="selectKraftstoff" class="font-weight-bold">Kraftstoff <span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="form-control form-control-sm @error('kraftstoff') {{ 'Bitte wählen sie den Kraftstoff aus!' }} is-invalid @enderror"
                                            name="kraftstoff" onchange="einblenden(kraftstoff)" id="selectKraftstoff">
                                            <option value="{{ $verkauf->kraftstoff }}" selected>{{ $verkauf->kraftstoff }}</option>
                                            @foreach($kraftstoff as $item)
                                                <option
                                                    value="{{ $item->kraftstoff }}"  {{ old('kraftstoff') == $item->kraftstoff ? 'selected=selected' : '' }}>{{ $item->kraftstoff }}</option>
                                            @endforeach
                                        </select>
                                        <div id="kraftstoffAndere" style="display: none;">
                                            <input type="text" class="form-control form-control-sm" name="kraftstoffAndere" id="andere">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="selectKategorie" class="font-weight-bold">Kategorie <span
                                                class="text-danger">*</span>
                                            <button type="button" class="btn btn-link myPopover"
                                                    style="color: #cccccc; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover" data-placement="right" title="Kategorie"
                                                    data-trigger="focus"
                                                    data-content="Die Angabe der Fahrzeug-Kategorie hilft Interessenten, Dein Fahrzeug besser zu finden.">
                                                <i class="fas fa-info-circle" style="color: #ff4600;"></i>
                                            </button>
                                        </label>
                                        <select
                                            class="form-control form-control-sm @error('kategorie') {{ 'Bitte wählen sie die Kategorie aus!' }} is-invalid @enderror"
                                            name="kategorie" id="selectKategorie">
                                            <option value="{{ $verkauf->kategorie }}" selected>{{ $verkauf->kategorie }}</option>
                                            @foreach($kategorie as $item)
                                                <option
                                                    value="{{ $item->kategorie }}" {{ old('kategorie') == $item->kategorie ? 'selected=selected' : '' }}>{{ $item->kategorie }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="selectTüren" class="font-weight-bold">Türen</label>
                                        <select class="form-control form-control-sm" name="tueren" id="selectTüren">
                                            <option value="{{ $verkauf->tueren }}" selected>{{ $verkauf->tueren }}</option>
                                            <option value="2/3" {{ old('tueren') == '2/3' ? 'selected=selected' : '' }}>2/3</option>
                                            <option value="4/5" @if (old('tueren') == '4/5'){{'selected=selected'}}@elseif(old('tueren') == false){{''}}@endif>4/5</option>
                                            <option value="6/7" {{ old('tueren') == '6/7' ? 'selected=selected' : '' }}>6/7</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="selectSchiebetüren"
                                               class="font-weight-bold">Schiebetüren</label>
                                        <select class="form-control form-control-sm" name="scheibetueren"
                                                id="selectSchiebetüren">
                                            <option value="0" {{ $verkauf->scheibetueren == '0' ? 'selected=selected' : '' }}>Keine</option>
                                            <option value="Schiebetür beidseitig" {{ $verkauf->scheibetueren == 'Schiebetür beidseitig' ? 'selected=selected' : '' }}>Schiebetür beidseitig</option>
                                            <option value="Schiebetür links" {{ $verkauf->scheibetueren == 'Schiebetür links' ? 'selected=selected' : '' }}>Schiebetür links</option>
                                            <option value="Schiebetür rechts" {{ $verkauf->scheibetueren == 'Schiebetür rechts' ? 'selected=selected' : '' }}>Schiebetür rechts</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputSitzplaetze" class="font-weight-bold">Sitzplätze</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-orange" id="minus-sitz"><i
                                                        class="fa fa-minus"></i></button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center"
                                                   name="sitzplaetze" id="inputSitzplaetze" value="{{ $verkauf->sitzplaetze }}" min="1">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-orange" id="plus-sitz"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dein Fahrzeug Button -->
                                <hr style="border-bottom: 1px solid #ff4600;">
                                <div class="form-row mt-2">
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-secondary btn-block"
                                                style="display: none;"><i class="fa fa-angle-left"></i> Zurück
                                        </button>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-orange btn-block"
                                                id="nextAntriebumwelt">Weiter <i class="fa fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Dein Fahrzeug Button Ende -->

                            </div>
                            <!-- Dein Fahrzeug Ende -->

                            <!-- Antrieb $ Umwelt -->
                            <div id="antriebumwelt">
                                <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-2">Antrieb
                                    & Umwelt</h6>
                                <div class="form-row">
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="inputKW" class="font-weight-bold">Motorleistung <span
                                                class="text-danger">*</span>
                                            <button type="button" class="btn btn-link myPopover"
                                                    style="color: #cccccc; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover" data-placement="right"
                                                    title="Motorleistung"
                                                    data-trigger="focus"
                                                    data-content="Die Leistung in kW findest Du im Fahrzeugschein im Feld P.2 ('Nennleistung in kW').">
                                                <i class="fas fa-info-circle" style="color: #ff4600;"></i>
                                            </button>
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('kw') {{ 'Bitte geben sie ihre Motorleistung in KW an!' }} is-invalid @enderror"
                                               name="kw" id="inputKW" placeholder="Motorleistung" value="{{ $verkauf->kw }}">
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="inputHubraum" class="font-weight-bold">Hubraum <span
                                                class="text-danger">*</span>
                                            <button type="button" class="btn btn-link myPopover"
                                                    style="color: #cccccc; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover" data-placement="right" title="Hubraum"
                                                    data-trigger="focus"
                                                    data-content="Bitte gib den Hubraum in cm³ an. Diese Information findest Du im Fahrzeugschein auf Seite 2, Punkt 8.">
                                                <i class="fas fa-info-circle" style="color: #ff4600;"></i>
                                            </button>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <input type="text"
                                                   class="form-control form-control-sm border-right-0 @error('ccm') {{ 'Bitte geben sie ihren aktuellen Kilometerstand an!' }} is-invalid @enderror"
                                                   name="ccm" id="inputHubraum" placeholder="Hubraum" value="{{ $verkauf->ccm }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text border-left-0 bg-transparent">cm³</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mt-2">
                                        <label for="selectGetriebe" class="font-weight-bold">Getriebe <span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="form-control form-control-sm @error('getriebe') {{ 'Bitte wählen sie den Getriebe aus!' }} is-invalid @enderror"
                                            name="getriebe" id="selectGetriebe">
{{--                                            <option value="0" selected >{{ $verkauf->getriebe }}</option>--}}
                                            @foreach($getriebe as $item)
                                                <option value="{{ $item->getriebe }}" {{ old('getriebe') == $item->getriebe ? 'selected=selected' : '' }}>{{ $item->getriebe }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 mt-2">
                                        <div class="custom-control custom-checkbox custom-control-inline p-1"
                                             style="margin-top: 30px;">
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="allradantrieb" id="checkAllradantrieb" value="Allradantrieb" @if($verkauf->allrad) checked @endif>
                                                <label class="custom-control-label" for="checkAllradantrieb">Allradantrieb</label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="schaltwippen" id="checkSchaltwippen"
                                                       value="Schaltwippen"
                                                       @if ($verkauf->schaltwippen) checked @endif>
                                                <label class="custom-control-label" for="checkSchaltwippen">Schaltwippen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6 style="border-bottom: 1px solid rgba(0,0,0,0.1); font-size: 16px;" class="mt-2">
                                    Umwelt & Verbrauch</h6>
                                <div class="form-row">
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="selectSchadstoffklasse" class="font-weight-bold">Schadstoffklasse
                                            <span class="text-danger">*</span></label>
                                        <select
                                            class="form-control form-control-sm @error('schadstoffklasse') {{ 'Bitte wählen sie die Schadstoffklasse aus!' }} is-invalid @enderror"
                                            name="schadstoffklasse" id="selectSchadstoffklasse">
                                            <option value="0" selected disabled>Bitte Schadstoffklasse auswählen
                                            </option>
                                            @foreach($schadstoffklasse as $item)
                                                <option value="{{ $item->schadstoffklasse }}" {{ $item->schadstoffklasse ? 'selected=selected' : '' }}>{{ $item->schadstoffklasse }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="selectUmweltplakette" class="font-weight-bold">Umweltplakette
                                            <span class="text-danger">*</span></label>
                                        <select
                                            class="form-control form-control-sm @error('umweltplakette') {{ 'Bitte wählen sie die Umweltplakette aus!' }} is-invalid @enderror"
                                            name="umweltplakette" id="selectUmweltplakette">
                                            <option value="0" selected disabled>Bitte Umweltplakette auswählen
                                            </option>
                                            @foreach($umweltplakette as $item)
                                                <option value="{{ $item->umweltplakette }}" {{ $item->umweltplakette ? 'selected=selected' : '' }}>{{ $item->umweltplakette }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="inputKraftstoffverbrauch(komb.)" class="font-weight-bold">Kraftstoffverbrauch</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm border-right-0"
                                                   name="kraftstoffverbrauch_komb" value="{{ $verkauf->kraftstoff_komb }}"
                                                   id="inputKraftstoffverbrauch(komb.)" placeholder="kombiniert">
                                            <div class="input-group-append">
                                                <div class="input-group-text border-left-0 bg-transparent">l/100
                                                    km
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="inputKraftstoffverbrauch(innerorts.)" class="font-weight-bold">&nbsp;</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm border-right-0"
                                                   name="kraftstoffverbrauch_innerorts" value="{{ $verkauf->kraftstoff_innerorts }}"
                                                   id="inputKraftstoffverbrauch(innerorts.)"
                                                   placeholder="innerorts">
                                            <div class="input-group-append">
                                                <div class="input-group-text border-left-0 bg-transparent">l/100
                                                    km
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="inputKraftstoffverbrauch(ausserorts.)" class="font-weight-bold">&nbsp;</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm border-right-0"
                                                   name="kraftstoffverbrauch_ausserorts" value="{{ $verkauf->kraftstoff_ausserorts }}"
                                                   id="inputKraftstoffverbrauch(ausserorts.)"
                                                   placeholder="außerorts">
                                            <div class="input-group-append">
                                                <div class="input-group-text border-left-0 bg-transparent">l/100
                                                    km
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="inputCO₂-Emissionen" class="font-weight-bold">CO₂-Emissionen
                                            (komb.)</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm border-right-0"
                                                   name="co₂emissionen" id="inputCO₂-Emissionen" placeholder="" value="{{ $verkauf->co2 }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text border-left-0 bg-transparent">g/km
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="custom-control custom-checkbox custom-control-inline p-1">
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="partikelfilter" id="checkPartikelfilter"
                                                       value="Partikelfilter"
                                                       @if ($verkauf->partikelfilter) checked @endif>
                                                <label class="custom-control-label" for="checkPartikelfilter">Partikelfilter
                                                    <button type="button" class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover"
                                                            data-placement="right" title="Partikelfilter"
                                                            data-trigger="focus"
                                                            data-content="Auch: Dieselpartikelfilter (DPF), Rußpartikelfilter, FAP-Rußpartikelfilter usw.">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="ssa"
                                                       id="checkSSA" value="Start / Stopp-Automatik"
                                                       @if ($verkauf->ssa) checked @endif>
                                                <label class="custom-control-label" for="checkSSA">Start /
                                                    Stopp-Automatik</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Antrieb $ Umwelt Button -->
                                <hr style="border-bottom: 1px solid #ff4600;">
                                <div class="form-row mt-2">
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-secondary btn-block"
                                                id="backDeinfahrzeug"><i class="fa fa-angle-left"></i> Zurück
                                        </button>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-orange btn-block"
                                                id="nextZustandinspektion">Weiter <i class="fa fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Antrieb $ Umwelt Button Ende -->

                            </div>
                            <!-- Antrieb $ Umwelt Ende -->

                            <!-- Zustand & Inspektion -->
                            <div id="zustandinspektion">
                                <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-2">Zustand
                                    & Inspektion</h6>
                                <h6 style="border-bottom: 1px solid rgba(0,0,0,0.1); font-size: 16px;" class="mt-3">
                                    Fahrzeughistorie</h6>
                                <div class="form-row">
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="inputFahrzeughalter" class="font-weight-bold">Fahrzeughalter
                                            <button type="button" class="btn btn-link myPopover"
                                                    style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover" data-placement="right"
                                                    title="Anzahl der Fahrzeughalter"
                                                    data-trigger="focus"
                                                    data-content="Wähle hier die Anzahl aller eingetragenen Fahrzeughalter aus, einschließlich Dir selbst.">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-orange" id="minus-btn"><i
                                                        class="fa fa-minus"></i></button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center"
                                                   name="fahrzeughalter" id="inputFahrzeughalter"
                                                   placeholder="Fahrzeughalter" value="@if ($verkauf->halter == true){{$verkauf->halter}}@else{{ 1 }}@endif" min="1">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-orange" id="plus-btn"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="selectFahrzeugart" class="font-weight-bold">Fahrzeugart
                                            <button type="button" class="btn btn-link myPopover"
                                                    style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover" data-placement="right" title="Fahrzeugart"
                                                    data-trigger="focus"
                                                    data-content="Ein Jahreswagen darf max. 15 Monate alt sein, höchstens 13 Monate ununterbrochen zugelassen und auf nur einen Besitzer zugelassen gewesen sein. Ein Oldtimer muss die Voraussetzungen für ein H-Kennzeichen erfüllen. Ein Vorführwagen ist ein Gebrauchtfahrzeug, das auf einen Händler zugelassen ist und ausschließlich Vorführzwecken dient.">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                        </label>
                                        <select class="form-control form-control-sm" name="fahrzeugart"
                                                id="selectFahrzeugart">
                                            <option value="Gebrauchtwagen"  {{ old('fahrzeugart') == 'Gebrauchtwagen' ? 'selected=selected' : '' }}>Gebrauchtwagen</option>
                                            <option value="Neuwagen" {{ old('fahrzeugart') == 'Neuwagen' ? 'selected=selected' : '' }}>Neuwagen</option>
                                            <option value="Jahreswagen" {{ old('fahrzeugart') == 'Jahreswagen' ? 'selected=selected' : '' }}>Jahreswagen</option>
                                            <option value="Oldtimer" {{ old('fahrzeugart') == 'Oldtimer' ? 'selected=selected' : '' }}>Oldtimer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="radioBesFahrzeug" class="font-weight-bold w-100">Beschädigtes
                                            Fahrzeug</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioBesFahrzeugJa" name="besfahrzeug"
                                                   value="Ja" @if ($verkauf->fbesfahrzeug){{ $verkauf->besfahrzeug == 'Ja' ? 'checked' : '' }}@else {{'checked'}} @endif
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="radioBesFahrzeugJa">Ja</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioBesFahrzeugNein" name="besfahrzeug"
                                                   value="Nein" @if ($verkauf->fbesfahrzeug){{ $verkauf->besfahrzeug == 'Nein' ? 'checked' : '' }}@else {{'checked'}} @endif class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="radioBesFahrzeugNein">Nein</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="radioUnfallfahrzeug" class="font-weight-bold w-100">Unfallfahrzeug</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioUnfallfahrzeugJa" name="unfallfahrzeug"
                                                   value="Ja" @if ($verkauf->unfallfahrzeug){{ $verkauf->unfallfahrzeug == 'Ja' ? 'checked' : '' }}@else {{'checked'}} @endif class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="radioUnfallfahrzeugJa">Ja</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioUnfallfahrzeugNein" name="unfallfahrzeug"
                                                   value="Nein" @if ($verkauf->unfallfahrzeug){{ $verkauf->unfallfahrzeug == 'Nein' ? 'checked' : '' }}@else {{'checked'}} @endif class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="radioUnfallfahrzeugNein">Nein</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="radioFahrtauglich"
                                               class="font-weight-bold w-100">Fahrtauglich</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioFahrtauglichJa" name="fahrtauglich"
                                                   value="Ja" @if ($verkauf->fahrtauglich){{ $verkauf->fahrtauglich == 'Ja' ? 'checked' : '' }}@else {{'checked'}} @endif class="custom-control-input">
                                            <label class="custom-control-label" for="radioFahrtauglichJa">Ja</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioFahrtauglichNein" name="fahrtauglich"
                                                   value="Nein" @if ($verkauf->fahrtauglich){{ $verkauf->fahrtauglich == 'Nein' ? 'checked' : '' }}@else {{'checked'}} @endif class="custom-control-input">
                                            <label class="custom-control-label"
                                                   for="radioFahrtauglichNein">Nein</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mt-2">
                                        <div class="custom-control custom-checkbox custom-control-inline p-1"
                                             style="margin-top: 30px;">
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="nichtraucherfahrzeug" id="checkNichtraucherfahrzeug"
                                                       value="Nichtraucherfahrzeug"
                                                       @if ($verkauf->nichtraucher) checked @endif>
                                                <label class="custom-control-label" for="checkNichtraucherfahrzeug">Nichtraucherfahrzeug</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6 style="border-bottom: 1px solid rgba(0,0,0,0.1); font-size: 16px;" class="mt-2">
                                    Wartung & Inspektion</h6>
                                <div class="form-row">
                                    <div class="form-group col-md-2 mt-2">
                                        <label for="selectMonatHU" class="font-weight-bold">HU gültig bis @if ($verkauf->hu == 'HU Neu') @elseif($verkauf->hu == 'Keine HU') @elseif($verkauf->hu == 'aendern') @else <small style="font-size: 10px;">{{ 'Deine Angabe zur HU: ( '.$verkauf->hu.' )' }}</small> @endif</label>
                                        <select class="form-control form-control-sm" name="hu"
                                                id="selectMonatHU" onchange="einblenden()">
                                            <option value="{{ $verkauf->hu }}" selected>{{ $verkauf->hu }}</option>
                                            <option value="aendern">Ändern</option>
                                        </select>
                                        <div id="huAendern" style="display: none;">
                                            <input type="text" class="form-control form-control-sm" name="huAendern" id="aendern" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/yyyy" data-mask>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mt-2">
                                        <div class="custom-control custom-checkbox custom-control-inline p-1"
                                             style="margin-top: 30px;">
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="huabgelaufen" id="checkHUabgelaufen"
                                                       value="Keine HU"
                                                       @if ($verkauf->hu == 'Keine HU') checked @endif>
                                                <label class="custom-control-label" for="checkHUabgelaufen">Keine HU</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline p-1"
                                             style="margin-top: 30px;">
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="huneu" id="checkHUneu"
                                                       value="HU Neu"
                                                       @if ($verkauf->hu == 'HU Neu') checked @endif>
                                                <label class="custom-control-label" for="checkHUneu">HU Neu</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 mt-2">
                                        <div class="custom-control custom-checkbox custom-control-inline p-1"
                                             style="margin-top: 30px;">
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="scheckheft" id="checkScheckheftgepflegt"
                                                       value="Scheckheftgepflegt"
                                                       @if ($verkauf->scheckheft) checked @endif>
                                                <label class="custom-control-label" for="checkScheckheftgepflegt">Scheckheftgepflegt
                                                    <button type="button" class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover"
                                                            data-placement="right" title="Scheckheftgepflegt"
                                                            data-trigger="focus"
                                                            data-content="Das Scheckheft dokumentiert die intervallmäßigen Inspektionen und Wartungsarbeiten. Ein vollständiges Scheckheft ist daher ein Nachweis für die regelmäßige Wartung des Fahrzeugs.">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="garantie"
                                                       id="checkGarantie/Werksgarantie"
                                                       value="Garantie/Werksgarantie"
                                                       @if ($verkauf->garantie) checked @endif>
                                                <label class="custom-control-label"
                                                       for="checkGarantie/Werksgarantie">Garantie/Werksgarantie
                                                    <button type="button" class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover" data-placement="right"
                                                            title="Garantie/Werksgarantie"
                                                            data-trigger="focus"
                                                            data-content="Bitte beachte: Auf eine bereits laufende – und damit verkürzte – Herstellergarantie (z. B. bei Tageszulassungen), musst Du nach aktueller Rechtsprechung ausdrücklich in der Fahrzeugbeschreibung hinweisen.">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Zustand & Inspektion Button -->
                                <hr style="border-bottom: 1px solid #ff4600;">
                                <div class="form-row mt-2">
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-secondary btn-block"
                                                id="backAntriebumwelt"><i class="fa fa-angle-left"></i> Zurück
                                        </button>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-orange btn-block"
                                                id="nextIndividualisierung">Weiter <i class="fa fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Zustand & Inspektion Button Ende -->

                            </div>
                            <!-- Zustand & Inspektion Ende -->
                        </div>

                        @foreach($verkauf->fahrzeuges_ausstattung as $key=>$ausstattung)
                            <div id="Ausstattung">

                                <!-- Individualisierung -->
                                <div id="Individualisierung">

                                    <h4 class="card-title">Individualisierung</h4>

                                    <!-- Individualisierung  -->
                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Farbe</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 mt-2">
                                            <label for="selectAussenfarbe" class="font-weight-bold">Aussenfarbe</label>
                                            <select class="form-control form-control-sm" name="aussenfarbe" onchange="einblenden()"
                                                    id="selectAussenfarbe">
                                                @foreach($farbe as $item)
                                                    <option value="{{ $item->aussenfarbe }}" {{ $ausstattung->aussenfarbe == $item->aussenfarbe ? 'selected=selected' : '' }}>{{ $item->aussenfarbe }}</option>
                                                @endforeach
                                                <option value="andere">Andere</option>
                                            </select>
                                            <div id="aussenfarbeAndere" style="display: none;">
                                                <input type="text" class="form-control form-control-sm" name="aussenfarbeAndere" id="andere">
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline p-1">
                                                <div class="form-check custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox" name="metallic"
                                                           id="checkMetallic" value="1"
                                                           @if ($ausstattung->metallic == '1') checked @endif>
                                                    <label class="custom-control-label"
                                                           for="checkMetallic">Metallic</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 mt-2">
                                            <label for="selectInnenausstattung" class="font-weight-bold">Farbe der
                                                Innenausstattung</label>
                                            <select class="form-control form-control-sm" name="innenfarbe" onchange="einblenden()"
                                                    id="selectInnenausstattung">
                                                @foreach($farbeInnen as $item)
                                                    <option
                                                        value="{{ $item->innenfarbe }}" {{ $ausstattung->innenfarbe == $item->innenfarbe ? 'selected=selected' : '' }}>{{ $item->innenfarbe }}</option>
                                                @endforeach
                                                <option value="andere">Andere</option>
                                            </select>
                                            <div id="innenfarbeAndere" style="display: none;">
                                                <input type="text" class="form-control form-control-sm" name="innenfarbeAndere" id="andere">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 mt-2">
                                            <label for="selectMaterialInnen" class="font-weight-bold">Material der
                                                Innenausstattung
                                            </label>
                                            <select class="form-control form-control-sm" name="innenmaterial" onchange="einblenden()"
                                                    id="selectMaterialInnen">
                                                <option value="0" selected>Bitte Material wählen</option>
                                                @foreach($materialInnen as $item)
                                                    <option
                                                        value="{{ $item->innenmaterial }}" {{ $ausstattung->innenmaterial == $item->innenmaterial ? 'selected=selected' : '' }}>{{ $item->innenmaterial }}</option>
                                                @endforeach
                                                <option value="andere">Andere</option>
                                            </select>
                                            <div id="innenmaterialAndere" style="display: none;">
                                                <input type="text" class="form-control form-control-sm" name="innenmaterialAndere" id="andere">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Individualisierung Button -->
                                    <hr style="border-bottom: 1px solid #ff4600;">
                                    <div class="form-row mt-2">
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-secondary btn-block"
                                                    id="backFahrzeugdaten"><i class="fa fa-angle-left"></i> Zurück
                                            </button>
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-orange btn-block"
                                                    id="nextSicherheit">Weiter <i class="fa fa-angle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Individualisierung Button Ende -->

                                    <!-- Individualisierung Ende -->
                                </div>
                                <!-- Individualisierung Ende -->

                                <!-- Sicherheit -->
                                <div id="Sicherheit">
                                    <h4 class="card-title">Sicherheit</h4>

                                    <!-- Sicherheit  -->
                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Assistenzsysteme</h6>
                                    <div class="form-group col-md-12 pl-0">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox"
                                                   name="antiblockiersystem" id="checkAntiblockiersystem"
                                                   value="1"
                                                   @if ($ausstattung->antiblockiersystem == '1') checked @endif>
                                            <label class="custom-control-label" for="checkAntiblockiersystem">Antiblockiersystem</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="esp"
                                                   id="checkElektronischesStabilitätsprogramm(ESP)"
                                                   value="1"
                                                   @if ($ausstattung->esp == '1') checked @endif>
                                            <label class="custom-control-label"
                                                   for="checkElektronischesStabilitätsprogramm(ESP)">Elektronisches
                                                Stabilitätsprogramm (ESP)
                                                <button type="button" class="btn btn-link myPopover"
                                                        style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                        data-toggle="popover" data-placement="right"
                                                        title="Elektronisches Stabilitätsprogramm (ESP) "
                                                        data-trigger="focus"
                                                        data-content="Assistenzsystem, das die Fahrstabiliät des Fahrzeugs in kritischen Situationen verbessert (Elektronisches Stabilitätsprogramm).">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="asr"
                                                   id="checkTraktionskontrolle(ASR)" value="1"
                                                   @if ($ausstattung->asr == '1') checked @endif>
                                            <label class="custom-control-label" for="checkTraktionskontrolle(ASR)">Traktionskontrolle
                                                (ASR)
                                                <button type="button" class="btn btn-link myPopover"
                                                        style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                        data-toggle="popover" data-placement="right"
                                                        title="Elektronisches Stabilitätsprogramm (ESP) "
                                                        data-trigger="focus"
                                                        data-content="Die Traktionskontrolle verhindert das Durchdrehen der Reifen bei schlechtem Wetter oder schwierigem Untergrund. Das System wird von vielen Herstellern unter unterschiedlichen Bezeichnungen angeboten..">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox"
                                                   name="berganfahrassistent" id="checkBerganfahrassistent"
                                                   value="1"
                                                   @if ($ausstattung->berganfahrassistent == '1') checked @endif>
                                            <label class="custom-control-label" for="checkBerganfahrassistent">Berganfahrassistent</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="muedigkeitswarner"
                                                   id="checkMüdigkeitswarner" value="1"
                                                   @if ($ausstattung->muedigkeitswarner == '1') checked @endif>
                                            <label class="custom-control-label" for="checkMüdigkeitswarner">Müdigkeitswarner</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox"
                                                   name="spurhalteassistent" id="checkSpurhalteassistent"
                                                   value="1"
                                                   @if ($ausstattung->spurhalteassistent == '1') checked @endif>
                                            <label class="custom-control-label" for="checkSpurhalteassistent">Spurhalteassistent</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox"
                                                   name="totwinkelassistent" id="checkTotwinkel-Assistent"
                                                   value="1"
                                                   @if ($ausstattung->totwinkelassistent == '1') checked @endif>
                                            <label class="custom-control-label" for="checkTotwinkel-Assistent">Totwinkel-Assistent</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="innenspiegel"
                                                   id="checkInnenspiegel-autom.-abblendend"
                                                   value="1"
                                                   @if ($ausstattung->innenspiegel == '1') checked @endif>
                                            <label class="custom-control-label"
                                                   for="checkInnenspiegel-autom.-abblendend">Innenspiegel autom.
                                                abblendend</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="nachtsicht"
                                                   id="checkNachtsicht-Assistent" value="1"
                                                   @if ($ausstattung->nachtsicht == '1') checked @endif>
                                            <label class="custom-control-label" for="checkNachtsicht-Assistent">Nachtsicht-Assistent</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="notbremsassistent"
                                                   id="checkNotbremsassistent" value="1"
                                                   @if ($ausstattung->notbremsassistent == '1') checked @endif>
                                            <label class="custom-control-label" for="checkNotbremsassistent">Notbremsassistent</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="notrufsystem"
                                                   id="checkNotrufsystem" value="1"
                                                   @if ($ausstattung->notrufsystem == '1') checked @endif>
                                            <label class="custom-control-label"
                                                   for="checkNotrufsystem">Notrufsystem</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox"
                                                   name="verkehrszeichenerkennung" id="checkVerkehrszeichenerkennung"
                                                   value="1"
                                                   @if ($ausstattung->verkehrszeichenerkennung == '1') checked @endif>
                                            <label class="custom-control-label" for="checkVerkehrszeichenerkennung">Verkehrszeichenerkennung</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="selectTempomat" class="font-weight-bold">Tempomat
                                            </label>
                                            <select class="form-control" name="tempomat" id="selectTempomat">
                                                <option value="0" selected>Bitte Tempomat wählen</option>
                                                {{--@foreach($tempomat as $item)
                                                    <option value="{{ $item->tempomat }}" {{ $ausstattung->tempomat == $item->tempomat ? 'selected=selected' : '' }}>{{ $item->tempomat }}</option>
                                                @endforeach--}}
                                                <option value="Abstandstempomat" {{ $ausstattung->tempomat == 'Abstandstempomat' ? 'selected=selected' : '' }}>Abstandstempomat</option>
                                                <option value="Tempomat" {{ $ausstattung->tempomat == 'Tempomat' ? 'selected=selected' : '' }}>Tempomat</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-9 pl-1" style="margin-top: 35px;">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="geschwindigkeitsbegrenzer"
                                                       id="checkGeschwindigkeitsbegrenzer"
                                                       value="1"
                                                       @if ($ausstattung->geschwindigkeitsbegrenzer == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="checkGeschwindigkeitsbegrenzer">Geschwindigkeitsbegrenzer</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="abstandswarner"
                                                       id="checkAbstandswarner" value="1"
                                                       @if ($ausstattung->abstandswarner == '1') checked @endif>
                                                <label class="custom-control-label" for="checkAbstandswarner">Abstandswarner</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Insassenschutz</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="selectAirbag" class="font-weight-bold">Airbags
                                            </label>
                                            <select class="form-control" name="airbag" id="selectAirbag">
                                                <option value="0" selected>Bitte Airbag wählen</option>
                                                <option value="Fahrer-Airbag" {{ $ausstattung->airbag == 'Fahrer-Airbag' ? 'selected=selected' : '' }}>Fahrer-Airbag</option>
                                                <option value="Fahrer-, Seiten- und weitere Airbags" {{ $ausstattung->airbag == 'Fahrer-, Seiten- und weitere Airbags' ? 'selected=selected' : '' }}>Fahrer-, Seiten- und weitere Airbags</option>
                                                <option value="Front-Airbag" {{ $ausstattung->airbag == 'Front-Airbag' ? 'selected=selected' : '' }}>Front-Airbag</option>
                                                <option value="Front- und Seiten-Airbags" {{ $ausstattung->airbag == 'Front- und Seiten-Airbags' ? 'selected=selected' : '' }}>Front- und Seiten-Airbags</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-9 pl-1" style="margin-top: 35px;">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="isofix"
                                                       id="checkIsofix" value="1"
                                                       @if ($ausstattung->isofix == '1') checked @endif>
                                                <label class="custom-control-label" for="checkIsofix">Isofix
                                                    (Kindersitzbefestigung)</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="isofixbeifahrer" id="checkIsofixbeifahrer"
                                                       value="1"
                                                       @if ($ausstattung->isofixbeifahrer == '1') checked @endif>
                                                <label class="custom-control-label" for="checkIsofixbeifahrer">Isofix
                                                    Beifahrersitz</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">Licht
                                        und Sicht</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="selectScheinwerfer" class="font-weight-bold">Scheinwerfer
                                            </label>
                                            <select class="form-control" name="scheinwerfer" id="selectScheinwerfer">
                                                <option value="0" selected>Bitte Scheinwerfer wählen</option>
                                                <option value="Bi-Xenon-Scheinwerfer" {{ $ausstattung->scheinwerfer == 'Bi-Xenon-Scheinwerfer' ? 'selected=selected' : '' }}>Bi-Xenon-Scheinwerfer</option>
                                                <option value="Laserlicht" {{ $ausstattung->scheinwerfer == 'Laserlicht' ? 'selected=selected' : '' }}>Laserlicht</option>
                                                <option value="LED-Scheinwerfer" {{ $ausstattung->scheinwerfer == 'LED-Scheinwerfer' ? 'selected=selected' : '' }}>LED-Scheinwerfer</option>
                                                <option value="Xenonscheinwerfer" {{ $ausstattung->scheinwerfer == 'Xenonscheinwerfer' ? 'selected=selected' : '' }}>Xenonscheinwerfer</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2 pl-1" style="margin-top: 35px;">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="Scheinwerferreinigung" id="checkScheinwerferreinigung"
                                                       value="1"
                                                       @if ($ausstattung->Scheinwerferreinigung == '1') checked @endif>
                                                <label class="custom-control-label" for="checkScheinwerferreinigung">Scheinwerferreinigung</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 pl-1">
                                            <p class="font-weight-bold pl-1">Fernlicht</p>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="fernlicht"
                                                       id="checkBlendfreiesFernlicht" value="1"
                                                       @if ($ausstattung->fernlicht == '1') checked @endif>
                                                <label class="custom-control-label" for="checkBlendfreiesFernlicht">Blendfreies
                                                    Fernlicht</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="fernlichtassistent" id="checkFernlichtassistent"
                                                       value="1"
                                                       @if ($ausstattung->fernlichtassistent == '1') checked @endif>
                                                <label class="custom-control-label" for="checkFernlichtassistent">Fernlichtassistent</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="selectTagfahrlicht" class="font-weight-bold">Tagfahrlicht
                                            </label>
                                            <select class="form-control" name="tagfahrlicht" id="selectTagfahrlicht">
                                                <option value="0" selected>Bitte Tagfahrlicht wählen</option>
                                                <option value="LED-Tagfahrlicht" {{ $ausstattung->tagfahrlicht == 'LED-Tagfahrlicht' ? 'selected=selected' : '' }}>LED-Tagfahrlicht</option>
                                                <option value="LTagfahrlicht" {{ $ausstattung->tagfahrlicht == 'Tagfahrlicht' ? 'selected=selected' : '' }}>Tagfahrlicht</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="selectkurvenlicht" class="font-weight-bold">Kurvenlicht
                                            </label>
                                            <select class="form-control" name="kurvenlicht" id="selectkurvenlicht">
                                                <option value="0" selected>Bitte Kurvenlicht wählen</option>
                                                <option value="Adaptives Kurvenlicht" {{ $ausstattung->kurvenlicht == 'Adaptives Kurvenlicht' ? 'selected=selected' : '' }}>Adaptives Kurvenlicht</option>
                                                <option value="Kurvenlicht" {{ $ausstattung->kurvenlicht == 'Kurvenlicht' ? 'selected=selected' : '' }}>Kurvenlicht</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 pl-1" style="margin-top: 35px;">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="nebelscheinwerfer" id="checkNebelscheinwerfer"
                                                       value="1"
                                                       @if ($ausstattung->nebelscheinwerfer == '1') checked @endif>
                                                <label class="custom-control-label" for="checkNebelscheinwerfer">Nebelscheinwerfer</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Diebstahlschutz</h6>
                                    <div class="form-group col-md-12 pl-0">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="alarmanlage"
                                                   id="checkAlarmanlage" value="1"
                                                   @if ($ausstattung->alarmanlage == '1') checked @endif>
                                            <label class="custom-control-label"
                                                   for="checkAlarmanlage">Alarmanlage</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="wegfahrsperre"
                                                   id="checkElektrischeWegfahrsperre" value="1"
                                                   @if ($ausstattung->wegfahrsperre == '1') checked @endif>
                                            <label class="custom-control-label" for="checkElektrischeWegfahrsperre">Elektrische
                                                Wegfahrsperre</label>
                                        </div>
                                    </div>


                                    <!-- Sicherheit Button -->
                                    <hr style="border-bottom: 1px solid #ff4600;">
                                    <div class="form-row mt-2">
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-secondary btn-block"
                                                    id="backIndividualisierung"><i class="fa fa-angle-left"></i> Zurück
                                            </button>
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-orange btn-block"
                                                    id="nextKomfort">Weiter <i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                    <!-- Sicherheit Button Ende -->

                                    <!-- Sicherheit Ende -->
                                </div>
                                <!-- Sicherheit Ende -->

                                <!-- Komfort -->
                                <div id="komfort">

                                    <h4 class="card-title">Komfort</h4>
                                    <!-- Komfort  -->
                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Klimatisierung</h6>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="selectKlimatisierung" class="font-weight-bold">Klimatisierung
                                            </label>
                                            <select class="form-control" name="klimatisierung"
                                                    id="selectKlimatisierung">
                                                <option value="0" selected>Bitte Klimatisierung wählen</option>
                                                <option value="2-Zonen-Klimaautomatik" {{ $ausstattung->klimatisierung == '2-Zonen-Klimaautomatik' ? 'selected=selected' : '' }}>2-Zonen-Klimaautomatik</option>
                                                <option value="3-Zonen-Klimaautomatik" {{ $ausstattung->klimatisierung == '3-Zonen-Klimaautomatik' ? 'selected=selected' : '' }}>3-Zonen-Klimaautomatik</option>
                                                <option value="4-Zonen-Klimaautomatik" {{ $ausstattung->klimatisierung == '4-Zonen-Klimaautomatik' ? 'selected=selected' : '' }}>4-Zonen-Klimaautomatik</option>
                                                <option value="Keine Klimaanlage oder -automatik" {{ $ausstattung->klimatisierung == 'Keine Klimaanlage oder -automatik' ? 'selected=selected' : '' }}>Keine Klimaanlage oder -automatik</option>
                                                <option value="Klimaanlage" {{ $ausstattung->klimatisierung == 'Klimaanlage' ? 'selected=selected' : '' }}>Klimaanlage</option>
                                                <option value="Klimaautomatik" {{ $ausstattung->klimatisierung == 'Klimaautomatik' ? 'selected=selected' : '' }}>Klimaautomatik</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 pl-1" style="margin-top: 35px;">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="standheizung"
                                                       id="checkStandheizung" value="1"
                                                       @if ($ausstattung->standheizung == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="checkStandheizung">Standheizung</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="beheizbarefrontscheibe" id="checkBeheizbareFrontscheibe"
                                                       value="1"
                                                       @if ($ausstattung->beheizbarefrontscheibe == '1') checked @endif>
                                                <label class="custom-control-label" for="checkBeheizbareFrontscheibe">Beheizbare
                                                    Frontscheibe</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="beheizbareslenkrad" id="checkBeheizbaresLenkrad"
                                                       value="1"
                                                       @if ($ausstattung->beheizbareslenkrad == '1') checked @endif>
                                                <label class="custom-control-label" for="checkBeheizbaresLenkrad">Beheizbares
                                                    Lenkrad</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Einparkhilfe
                                        <button type="button" class="btn btn-link myPopover"
                                                style="color: #3E3F3A; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                data-toggle="popover"
                                                data-placement="right" title="Einparkhilfe" data-trigger="focus"
                                                data-content="Park-Assistenz-Systeme unterstützen den Fahrer beim Einparken. Die Bezeichnungen variieren je nach Hersteller (Park-Assistent, Parkpilot, Parktronic usw.). Neben der Parkunterstützung durch Abstandsmessung (hinten und vorne) gibt es noch weitere Parkassistenten, z. B. Kameras oder selbstlenkende Systeme.">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                    </h6>

                                    <div class="form-row">
                                        <div class="form-group col-md-2 pl-1">
                                            <label class="w-100 d-none d-sm-inline-block">&nbsp;</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="selbstlenkend"
                                                       id="checkSelbstlenkendeSysteme" value="1"
                                                       @if ($ausstattung->selbstlenkend == '1') checked @endif>
                                                <label class="custom-control-label" for="checkSelbstlenkendeSysteme">Selbstlenkende
                                                    Systeme</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 pl-1">
                                            <label class="font-weight-bold mr-2 w-100">Akkustische Einparkhilfe</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="vorneep"
                                                       id="checkvorneEP" value="1"
                                                       @if ($ausstattung->vorneep == '1') checked @endif>
                                                <label class="custom-control-label" for="checkvorneEP">Vorne</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="hintenep"
                                                       id="checkhintenEP" value="1"
                                                       @if ($ausstattung->hintenep == '1') checked @endif>
                                                <label class="custom-control-label" for="checkhintenEP">Hinten</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 pl-1">
                                            <label class="font-weight-bold mr-2 w-100">Visuelle Einparkhilfe</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="kamera"
                                                       id="checkKamera" value="1"
                                                       @if ($ausstattung->kamera == '1') checked @endif>
                                                <label class="custom-control-label" for="checkKamera">Kamera</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="kamera_360"
                                                       id="check360°-Kamera" value="1"
                                                       @if ($ausstattung->kamera_360 == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="check360°-Kamera">360°-Kamera</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Sitze</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-2 pl-1">
                                            <label class="font-weight-bold mr-2 w-100">Sitzheizung</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="vornesv"
                                                       id="checkvorneSV" value="1"
                                                       @if ($ausstattung->vornesv == '1') checked @endif>
                                                <label class="custom-control-label" for="checkvorneSV">Vorne</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="hintensh"
                                                       id="checkhintenSH" value="1"
                                                       @if ($ausstattung->hintensh == '1') checked @endif>
                                                <label class="custom-control-label" for="checkhintenSH">Hinten</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 pl-1">
                                            <label class="font-weight-bold mr-2 w-100">Elektrische
                                                Sitzeinstellung</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="vorneesv"
                                                       id="checkvorneESV" value="1"
                                                       @if ($ausstattung->vorneesv == '1') checked @endif>
                                                <label class="custom-control-label" for="checkvorneESV">Vorne</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="hintenesh"
                                                       id="checkhintenESH" value="1"
                                                       @if ($ausstattung->hintenesh == '1') checked @endif>
                                                <label class="custom-control-label" for="checkhintenESH">Hinten</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 pl-1">
                                            <label class="font-weight-bold mr-2 w-100">Weitere Merkmale</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="sportsitze"
                                                       id="checkSportsitze" value="1"
                                                       @if ($ausstattung->sportsitze == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="checkSportsitze">Sportsitze</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="armlehne"
                                                       id="checkArmlehne" value="1"
                                                       @if ($ausstattung->armlehne == '1') checked @endif>
                                                <label class="custom-control-label" for="checkArmlehne">Armlehne</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="lordosenstuetze" id="checkLordosenstütze"
                                                       value="1"
                                                       @if ($ausstattung->lordosenstuetze == '1') checked @endif>
                                                <label class="custom-control-label" for="checkLordosenstütze">Lordosenstütze</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="massagesitze"
                                                       id="checkMassagesitze" value="1"
                                                       @if ($ausstattung->massagesitze == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="checkMassagesitze">Massagesitze</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox" name="sitzbelueftung"
                                                       id="checkSitzbelüftung" value="1"
                                                       @if ($ausstattung->sitzbelueftung == '1') checked @endif>
                                                <label class="custom-control-label" for="checkSitzbelüftung">Sitzbelüftung</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       name="umklappbarerbeifahrersitz"
                                                       id="checkUmklappbarerBeifahrersitz"
                                                       value="1"
                                                       @if ($ausstattung->umklappbarerbeifahrersitz == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="checkUmklappbarerBeifahrersitz">Umklappbarer
                                                    Beifahrersitz</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">Weitere
                                        Komfortausstattung</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 pl-1">
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="ElektrischeFensterheber"
                                                       name="efensterheber"
                                                       value="1"
                                                       @if ($ausstattung->efensterheber == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="ElektrischeFensterheber">
                                                    Elektrische Fensterheber
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="ElektrischeSeitenspiegel"
                                                       name="eseitenspiegel"
                                                       value="1"
                                                       @if ($ausstattung->eseitenspiegel == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="ElektrischeSeitenspiegel">
                                                    Elektrische Seitenspiegel
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="ElektrischeHeckklappe"
                                                       name="eheckklappe"
                                                       value="1"
                                                       @if ($ausstattung->eheckklappe == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="ElektrischeHeckklappe">
                                                    Elektrische Heckklappe
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Zentralverriegelung"
                                                       name="zv"
                                                       value="1"
                                                       @if ($ausstattung->zv == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Zentralverriegelung">
                                                    Zentralverriegelung
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="SchlüsselloseZentralverriegelung"
                                                       name="szv"
                                                       value="1"
                                                       @if ($ausstattung->szv == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="SchlüsselloseZentralverriegelung">
                                                    Schlüssellose Zentralverriegelung
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Lichtsensor"
                                                       name="lichtsensor"
                                                       value="1"
                                                       @if ($ausstattung->lichtsensor == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Lichtsensor">
                                                    Lichtsensor
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Regensensor"
                                                       name="regensensor"
                                                       value="1"
                                                       @if ($ausstattung->regensensor == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Regensensor">
                                                    Regensensor
                                                    <button type="button"
                                                            class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover"
                                                            data-placement="right"
                                                            title="Regensensor"
                                                            data-trigger="focus"
                                                            data-content="Ein Regensensor registriert den Niederschlag auf der Windschutzscheibe und aktiviert selbstständig den Scheibenwischer.">
                                                        <i class="fas fa-info-circle"></i></button>
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Servolenkung"
                                                       name="servo"
                                                       value="1"
                                                       @if ($ausstattung->servo == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Servolenkung">
                                                    Servolenkung
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Ambiente-Beleuchtung"
                                                       name="ambilight"
                                                       value="1"
                                                       @if ($ausstattung->ambilight == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Ambiente-Beleuchtung">
                                                    Ambiente-Beleuchtung
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Lederlenkrad"
                                                       name="lederlenkrad"
                                                       value="1"
                                                       @if ($ausstattung->lederlenkrad == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Lederlenkrad">
                                                    Lederlenkrad
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Komfort Button -->
                                    <hr style="border-bottom: 1px solid #ff4600;">
                                    <div class="form-row mt-2">
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-secondary btn-block"
                                                    id="backSicherheit"><i class="fa fa-angle-left"></i> Zurück
                                            </button>
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-orange btn-block"
                                                    id="nextInfotainment">Weiter <i class="fa fa-angle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Komfort Button Ende -->

                                    <!-- Komfort Ende -->
                                </div>
                                <!-- Komfort Ende -->

                                <!-- Infotainment -->
                                <div id="infotainment">

                                    <h4 class="card-title">Infotainment</h4>
                                    <!-- Infotainment  -->
                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Multimedia</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 pl-1">
                                            <label class="font-weight-bold mr-2 w-100 d-none d-sm-inline-block">&nbsp;</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Tuner/Radio"
                                                       name="tunerradio"
                                                       value="1"
                                                       @if ($ausstattung->tunerradio == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Tuner/Radio">
                                                    Tuner/Radio
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="RadioDAB"
                                                       name="dab"
                                                       value="1"
                                                       @if ($ausstattung->dab == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="RadioDAB">
                                                    Radio DAB
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="CD-Spieler"
                                                       name="cd"
                                                       value="1"
                                                       @if ($ausstattung->cd == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="CD-Spieler">
                                                    CD-Spieler
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="TV"
                                                       name="tv"
                                                       value="1"
                                                       @if ($ausstattung->tv == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="TV">
                                                    TV
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Navigationssystem"
                                                       name="navigationssystem"
                                                       value="1"
                                                       @if ($ausstattung->navigationssystem == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Navigationssystem">
                                                    Navigationssystem
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Soundsystem"
                                                       name="soundsystem"
                                                       value="1"
                                                       @if ($ausstattung->soundsystem == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Soundsystem">
                                                    Soundsystem
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 pl-1">
                                            <label class="font-weight-bold mr-2 w-100">Bedienung und Steuerung</label>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Touchscreen"
                                                       name="touchscreen"
                                                       value="1"
                                                       @if ($ausstattung->touchscreen == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Touchscreen">
                                                    Touchscreen
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Sprachsteuerung"
                                                       name="sprachsteuerung"
                                                       value="1"
                                                       @if ($ausstattung->sprachsteuerung == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Sprachsteuerung">
                                                    Sprachsteuerung
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Multifunktionslenkrad"
                                                       name="multifunktionslenkrad"
                                                       value="1"
                                                       @if ($ausstattung->multifunktionslenkrad == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Multifunktionslenkrad">
                                                    Multifunktionslenkrad
                                                    <button type="button"
                                                            class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover"
                                                            data-placement="right"
                                                            title="Multifunktionslenkrad"
                                                            data-trigger="focus"
                                                            data-content="In einem Multifunktionslenkrad sind unterschiedliche Bedienungselemente integriert, mit denen z. B. Radio, Tempomat, Freisprechanlage usw. gesteuert werden können.">
                                                        <i class="fas fa-info-circle"></i></button>
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Freisprecheinrichtung"
                                                       name="freisprecheinrichtung"
                                                       value="1"
                                                       @if ($ausstattung->freisprecheinrichtung == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Freisprecheinrichtung">
                                                    Freisprecheinrichtung
                                                    <button type="button"
                                                            class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover"
                                                            data-placement="right"
                                                            title="Freisprecheinrichtung"
                                                            data-trigger="focus"
                                                            data-content="Eine Freisprecheinrichtung, Freisprechanlage oder Mobiltelefon-Vorbereitung ermöglichen Telefonate auch ohne Griff zum Handy. Mikrofon und Lautsprecher sind im Fahrzeug fest installiert und werden mit dem Handy des Fahrers verbunden.">
                                                        <i class="fas fa-info-circle"></i></button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Konnektivität und Schnittstellen</h6>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="USB"
                                               name="usb"
                                               value="1"
                                               @if ($ausstattung->usb == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="USB">
                                            USB
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="Bluetooth"
                                               name="bluetooth"
                                               value="1"
                                               @if ($ausstattung->bluetooth == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="Bluetooth">
                                            Bluetooth
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="AndroidAuto"
                                               name="androidauto"
                                               value="1"
                                               @if ($ausstattung->androidauto == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="AndroidAuto">
                                            Android Auto
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="AppleCarPlay"
                                               name="carplay"
                                               value="1"
                                               @if ($ausstattung->carplay == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="AppleCarPlay">
                                            Apple CarPlay
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="WLAN/WifiHotspot"
                                               name="wlanwifi"
                                               value="1"
                                               @if ($ausstattung->wlanwifi == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="WLAN/WifiHotspot">
                                            WLAN / Wifi Hotspot
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="Musikstreamingintegriert"
                                               name="streaming"
                                               value="1"
                                               @if ($ausstattung->streaming == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="Musikstreamingintegriert">
                                            Musikstreaming integriert
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="InduktionsladenfürSmartphones"
                                               name="induktionsladen"
                                               value="1"
                                               @if ($ausstattung->induktionsladen == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="InduktionsladenfürSmartphones">
                                            Induktionsladen für Smartphones
                                        </label>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Instrumentenanzeige</h6>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="Bordcomputer"
                                               name="bordcomputer"
                                               value="1"
                                               @if ($ausstattung->bordcomputer == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="Bordcomputer">
                                            Bordcomputer
                                            <button type="button"
                                                    class="btn btn-link myPopover"
                                                    style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover"
                                                    data-placement="right"
                                                    title="Boardcomputer"
                                                    data-trigger="focus"
                                                    data-content="Ein Bordcomputer (Multifunktionsanzeige, Fahrerinformationssystem) zeigt diverse Fahrzeug- und Umwelt-Informationen an: Verbrauch, Reifendruck, Außentemperatur usw. Mitunter werden auch Statusmeldungen der Assistenzsysteme dargestellt. Das Display ist im Armaturenbereich integriert.">
                                                <i class="fas fa-info-circle"></i></button>
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="Head-UpDisplay"
                                               name="headup"
                                               value="1"
                                               @if ($ausstattung->headup == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="Head-UpDisplay">
                                            Head-Up Display
                                            <button type="button"
                                                    class="btn btn-link myPopover"
                                                    style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                    data-toggle="popover"
                                                    data-placement="right"
                                                    title="Head-Up Display"
                                                    data-trigger="focus"
                                                    data-content="Ein Head-up-Display projiziert wichtige Informationen (Tachoanzeige, Navigationssystem usw.) in das Sichtfeld des Fahrers. Dadurch kann der Fahrer die angezeigten Daten wesentlich schneller ablesen, ohne den Blick von der Straße abwenden zu müssen.">
                                                <i class="fas fa-info-circle"></i></button>
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox"
                                               id="VolldigitalesKombiinstrument"
                                               name="kombiinstrument"
                                               value="1"
                                               @if ($ausstattung->kombiinstrument == '1') checked @endif>
                                        <label class="custom-control-label"
                                               for="VolldigitalesKombiinstrument">
                                            Volldigitales Kombiinstrument
                                        </label>
                                    </div>

                                    <!-- Infotainment Button -->
                                    <hr style="border-bottom: 1px solid #ff4600;">
                                    <div class="form-row mt-2">
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-secondary btn-block"
                                                    id="backKomfort"><i class="fa fa-angle-left"></i> Zurück
                                            </button>
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-orange btn-block"
                                                    id="nextExtras">Weiter <i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                    <!-- Infotainment Button Ende -->

                                    <!-- Infotainment Ende -->
                                </div>
                                <!-- Infotainment Ende -->

                                <!-- Extras  -->
                                <div id="extras">

                                    <h4 class="card-title">Extras</h4>
                                    <!-- Extras  -->
                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Reifen und Felgen</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mt-1">
                                            <label class="font-weight-bold mr-2 w-100">&nbsp;</label>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Leichtmetallfelgen"
                                                       name="leichtmetallfelgen"
                                                       value="1"
                                                       @if ($ausstattung->leichtmetallfelgen == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Leichtmetallfelgen">
                                                    Leichtmetallfelgen
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Sommerreifen"
                                                       name="sommerreifen"
                                                       value="1"
                                                       @if ($ausstattung->sommerreifen == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Sommerreifen">
                                                    Sommerreifen
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Winterreifen"
                                                       name="winterreifen"
                                                       value="1"
                                                       @if ($ausstattung->winterreifen == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Winterreifen">
                                                    Winterreifen
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Allwetterreifen"
                                                       name="allwetterreifen"
                                                       value="1"
                                                       @if ($ausstattung->allwetterreifen == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Allwetterreifen">
                                                    Allwetterreifen
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPannenhilfe">Pannenhilfe</label>
                                            <select class="form-control" id="inputPannenhilfe"
                                                    name="pannenhilfe">
                                                <option selected disabled value="0">Bitte Pannehilfe wählen</option>
                                                <option value="Notrad" {{ $ausstattung->pannenhilfe == 'Notrad' ? 'selected=selected' : '' }}>Notrad</option>
                                                <option value="Pannenkit" {{ $ausstattung->pannenhilfe == 'Pannenkit' ? 'selected=selected' : '' }}>Pannenkit</option>
                                                <option value="Reserverad" {{ $ausstattung->pannenhilfe == 'Reserverad' ? 'selected=selected' : '' }}>Reserverad</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 mt-1">
                                            <label class="font-weight-bold mr-2 w-100">&nbsp;</label>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Reifendruckkontrolle"
                                                       name="reifendruckkontrolle"
                                                       value="1"
                                                       @if ($ausstattung->reifendruckkontrolle == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Reifendruckkontrolle">
                                                    Reifendruckkontrolle
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style="border-bottom: 1px solid #ff4600; font-size: 16px;" class="mt-3">
                                        Sonderausstattung</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-7 mt-1">
                                            <label class="font-weight-bold mr-2 w-100">&nbsp;</label>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Winterpaket"
                                                       name="winterpaket"
                                                       value="1"
                                                       @if ($ausstattung->winterpaket == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Winterpaket">
                                                    Winterpaket
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Raucherpaket"
                                                       name="raucherpaket"
                                                       value="1"
                                                       @if ($ausstattung->raucherpaket == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Raucherpaket">
                                                    Raucherpaket
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Sportpaket"
                                                       name="sportpaket"
                                                       value="1"
                                                       @if ($ausstattung->sportpaket == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Sportpaket">
                                                    Sportpaket
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Sportfahrwerk"
                                                       name="sportfahrwerk"
                                                       value="1"
                                                       @if ($ausstattung->sportfahrwerk == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Sportfahrwerk">
                                                    Sportfahrwerk
                                                    <button type="button"
                                                            class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover"
                                                            data-placement="right"
                                                            title="Sportfahrwerk"
                                                            data-trigger="focus"
                                                            data-content="Als Sportfahrwerk bezeichnet man eine Kombination aus Stoßdämpfern und Federn, die straffer und damit „sportlicher“ ausgelegt sind als bei den meisten serienmäßigen Modellen.">
                                                        <i class="fas fa-info-circle"></i></button>
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Luftfederung"
                                                       name="luftfederung"
                                                       value="1"
                                                       @if ($ausstattung->luftfederung == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Luftfederung">
                                                    Luftfederung
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label for="inputAnhängerkupplung">Anhängerkupplung</label>
                                            <select class="form-control" id="inputAnhängerkupplung"
                                                    name="anhaengerkupplung">
                                                <option selected disabled value="0">Bitte Anhängerkupplung wählen</option>
                                                <option value="Anhängerkupplung abnehmbar" {{ $ausstattung->anhaengerkupplung == 'Anhängerkupplung abnehmbar' ? 'selected=selected' : '' }}>Anhängerkupplung abnehmbar</option>
                                                <option value="Anhängerkupplung fest" {{ $ausstattung->anhaengerkupplung == 'Anhängerkupplung fest' ? 'selected=selected' : '' }}>Anhängerkupplung fest</option>
                                                <option value="Anhängerkupplung schwenkbar" {{ $ausstattung->anhaengerkupplung == 'Anhängerkupplung schwenkbar' ? 'selected=selected' : '' }}>Anhängerkupplung schwenkbar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Gepäckraumabtrennung"
                                                       name="gepaeckraumabtrennung"
                                                       value="1"
                                                       @if ($ausstattung->gepaeckraumabtrennung == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Gepäckraumabtrennung">
                                                    Gepäckraumabtrennung
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Skisack"
                                                       name="skisack"
                                                       value="1"
                                                       @if ($ausstattung->skisack == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Skisack">
                                                    Skisack
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Schiebedach"
                                                       name="schiebedach"
                                                       value="1"
                                                       @if ($ausstattung->schiebedach == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Schiebedach">
                                                    Schiebedach
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Panorama-Dach"
                                                       name="panoramadach"
                                                       value="1"
                                                       @if ($ausstattung->panoramadach == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Panorama-Dach">
                                                    Panorama-Dach
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Dachreling"
                                                       name="dachreling"
                                                       value="1"
                                                       @if ($ausstattung->dachreling == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Dachreling">
                                                    Dachreling
                                                    <button type="button"
                                                            class="btn btn-link myPopover"
                                                            style="color: #ff4600; padding: 0 2px; border: 0; font-size: 0.825rem"
                                                            data-toggle="popover"
                                                            data-placement="right"
                                                            title="Dachreling"
                                                            data-trigger="focus"
                                                            data-content="Als Dachreling bezeichnet man längs angebrachte Schienen am Autodach, an denen Transportmittel wie Fahrradständer oder Dachboxen befestigt werden können.">
                                                        <i class="fas fa-info-circle"></i></button>
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Behindertengerecht"
                                                       name="behindertengerecht"
                                                       value="1"
                                                       @if ($ausstattung->behindertengerecht == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Behindertengerecht">
                                                    Behindertengerecht
                                                </label>
                                            </div>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline">
                                                <input class="custom-control-input" type="checkbox"
                                                       id="Taxi"
                                                       name="taxi"
                                                       value="1"
                                                       @if ($ausstattung->taxi == '1') checked @endif>
                                                <label class="custom-control-label"
                                                       for="Taxi">
                                                    Taxi
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Extras Button -->
                                    <hr style="border-bottom: 1px solid #ff4600;">
                                    <div class="form-row mt-2">
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-secondary btn-block"
                                                    id="backInfotainment"><i class="fa fa-angle-left"></i> Zurück
                                            </button>
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <button type="button" class="btn btn-outline-orange btn-block"
                                                    id="nextBilderBeschreibung">Weiter <i class="fa fa-angle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Extras Button Ende -->

                                    <!-- Extras Ende -->
                                </div>
                                <!-- Extras Ende -->

                            </div><!-- Ausstattung end -->
                        @endforeach

                    <!-- Details  -->
                        <div id="Details">

                            <div id="BilderBeschreibung">
                                <h4 class="card-title" id="Bilder">Bilder & Beschreibung</h4>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
{{--                                        <a class="btn btn-orange btn-block" href="{{ route('backend.verkauf.images', $verkauf->id) }}" role="button">Bilder bearbeiten</a>--}}
                                        {{--<label for="inputBilder" class="font-weight-bolder">Bilder</label>
                                        <input class="form-control  @error('images[]') {{ 'Bitte fügen sie Bilder zu ihrer Anzeige hinzu.' }} is-invalid @enderror" type="file" id="inputBilder"
                                               name="images[]" accept="image/jpg, image/jpeg, image/png, image/gif"  multiple>
                                        @error('images[]')
                                        <small id="images" class="form-text" style="color: #ff0000;">Bitte fügen sie Bilder zu ihrer Anzeige hinzu.</small>
                                        @enderror--}}
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="inputBeschreibung">Fahrzeugbeschreibung</label>
                                        <textarea class="form-control" name="beschreibung" id="inputBeschreibung"
                                                  rows="6">{{ str_replace('<br />', '', $verkauf->beschreibung) }}</textarea>
                                    </div>
                                </div>

                                <h4 class="card-title" id="Preis">Preis</h4>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="inputPreis" class="font-weight-bolder">Preis<i
                                                class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <input class="form-control border-right-0 @error('preis') {{ 'Bitte geben sie ihren gewünschten Verkaufspreis an.' }} is-invalid @enderror" type="number" step="0.01" id="inputPreis"
                                                   name="preis" placeholder="Preis" value="{{ $verkauf->preis }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text border-left-0 bg-transparent"><i
                                                        class="fas fa-euro-sign"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>&nbsp;</label>
                                        <select class="form-control" id="inputPreisx" name="preisx">
                                            <option @if ($verkauf->preisx == 'Festpreis') selected @endif>Festpreis</option>
                                            <option @if ($verkauf->preisx == 'Verhandlungsbasis') selected @endif>Verhandlungsbasis</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Details Button -->
                                <hr style="border-bottom: 1px solid #ff4600;">
                                <div class="form-row mt-2">
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-secondary btn-block"
                                                id="backExtras"><i class="fa fa-angle-left"></i> Zurück
                                        </button>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <button type="button" class="btn btn-outline-orange btn-block"
                                                id="nextKontakt" disabled>Weiter <i class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                                <!-- Details Button Ende -->
                            </div>

                        </div>
                        <!-- Details end -->

                        @foreach($verkauf->fahrzeuges_kontakt as $key=>$kontakt)

                        <!-- Kontakt -->
                            <div id="Kontakt">
                                <div class="card-header bg-dark text-light rounded-0" id="kontaktheader">
                                    <h3 class="mb-0">Kontakt (1/1)</h3>
                                </div>
                                <div class="card-body">
                                    <div id="kontakt">
                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                <div class="custom-control custom-radio custom-control-inline mb-2">
                                                    <input class="custom-control-input" type="radio" id="privat" name="kontakt" value="0" @if ($kontakt->kontakt == '0'){{ $kontakt->kontakt == '0' ? 'checked' : '' }} @endif>
                                                    <label class="custom-control-label" for="privat">Privat</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-2">
                                                    <input class="custom-control-input" type="radio" id="gewerblich" name="kontakt" value="1" @if ($kontakt->kontakt == '1'){{ $kontakt->kontakt == '1' ? 'checked' : '' }} @endif>
                                                    <label class="custom-control-label" for="gewerblich">Gewerblich</label>
                                                </div>
                                                {{--@if (Auth::user()->hasRole('mitarbeiter') or Auth::user()->hasRole('admin'))
                                                <div class="custom-control custom-radio custom-control-inline mb-2">
                                                    <input class="custom-control-input" type="radio" id="intern" name="kontakt" value="2" @if ($kontakt->kontakt == '2'){{ $kontakt->kontakt == '2' ? 'checked' : '' }} @endif>
                                                    <label class="custom-control-label" for="intern">Intern</label>
                                                </div>
                                                @endif--}}
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="kontaktAnrede" class="font-weight-bold">Anrede<i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm @error('anrede') {{ $message }} is-invalid @enderror" id="kontaktAnrede" name="anrede">
                                                    <option @if ($kontakt->anrede == 'Herr') selected @endif>Herr</option>
                                                    <option @if ($kontakt->anrede == 'Frau') selected @endif>Frau</option>
                                                    <option @if ($kontakt->anrede == 'Firma') selected @endif>Firma</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="kontaktFirma" class="font-weight-bolder">Firma</label>
                                                <input class="form-control form-control-sm @error('firma') {{ $message }} is-invalid @enderror" type="text" id="kontaktFirma" name="firma" placeholder="Firma" value="{{ str_replace('0', '', $kontakt->firma) }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="kontaktVorname" class="font-weight-bolder">Ansprechpartner Vorname<i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm @error('vorname') {{ $message }} is-invalid @enderror" type="text" id="kontaktVorname" name="vorname" placeholder="Vorname" value="{{ $kontakt->vorname }}">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="kontaktNachname" class="font-weight-bolder">Ansprechpartner Nachname<i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm @error('nachname') {{ $message }} is-invalid @enderror" type="text" id="kontaktNachname" name="nachname" placeholder="Nachname" value="{{ $kontakt->nachname }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="kontaktStrasse" class="font-weight-bolder">Straße<i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm @error('strasse') {{ $message }} is-invalid @enderror" type="text" id="kontaktStrasse" name="strasse" placeholder="Straße" value="{{ $kontakt->strasse }}">
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="kontaktPLZ" class="font-weight-bolder">Postleitzahl<i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm @error('plz') {{ $message }} is-invalid @enderror" type="text" id="kontaktPLZ" name="plz" placeholder="Postleitzahl" value="{{ $kontakt->plz }}">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="kontaktOrt" class="font-weight-bolder">Ort<i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm @error('ort') {{ $message }} is-invalid @enderror" type="text" id="kontaktOrt" name="ort" placeholder="Ort" value="{{ $kontakt->ort }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="kontaktTel" class="font-weight-bolder">Telefon<i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm @error('telefon') {{ $message }} is-invalid @enderror" type="tel" id="kontaktTelefon" name="telefon" placeholder="Telefon" value="{{ $kontakt->telefon }}">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="kontaktEmail" class="font-weight-bolder">E-Mail<i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm @error('email') {{ $message }} is-invalid @enderror" type="email" id="kontaktEmail" name="email" placeholder="E-Mail" value="{{ $kontakt->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kontakt Button -->
                                    <hr style="border-bottom: 1px solid #ff4600;">
                                    <div class="form-row mt-2">
                                        <div class="col-md-6 my-1">
                                            <a href="{{ route('backend.verkauf.index') }}" class="btn btn-outline-secondary btn-block"> Zurück zur Übersicht</a>
                                        </div>
                                        <div class="col-md-6 my-1">
                                            <button type="submit" class="btn btn-outline-orange btn-block">Absenden <i
                                                    class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                    <!-- Kontakt Button Ende -->
                                </div><!-- Kontakt Card Body end -->
                            </div>
                            <!-- Kontakt end -->

                        @endforeach
                    </div>
                </div>
            </form>

        </div><!-- /.container-fluid -->

    </section>
@endsection

@push('js')
    <script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $(function () {
            $('.myPopover').popover();
        });
        jQuery(document).ready(function () {
            $('#selectMarke').on('change', function () {
                var selected = $(this).find(":selected").attr('value');
                $.ajax({
                    url: 'typ/' + selected + '/modell',
                    type: 'GET',
                    dataType: 'json',
                }).done(function (data) {
                    $('#selectModell').removeAttr('disabled');
                    var select = $('#selectModell');
                    select.empty();
                    select.append('<option>Bitte Modell wählen</option>');
                    $.each(data, function (key, value) {
                        select.append('<option value="' + value.modell + '">' + value.modell + '</option>')
                    });
                });
                console.log("success");
            })
        });

        // plus minus input
        $(document).ready(function () {
            $('#plus-btn').click(function () {
                $('#inputFahrzeughalter').val(parseInt($('#inputFahrzeughalter').val()) + 1);
            });
            $('#minus-btn').click(function () {
                $('#inputFahrzeughalter').val(parseInt($('#inputFahrzeughalter').val()) - 1);
                if ($('#inputFahrzeughalter').val() == 0) {
                    $('#inputFahrzeughalter').val(1);
                }
            });
        });
        // plus minus input Sitzplätze
        $(document).ready(function () {
            $('#plus-sitz').click(function () {
                $('#inputSitzplaetze').val(parseInt($('#inputSitzplaetze').val()) + 1);
            });
            $('#minus-sitz').click(function () {
                $('#inputSitzplaetze').val(parseInt($('#inputSitzplaetze').val()) - 1);
                if ($('#inputSitzplaetze').val() == 0) {
                    $('#inputSitzplaetze').val(1);
                }
            });
        });

        // skip and back
        $('#nextAntriebumwelt').click(function () {
            $('#antriebumwelt').show();
            $('#deinfahrzeug').hide();
            $('#ueberschrift').text('Fahrzeugdaten (2/3)');
            $('#progressBar').css('width', '12.5%');
        });
        $('#backDeinfahrzeug').click(function () {
            $('#antriebumwelt').hide();
            $('#deinfahrzeug').show();
            $('#ueberschrift').text('Fahrzeugdaten (1/3)');
            $('#progressBar').css('width', '0%');
        });

        $('#nextZustandinspektion').click(function () {
            $('#zustandinspektion').show();
            $('#antriebumwelt').hide();
            $('#ueberschrift').text('Fahrzeugdaten (3/3)');
            $('#progressBar').css('width', '25%');
        });
        $('#backAntriebumwelt').click(function () {
            $('#zustandinspektion').hide();
            $('#antriebumwelt').show();
            $('#ueberschrift').text('Fahrzeugdaten (2/3)');
            $('#progressBar').css('width', '12.5%');
        });

        $('#nextIndividualisierung').click(function () {
            $('#Individualisierung').show();
            $('#Ausstattung').show();
            $('#fahrzeugdaten').hide();
            $('#ueberschrift').text('Ausstattung (1/5)');
            $('#progressBar').css('width', '37.5%');
        });
        $('#backFahrzeugdaten').click(function () {
            $('#ausstattung').hide();
            $('#Individualisierung').hide();
            $('#deinfahrzeug').hide();
            $('#fahrzeugdaten').show();
            $('#zustandinspektion').show();
            $('#ueberschrift').text('Fahrzeugdaten (3/3)');
            $('#progressBar').css('width', '25%');
        });

        $('#nextSicherheit').click(function () {
            $('#Sicherheit').show();
            $('#Individualisierung').hide();
            $('#ueberschrift').text('Ausstattung (2/5)');
            $('#progressBar').css('width', '50%');
        });
        $('#backIndividualisierung').click(function () {
            $('#Individualisierung').show();
            $('#Sicherheit').hide();
            $('#ueberschrift').text('Ausstattung (1/5)');
            $('#progressBar').css('width', '37.5%');
        });

        $('#nextKomfort').click(function () {
            $('#komfort').show();
            $('#Sicherheit').hide();
            $('#ueberschrift').text('Ausstattung (3/5)');
            $('#progressBar').css('width', '62.5%');
        });
        $('#backSicherheit').click(function () {
            $('#Sicherheit').show();
            $('#komfort').hide();
            $('#ueberschrift').text('Ausstattung (2/5)');
            $('#progressBar').css('width', '50%');
        });

        $('#nextInfotainment').click(function () {
            $('#infotainment').show();
            $('#komfort').hide();
            $('#ueberschrift').text('Ausstattung (4/5)');
            $('#progressBar').css('width', '75%');
        });
        $('#backKomfort').click(function () {
            $('#komfort').show();
            $('#infotainment').hide();
            $('#ueberschrift').text('Ausstattung (3/5)');
            $('#progressBar').css('width', '62.5%');
        });

        $('#nextExtras').click(function () {
            $('#extras').show();
            $('#infotainment').hide();
            $('#ueberschrift').text('Ausstattung (5/5)');
            $('#progressBar').css('width', '87.5%');
        });
        $('#backInfotainment').click(function () {
            $('#infotainment').show();
            $('#extras').hide();
            $('#ueberschrift').text('Ausstattung (4/5)');
            $('#progressBar').css('width', '75%');
        });

        $('#nextBilderBeschreibung').click(function () {
            $('#Details').show();
            $('#BilderBeschreibung').show();
            $('#extras').hide();
            $('#ueberschrift').text('Details (1/1)');
            $('#progressBar').css('width', '100%');
        });
        $('#backExtras').click(function () {
            $('#extras').show();
            $('#Details').hide();
            $('#BilderBeschreibung').hide();
            $('#ueberschrift').text('Ausstattung (5/5)');
            $('#progressBar').css('width', '87.5%');
        });

        $('#nextKontakt').click(function () {
            $('#Kontakt').show();
            $('#kontakt').show();
            $('#Details').hide();
            $('#kontaktheader').hide();
            $('#BilderBeschreibung').hide();
            $('#ueberschrift').text('Kontakt (1/1)');
            $('#progressBar').css('width', '100%');
        });
        $('#backDetails').click(function () {
            $('#Details').show();
            $('#BilderBeschreibung').show();
            $('#kontaktheader').show();
            $('#Kontakt').hide();
            $('#kontakt').hide();
            $('#ueberschrift').text('Details (1/1)');
            $('#progressBar').css('width', '88.88%');
        });

        // Einblenden von Anderen innenfarben
        function einblenden() {
            if (document.getElementById("selectKraftstoff").selectedIndex == "10") {
                document.getElementById("kraftstoffAndere").style.display = "block";
                document.getElementById("selectKraftstoff").style.display = "none";
            } else {
                document.getElementById("kraftstoffAndere").style.display = "none";
                document.getElementById("selectKraftstoff").style.display = "block";
            }

            if (document.getElementById("selectAussenfarbe").selectedIndex == "14") {
                document.getElementById("aussenfarbeAndere").style.display = "block";
                document.getElementById("selectAussenfarbe").style.display = "none";
            } else {
                document.getElementById("aussenfarbeAndere").style.display = "none";
                document.getElementById("selectAussenfarbe").style.display = "block";
            }

            if (document.getElementById("selectInnenausstattung").selectedIndex == "5") {
                document.getElementById("innenfarbeAndere").style.display = "block";
                document.getElementById("selectInnenausstattung").style.display = "none";
            } else {
                document.getElementById("innenfarbeAndere").style.display = "none";
                document.getElementById("selectInnenausstattung").style.display = "block";
            }

            if (document.getElementById("selectMaterialInnen").selectedIndex == "6") {
                document.getElementById("innenmaterialAndere").style.display = "block";
                document.getElementById("selectMaterialInnen").style.display = "none";
            } else {
                document.getElementById("innenmaterialAndere").style.display = "none";
                document.getElementById("selectMaterialInnen").style.display = "block";
            }

            if (document.getElementById("selectMonatHU").selectedIndex == "1") {
                document.getElementById("huAendern").style.display = "block";
                document.getElementById("selectMonatHU").style.display = "none";
            } else {
                document.getElementById("huAendern").style.display = "none";
                document.getElementById("selectMonatHU").style.display = "block";
            }
        };

        $('#aendern').inputmask('mm/yyyy', { 'placeholder': 'mm/yyyy' })
    </script>
@endpush
