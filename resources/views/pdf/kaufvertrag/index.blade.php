@extends('layouts.main')

@section('titel', 'Kaufvertrag')

@push('css')
    <style>
        table {
            width: 100%;
        }
        input {
            width: 100%;
            border-right: 0;
            border-left: 0;
            border-top: 0;
            border-bottom: 0.5px solid #ff4400;
            padding: 2px 5px;
        }
        .small, small {
            font-size: 70%;
            vertical-align: top;
        }
        .ueberschriften {
            font-size: 18px;
            font-weight: bold;
        }
        .ueberschrift {
            font-size: 26px;
            font-weight: bold;
        }
        .gewaehrleistung {
            font-size: 100%;
        }
    </style>
@endpush

@section('content')<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="container-content border-0">
                <div class="container-inner mb-4">
                    <form action="{{ route('pdf.kaufvertrag.store') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $verkauf->id }}" name="verkauf">
                        <table class="kaufvertrag mb-4">
                            <tr>
                                <td colspan="2"><div class="ueberschrift prime-color">Kaufvertrag für ein Gebrauchtes Fahrzeug</div></td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;">
                                    <table class="verkaeufer">
                                        <tr>
                                            <td style="width: 35%; vertical-align: bottom" class="ueberschriften">Verkäufer</td>
                                            <td style="width: 65%;" colspan="2">
                                                <input type="text" name="telefon" id="" placeholder="Telefon" value="{{ $users->telefon }}"><br>
                                                <small>Telefon</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 75%; padding-right: 5px;" colspan="2">
                                                <input type="text" name="name" id="" placeholder="" value="{{ $users->vorname.' '.$users->name }}"><br>
                                                <small>Name, Vorname</small>
                                            </td>
                                            <td style="width: 25%; padding-left: 5px;">
                                                <input type="text" name="gebd" id="" placeholder="Geburtsdatum" value=""><br>
                                                <small>Geburtsdatum</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" name="straße" id="" placeholder="Straße, Hausnummer" value="{{ $users->straße }}"><br>
                                                <small>Straße, Hausnummer</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" name="plzort" id="" placeholder="PLZ, Ort" value="{{ $users->plz.' '.$users->ort }}"><br>
                                                <small>PLZ, Ort</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" name="email" id="" placeholder="E-Mail Adresse" value="{{ $users->email }}"><br>
                                                <small>E-Mail</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 33.3%; padding-right: 5px;">
                                                <input type="text" name="perso" id="" placeholder="Personalausweis- bzw.Pass-Nr."><br>
                                                <small>Personalausweis- bzw.Pass-Nr.</small>
                                            </td>
                                            <td style="width: 33.3%; padding: 0 5px;">
                                                <input type="text" name="behörde" id="" placeholder="ausstellende Behörde"><br>
                                                <small>ausstellende Behörde</small>
                                            </td>
                                            <td style="width: 33.3%; padding-left: 5px;">
                                                <input type="text" name="dtperso" id="" placeholder="Datum der Ausstellung"><br>
                                                <small>Datum der Ausstellung</small>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding-left: 10px;">
                                    <table class="kaeufer">
                                        <tr>
                                            <td style="width: 35%; vertical-align: bottom" class="ueberschriften">Käufer</td>
                                            <td style="width: 65%;" colspan="2">
                                                <input type="text" name="telefonk" id="" placeholder="Telefon"><br>
                                                <small>Telefon</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 75%; padding-right: 5px;" colspan="2">
                                                <input type="text" name="namek" id="" placeholder="Name, Vorname"><br>
                                                <small>Name, Vorname</small>
                                            </td>
                                            <td style="width: 25%; padding-left: 5px;">
                                                <input type="text" name="gebdk" id="" placeholder="Geburtsdatum"><br>
                                                <small>Geburtsdatum</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" name="straßek" id="" placeholder="Straße, Hausnummer"><br>
                                                <small>Straße, Hausnummer</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" name="plzortk" id="" placeholder="PLZ, Ort"><br>
                                                <small>PLZ, Ort</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" name="emailk" id="" placeholder="E-Mail Adresse"><br>
                                                <small>E-Mail</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 33.3%; padding-right: 5px;">
                                                <input type="text" name="persok" id="" placeholder="Personalausweis- bzw.Pass-Nr."><br>
                                                <small>Personalausweis- bzw.Pass-Nr.</small>
                                            </td>
                                            <td style="width: 33.3%; padding: 0 5px;">
                                                <input type="text" name="behördek" id="" placeholder="ausstellende Behörde"><br>
                                                <small>ausstellende Behörde</small>
                                            </td>
                                            <td style="width: 33.3%; padding-left: 5px;">
                                                <input type="text" name="dtpersok" id="" placeholder="Datum der Ausstellung"><br>
                                                <small>Datum der Ausstellung</small>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="ueberschriften" colspan="2" style="padding: 5px 0;">1. Fahrzeug</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; padding-right: 10px;">
                                    <!-- Fahrzeug -->
                                    <table id="fahrzeug">
                                        <tr>
                                            <td style="width: 100%; vertical-align: bottom;" colspan="2">
                                                <input type="text" name="markemodell" id="" value="{{ $verkauf->marke.' '.$verkauf->modell }}">
                                                <div><small>Marke und Modell</small></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%; vertical-align: bottom;">
                                                <input type="text" name="fin" id="" placeholder="Fahrzeugidentifikationsnummer (FIN)">
                                                <div><small>Fahrzeugidentifikationsnummer (FIN)</small></div>
                                            </td>
                                            <td style="width: 50%; vertical-align: bottom;">
                                                <input type="text" name="zulassung" id="" placeholder="Nummer der Zulassungsbescheinigung">
                                                <div><small>Nummer der Zulassungsbescheinigung</small></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Fahrzeug Ende -->
                                </td>
                                <td style="width: 50%; padding-left: 10px;">
                                    <!-- Fahrzeug -->
                                    <table class="fahrzeug">
                                        <tr>
                                            <td style="width: 100%; vertical-align: bottom;" colspan="2">
                                                <input type="text" name="motorisierung" id="" value="{{ $verkauf->ccm.' ccm' }}">
                                                <div><small>Motorisierung</small></div>
                                            </td>
                                            <td style="width: 25%; vertical-align: bottom;">
                                                <input type="text" name="kwps" id="" style="text-align: center;" value="{{ $verkauf->kw.' / '.$verkauf->ps }}">
                                                <div><small>kW/PS</small></div>
                                            </td>
                                            <td style="width: 25%; vertical-align: bottom;">
                                                <input type="text" name="ez" id="" style="text-align: right;" value="{{ $verkauf->ez_monat.'/'.$verkauf->ez }}">
                                                <div><small>Datum der EZ</small></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%; vertical-align: bottom;" colspan="2">
                                                <input type="text" name="kennzeichen" id="" placeholder="Amtliches Kennzeichen">
                                                <div><small>Amtliches Kennzeichen</small></div>
                                            </td>
                                            <td style="width: 50%; vertical-align: bottom;" colspan="2">
                                                <input type="text" name="preis" id="" value="{{ number_format($verkauf->preis, '2', ',', '.').' €' }}">
                                                <div><small>Gesamtkaufpreis</small></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Fahrzeug Ende -->
                                </td>
                            </tr>
                            <tr>
                                <td class="ueberschriften" colspan="2" style="padding: 5px 0;">2. Gewährleistung</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <!-- Gewährleistung -->
                                    <table class="gewaehrleistung">
                                        <tr>
                                            <td>
                                                Das Fahrzeug wird wie besichtigt verkauft. Bestimmte Zusicherungen sind unter Ziffer 3 zusammengefasst. Eine Sachmittelhaftung ist dabei ausgeschlossen. Dieser Ausschluss gilt nicht für Schadensersatzansprüche aus Sachmängelhaftung, die auf einer vorsätzlichen oder grob fahrlässigen Verletzung von Pflichten des Verkäufers beruhen, sowie bei der schuldhaften Verletzung von Leben, Körper und Gesundheit. Soweit Ansprüche aus Sachmängelhaftung gegen Dritte bestehen, werden sie an den Käufer abgetreten.
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Gewährleistung Ende -->
                                </td>
                            </tr>
                            <tr>
                                <td class="ueberschriften" colspan="2" style="padding: 5px 0;">3. Der Verkäufer sichert Folgendes zu:</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="col-md-12 pl-0">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="3_1" id="3.1" value="1">
                                            <label class="custom-control-label" for="3.1">Der Verkäufer ist unbeschränkter Eigentümer von Zubehör und Fahrzeug.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-0">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="3_2" id="3.2" value="1">
                                            <label class="custom-control-label" for="3.2">Das Fahrzeug weist eine Gesamtfahrleistung von&nbsp;</label>
                                            <input type="text" name="fahrleistung1" id="" style="width: 150px; height: 20px;">&nbsp;km auf.
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-0">
                                        Das Fahrzeug ist mit dem&nbsp;
                                        <div class="custom-control custom-checkbox custom-control-inline mr-0">
                                            <input class="custom-control-input" type="checkbox" name="3_3" id="3.3" value="1">
                                            <label class="custom-control-label" for="3.3">Originalmotor oder einem&nbsp;</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="3_4" id="3.4" value="1">
                                            <label class="custom-control-label" for="3.4">Austauschmotor mit einer km-Leistung von&nbsp;</label>
                                            <input type="text" name="amotorkmleistung" id="" style="width: 150px; height: 20px;">&nbsp;km auf.
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-0">
                                        <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                            <input class="custom-control-input" type="checkbox" name="3_5" id="3.5" value="1">
                                            <label class="custom-control-label" for="3.5">Das Fahrzeug hat keinen Unfallschaden erlitten, seit es im Eigentum des Verkäufers war.</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="3_6" id="3.6" value="1">
                                            <label class="custom-control-label" for="3.6">Oder: Das Fahrzeug hatte folgende Unfallschäden:</label>
                                        </div>
                                        <div class="pt-2">
                                            <textarea class="form-control" id="" name="unfallschaeden" rows="4"></textarea>
                                            <small>Beschreibung des Schadens</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ueberschriften" colspan="2" style="padding: 5px 0;">4. Zubehör und Zusatzausstattung</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 5px 0;">
                                    <table class="zubehoer">
                                        <tr>
                                            <td>
                                                <div style="border-bottom: 0.25px solid #ff4400;">
                                                    <input type="text" name="zubehoer" id="">
                                                </div>
                                                <small>Verkauft wird ebenso folgende Zusatzausstattung bzw. Zubehör (z.B. Dachgepäckträger, Winterreifen etc.).</small>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr><tr class="ende">
                                <td style="vertical-align: top; padding-right: 10px; width: 50%;">
                                    <div class="ueberschriften" style="padding-bottom: 5px;">5. Der Verkäufer erklärt Folgendes:</div>
                                    <table id="vereinbarungvk">
                                        <tr>
                                            <td width="100%">
                                                <div class="col-md-12 pl-0">
                                                Das Fahrzeug hatte nach Kenntnis des Verkäufers
                                                <input type="text" name="halter" id="" value="{{ $verkauf->halter }}" style="width: 20px; height: 20px;">&nbsp;Vorbesitzer (exklusive Verkäufer).
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <div class="col-md-12 pl-0">
                                                Das Fahrzeug wurde gewerblich genutzt:
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio" name="gewerblich" id="gewerblichJa" value="Ja" @if (old('gewerblich') == false){{ old('gewerblich') == 'Nein' ? 'checked' : '' }}@else {{'checked'}} @endif>
                                                        <label class="custom-control-label" for="gewerblichJa">ja</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio" name="gewerblich" id="gewerblichNein" value="Nein" @if (old('gewerblich') == true){{ old('gewerblich') == 'Nein' ? 'checked' : '' }}@else {{'checked'}} @endif>
                                                        <label class="custom-control-label" for="gewerblichNein">nein</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <div class="col-md-12 pl-0">
                                                    Das Fahrzeug ist ein Importfahrzeug:
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio" name="import" id="importJa" value="Ja" @if (old('import') == false){{ old('import') == 'Nein' ? 'checked' : '' }}@else {{'checked'}} @endif>
                                                        <label class="custom-control-label" for="importJa">ja</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio" name="import" id="importNein" value="Nein" @if (old('import') == true){{ old('import') == 'Nein' ? 'checked' : '' }}@else {{'checked'}} @endif>
                                                        <label class="custom-control-label" for="importNein">nein</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="ueberschriften" style="padding: 5px 0;">7. Sondervereinbarungen</div>
                                    <table id="sondervereinbarung">
                                        <tr>
                                            <td width="100%">
                                                <textarea class="form-control" id="" name="unfallschaeden" rows="3"></textarea>
                                                <small>(z. B. bei Verkauf eines Sonder-Kfz)</small>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="ueberschriften" style="padding: 5px 0;">9. Bezahlung</div>
                                    <table id="bezahlung">
                                        <tr>
                                            <td width="100%">
                                                <div class="col-md-12 pl-0">
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="verkaufer_bezahlung" id="verkaufer_bezahlung" value="1">
                                                        <label class="custom-control-label" for="verkaufer_bezahlung">Der Verkäufer hat vom Käufer den Kaufpreis in Höhe von&nbsp;</label>
                                                        <input type="text" name="verkaufer_bezahlung_text" id="" style="width: 150px; height: 20px;">&nbsp;erhalten.
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <div class="col-md-12 pl-0">
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="kaufer_bezahlung" id="kaufer_bezahlung" value="1">
                                                        <label class="custom-control-label" for="kaufer_bezahlung">Der Verkäufer hat vom Käufer eine Anzahlung in Höhe von&nbsp;</label>
                                                        <input type="text" name="kaufer_bezahlung_text" id="" style="width: 140px; height: 20px;">&nbsp;erhalten.
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                Das Fahrzeug bleibt bis zur vollständigen Bezahlung des Kaufpreises im Eigentum des Verkäufers.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="vertical-align: top; padding-left: 10px; width: 50%;">
                                    <div class="ueberschriften" style="padding-bottom: 5px;">6. Ummeldung</div>
                                    <table id="ummeldung">
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <div class="col-md-12 pl-0">
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="ummeldung" id="ummeldung_check" value="1">
                                                        <label class="custom-control-label" for="ummeldung_check">Der Käufer verpflichtet sich, das Fahrzeug unverzüglich, spätestens innerhalb einer Woche ab Übergabe, umzumelden.</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>oder</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <div class="col-md-12 pl-0">
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="abmeldung" id="abmeldung" value="1">
                                                        <label class="custom-control-label" for="abmeldung">Der Verkäufer übergibt das Fahrzeug abgemeldet.</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="ueberschriften" style="padding: 10px 0;">8. Kfz-Unterlagen</div>
                                    <table id="ummeldung">
                                        <tr>
                                            <td colspan="2">Der Käufer hat die nachfolgend genannten Unterlagen/Gegenstände vom Verkäufer erhalten:</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="col-md-12 pl-0">
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="zulassungteilI" id="zulassungteilI" value="1">
                                                        <label class="custom-control-label" for="zulassungteilI">Zulassungsbescheinigung Teil I (Fahrzeugschein)</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="stillegung" id="stillegung" value="1">
                                                        <label class="custom-control-label" for="stillegung">Stilllegungsbescheinigung</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="col-md-12 pl-0">
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="zulassungteilII" id="zulassungteilII" value="1">
                                                        <label class="custom-control-label" for="zulassungteilII">Zulassungsbescheinigung Teil II (Fahrzeugbrief)</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="schluessel" id="schluessel" value="1">
                                                        <label class="custom-control-label" for="schluessel">Fahrzeug mit&nbsp; </label>
                                                        <input type="text" name="schluessel_text" id="" style="width: 20px; height: 20px;">&nbsp;Schlüsseln
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 10px 0;">Folgende Zahlungsvereinbarung wurde zwischen den Vertragsparteien getroffen:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <textarea class="form-control" id="" name="unfallschaeden" rows="3"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="ueberschriften pt-3 pb-2">10. Übergabebestätigung</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 10px 0;">
                                    <table id="uebergabe">
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <div class="col-md-12 pl-0">
                                                    <div class="custom-control custom-checkbox custom-control-inline mr-1">
                                                        <input class="custom-control-input" type="checkbox" name="uebergabe" id="uebergabe_check" value="1">
                                                        <label class="custom-control-label" for="uebergabe_check">Hiermit bestätigt der Verkäufer, das Fahrzeug an den Käufer übergeben, und der Käufer, das Fahrzeug von dem Verkäufer erhalten zu haben.</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="2" style="padding-left: 10px; width: 50%;">
                                                <div class="col-md-12 pl-0">
                                                    <input type="text" name="uebergabe_datum" id="" value="Roßleben, ">&nbsp;
                                                    <small>Ort, Datum, Uhrzeit der Fahrzeugübergabe</small>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <div class="row mt-4">
                                <div class="col-md-6">&nbsp;</div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-orange">Erstellen</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
