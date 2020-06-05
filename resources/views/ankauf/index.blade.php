@extends('layouts.main')

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Anfrage ')

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/css/fileinput.min.css"/>
    <style type="text/css">
        /*#nav-bilder, #nav-daten, #nav-detail {
            display: none;
        }*/
    </style>
@endpush

@section('content')
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col">
                <div class="container-content border-0">
                    <div class="container-inner mb-4">
                        <h2 class="dp-title-h2 prime-color">Fahrzeugankauf</h2>
                        <p>Wir kaufen ihren Alten!</p>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <form action="{{ route('ankauf.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-lg-3">
                                                <label for="marke" class="font-weight-bolder">Marke <i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm" id="marke" name="marke">
                                                    <option value="" selected>Bitte Marke wählen</option>
                                                    @foreach($marke as $item)
                                                        <option value="{{ $item->id }}">{{ $item->marke }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="selectModell" class="font-weight-bolder">Modell <i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm" id="selectModell" name="modell" disabled>
                                                    <option value="" selected>Bitte erst Marke wählen</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputZulassung" class="font-weight-bolder">Erstzulassung <i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm" id="inputZulassung" name="zulassung">
                                                    <option value="" selected>Monat</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option
                                                            value="{{ str_pad($i, 2, 0, STR_PAD_LEFT) }}" {{ old('ez_monat') == str_pad($i, 2, 0, STR_PAD_LEFT) ? 'selected=selected' : '' }}>{{ str_pad($i, 2, 0, STR_PAD_LEFT) }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputJahr">&nbsp;</label>
                                                <select class="form-control form-control-sm" id="inputJahr" name="jahr">
                                                    <option value="" selected disabled>Jahr Erstzulassung</option>
                                                    @for ($i = date('Y'); $i >= 1975; $i--)
                                                        <option value="{{ str_pad($i, 4, 0, STR_PAD_LEFT) }}" {{ old('ez_jahr') == str_pad($i, 4, 0, STR_PAD_LEFT) ? 'selected=selected' : '' }}>{{ str_pad($i, 4, 0, STR_PAD_LEFT) }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-3">
                                                <label for="inputKM" class="font-weight-bolder">KM <i class="text-danger">*</i></label>
                                                <div class="input-group input-group-sm mr-sm-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text border-right-0 bg-transparent">KM</div>
                                                    </div>
                                                    <input class="form-control form-control-sm border-left-0" type="text" id="inputKM" name="km" placeholder="Kilometerstand">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputTÜV" class="font-weight-bolder">TÜV <i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm" type="text" id="inputTÜV" name="tuev" placeholder="Bis wann hat ihr Fahrzeug TÜV?"
                                                value="{{ \Carbon\Carbon::now()->addMonth(24)->isoFormat('MM/YYYY') }}" data-inputmask="'mask': '99/9999'">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputPS">PS</label>
                                                <div class="input-group input-group-sm mr-sm-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text border-right-0 bg-transparent">PS</div>
                                                    </div>
                                                    <input class="form-control form-control-sm border-left-0" type="text" id="inputPS" name="PS">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3">

                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-3">
                                                <label for="inputKraftstoff" class="font-weight-bolder">Kraftstoff <i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm" id="inputKraftstoff" name="kraftstoff">
                                                    <option value="" selected>- Bitte Kraftstoff wählen -</option>
                                                    @foreach($kraftstoff as $item)
                                                        <option value="{{ $item->kraftstoff }}">{{ $item->kraftstoff }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputGetriebe" class="font-weight-bolder">Getriebeart <i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm" id="inputGetriebe" name="getriebe">
                                                    <option value="" selected>- Bitte Getriebe wählen -</option>
                                                    @foreach($getriebe as $item)
                                                        <option value="{{ $item->getriebe }}">{{ $item->getriebe }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputKarosserie" class="font-weight-bolder">Karosserieform <i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm" id="inputKarosserie" name="karosserie">
                                                    <option value="" selected>- Bitte wählen sie die Karosserieform -</option>
                                                    @foreach($kategorie as $item)
                                                        <option value="{{ $item->kategorie }}">{{ $item->kategorie }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputTür" class="font-weight-bolder">Türen <i class="text-danger">*</i></label>
                                                <select class="form-control form-control-sm" id="inputTür" name="tuer">
                                                    <option value="2/3" {{ old('tueren') == '2/3' ? 'selected=selected' : '' }}>2/3</option>
                                                    <option value="4/5" @if (old('tueren') == '4/5'){{'selected=selected'}}@elseif(old('tueren') == false){{'selected'}}@endif>4/5</option>
                                                    <option value="6/7" {{ old('tueren') == '6/7' ? 'selected=selected' : '' }}>6/7</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-2">
                                                <label for="inputFahrzeughalter" class="font-weight-bold">Fahrzeughalter</label>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-orange" id="minus-btn"><i
                                                                class="fa fa-minus"></i></button>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm text-center"
                                                           name="halter" id="inputFahrzeughalter"
                                                           placeholder="Fahrzeughalter" value="@if (old('fahrzeughalter') == true){{old('fahrzeughalter')}}@else{{ 1 }}@endif" min="1">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-orange" id="plus-btn"><i
                                                                class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label>Import/Reimport Fahrzeug? </label><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="ImportJa" name="import" value="Ja" class="custom-control-input">
                                                    <label class="custom-control-label" for="ImportJa">Ja</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="ImportNein" name="import" value="Nein" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="ImportNein">Nein</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label>Unfallfrei? </label><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="UnfallJa" name="unfall" value="Ja" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="UnfallJa">Ja</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="UnfallNein" name="unfall" value="Nein" class="custom-control-input">
                                                    <label class="custom-control-label" for="UnfallNein">Nein</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="UnbekanntNein" name="unfall" value="Unbekannt" class="custom-control-input">
                                                    <label class="custom-control-label" for="UnbekanntNein">Unbekannt</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label>Getriebeschaden? </label><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="GetriebeschadenJa" name="getriebeschaden" value="Ja" class="custom-control-input">
                                                    <label class="custom-control-label" for="GetriebeschadenJa">Ja</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="GetriebeschadenNein" name="getriebeschaden" value="Nein" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="GetriebeschadenNein">Nein</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label>Motorschaden? </label><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="MotorschadenJa" name="motorschaden" value="Ja" class="custom-control-input">
                                                    <label class="custom-control-label" for="MotorschadenJa">Ja</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="MotorschadenNein" name="motorschaden" value="Nein" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="MotorschadenNein">Nein</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <label>Ausstattung</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Klima" name="extras[]" value="Klimaanlage">
                                                    <label class="form-check-label" for="Klima">
                                                        Klimaanlage
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Anhänger" name="extras[]" value="Anhängerkupplung">
                                                    <label class="form-check-label" for="Anhänger">
                                                        Anhängerkupplung
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Sitzh" name="extras[]" value="Sitzheizung">
                                                    <label class="form-check-label" for="Sitzh">
                                                        Sitzheizung
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Alu" name="extras[]" value="Alufelgen">
                                                    <label class="form-check-label" for="Alu">
                                                        Alufelgen
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="8x" name="extras[]" value="8 fach Bereift">
                                                    <label class="form-check-label" for="8x">
                                                        8 fach Bereift
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Navi" name="extras[]" value="Navigationssystem">
                                                    <label class="form-check-label" for="Navi">
                                                        Navigationssystem
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Leder" name="extras[]" value="Lederausstattung">
                                                    <label class="form-check-label" for="Leder">
                                                        Lederausstattung
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Dach" name="extras[]"  value="Schiebe- oder Panoramadach">
                                                    <label class="form-check-label" for="Dach">
                                                        Schiebe- oder Panoramadach
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Standheizung" name="extras[]" value="Standheizung">
                                                    <label class="form-check-label" for="Standheizung">
                                                        Standheizung
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Sport" name="extras[]" value="Sportpaket">
                                                    <label class="form-check-label" for="Sport">
                                                        Sportpaket
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Xenon" name="extras[]"  value="Xenonlicht">
                                                    <label class="form-check-label" for="Xenon">
                                                        Xenonlicht
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <label for="Beschreibung">Beschreibung (optional)</label>
                                                <textarea class="form-control form-control-sm" id="Beschreibung" name="description" rows="3">{{{ old('description') }}}</textarea>
                                            </div>
                                        </div>
                                        @if(Auth::check() == true)
                                            <div class="form-row">
                                                <div class="form-group col-lg-3">
                                                    <label for="inputVorname" class="font-weight-bolder">Vorname <i class="text-danger">*</i></label>
                                                    <input class="form-control form-control-sm" type="text" id="inputVorname" name="vorname" placeholder="Vorname" value="{{ Auth::user()->vorname }}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="inputNachname" class="font-weight-bolder">Nachname <i class="text-danger">*</i></label>
                                                    <input class="form-control form-control-sm" type="text" id="inputNachname" name="nachname" placeholder="Nachname" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="inputEMail" class="font-weight-bolder">E-Mail <i class="text-danger">*</i></label>
                                                    <input class="form-control form-control-sm" type="email" id="inputEMail" name="email" placeholder="E-Mail" value="{{ Auth::user()->email }}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="inputTelefonnummer" class="font-weight-bolder">Telefonnummer <i class="text-danger">*</i></label>
                                                    <input class="form-control form-control-sm" type="tel" id="inputTelefonnummer" name="telefonnummer" placeholder="Telefonnummer" value="{{ Auth::user()->telefon }}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="inputWPreis" class="font-weight-bolder">Wunschpreis <i class="text-danger">*</i></label>
                                                    <div class="input-group input-group-sm mr-sm-2">
                                                        <input class="form-control form-control-sm border-right-0" type="text" id="inputWPreis" name="wpreis" placeholder="Ihr Wunschpreis">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text border-light-0 bg-transparent">EUR</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="inputMPreis" class="font-weight-bolder">Mindestpreis <i class="text-danger">*</i></label>
                                                    <div class="input-group input-group-sm mr-sm-2">
                                                        <input class="form-control form-control-sm border-right-0" type="text" id="inputMPreis" name="mpreis" placeholder="Ihr Mindestpreis">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text border-light-0 bg-transparent">EUR</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="inputPLZ" class="font-weight-bolder">Standort des KFZ (Postleitzahl) <i class="text-danger">*</i></label>
                                                    <input class="form-control form-control-sm" type="text" id="inputPLZ" name="kfzplz" placeholder="PLZ" value="{{ Auth::user()->plz }}"  data-inputmask="'mask': '99999'">
                                                </div>
                                                <div class="form-group col-lg-3">

                                                </div>
                                            </div>
                                        @else
                                        <div class="form-row">
                                            <div class="form-group col-lg-3">
                                                <label for="inputVorname" class="font-weight-bolder">Vorname <i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm" type="text" id="inputVorname" name="vorname" placeholder="Vorname">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputNachname" class="font-weight-bolder">Nachname <i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm" type="text" id="inputNachname" name="nachname" placeholder="Nachname">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputEMail" class="font-weight-bolder">E-Mail <i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm" type="email" id="inputEMail" name="email" placeholder="E-Mail">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputTelefonnummer" class="font-weight-bolder">Telefonnummer <i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm" type="tel" id="inputTelefonnummer" name="telefonnummer" placeholder="Telefonnummer">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputWPreis" class="font-weight-bolder">Wunschpreis <i class="text-danger">*</i></label>
                                                <div class="input-group input-group-sm mr-sm-2">
                                                    <input class="form-control form-control-sm border-right-0" type="text" id="inputWPreis" name="wpreis" placeholder="Ihr Wunschpreis">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text border-light-0 bg-transparent">EUR</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputMPreis" class="font-weight-bolder">Mindestpreis <i class="text-danger">*</i></label>
                                                <div class="input-group input-group-sm mr-sm-2">
                                                    <input class="form-control form-control-sm border-right-0" type="text" id="inputMPreis" name="mpreis" placeholder="Ihr Mindestpreis">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text border-light-0 bg-transparent">EUR</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputPLZ" class="font-weight-bolder">Standort des KFZ (Postleitzahl) <i class="text-danger">*</i></label>
                                                <input class="form-control form-control-sm" type="text" id="inputPLZ" name="kfzplz" placeholder="PLZ">
                                            </div>
                                            <div class="form-group col-lg-3">

                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                            <label for="inputBildUpload">Bild hochladen</label>
                                            <div class="file-loading">
                                                <input id="input-b7" name="images[]" multiple type="file" class="file" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]'>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6">

                                            </div>
                                            <div class="form-group col-lg-6">
                                                <button type="submit" class="btn btn-outline-primary btn-block btn-sm">Speichern</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/locales/de.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/themes/fas/theme.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(":input").inputmask();
        });

        $("#input-b7").fileinput({
            language: "de",
            theme: "fas",
        });
        jQuery(document).ready(function () {
            $('#marke').on('change', function () {
                var selected = $(this).find(":selected").attr('value');
                $.ajax({
                    url:  'ankauf/' + selected + '/marke',
                    type: 'GET',
                    dataType: 'json',
                }).done(function (data) {
                    $('#selectModell').removeAttr('disabled');
                    var select = $('#selectModell');
                    select.empty();
                    select.append('<option value="">Bitte Modell wählen</option>');
                    $.each(data, function (key, value) {
                        select.append('<option value="' + value.modell + '">' + value.modell + '</option>')
                    });
                });
                console.log("success");
            });
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
    </script>
@endpush
