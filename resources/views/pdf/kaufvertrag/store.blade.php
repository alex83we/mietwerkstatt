<!DOCTYPE html>
<html>
<head>
    <link rel="canonical" href="{{ url()->full() }}"/>
    <meta name="robots" content="none" />
    <style>
        html {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            width: 21cm;
            max-height: 29.7cm;
            margin: 0 auto;
            font-size: 7px;
        }

        table {
            width: 100%;
        }

        #kaufvertrag, #zulassungsstelle, #versicherung {
            margin: 1cm 1cm 1cm 2cm;
        }

        .ueberschriften {
            font-size: 18px;
            font-weight: bold;
        }

        .ueberschrift {
            font-size: 26px;
            font-weight: bold;
        }

        .small, small {
            font-size: 7px;
            vertical-align: top;
        }

        .gewaehrleistung {
            font-size: 7px;
        }

        .times::before {
            content: url("{{ asset('/images/checkbox.png') }}");
            width: 8px;
            vertical-align: middle;
            padding-right: 2px;
        }

        .check::before {
            content: url("{{ asset('/images/checkbox_clear.png') }}");
            width: 8px;
            vertical-align: middle;
            padding-right: 2px;
        }

        .vermerk {
            margin-left: 2.2cm;
            margin-right: 1.2cm;
        }

        #verkaeufer, #kaeufer, .fahrzeug, #fahrzeug, #unfallschaeden, #sondervereinbarung, #zubehoer, #zahlung {
            font-size: 9px;
        }

        div.page_break + div.page_break {
            page-break-before: always;
        }
    </style>
</head>
<body>
<table id="kaufvertrag">
    <tbody>
    <tr>
        <td colspan="2">
            <div class="ueberschrift">Kaufvertrag für ein gebrauchtes Fahrzeug</div>
        </td>
    </tr>
    <tr>
        <td style="width: 50%; padding-right: 5px;">
            <!-- Verkäufer -->
            <table id="verkaeufer">
                <tr>
                    <td style="width: 35%; vertical-align: bottom !important;" class="ueberschriften">Verkäufer</td>
                    <td style="width: 65%;" colspan="2">
                        @if($request->telefon == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->telefon }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Telefon</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 75%;" colspan="2">
                        @if($request->name == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->name }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Name, Vorname</small></div>
                    </td>
                    <td style="width: 25%;">
                        @if($request->gebd == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->gebd }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Geburtsdatum</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->straße == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->straße }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Straße, Hausnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->plzort == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->plzort }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>PLZ, Ort</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->email == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->email }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>E-Mail</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33.3%">
                        @if($request->perso == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->perso }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Personalausweis- bzw. Pass-Nr.</small></div>
                    </td>
                    <td style="width: 33.4%">
                        @if($request->behörde == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->behörde }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>ausstellende Behörde</small></div>
                    </td>
                    <td style="width: 33.3%">
                        @if($request->dtperso == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->dtperso }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Datum der Ausstellung</small></div>
                    </td>
                </tr>
            </table>
            <!-- Verkäufer Ende -->
        </td>
        <td style="width: 50%; padding-left: 5px;">
            <!-- Käufer -->
            <table id="kaeufer">
                <tr>
                    <td style="width: 35%; vertical-align: bottom;" class="ueberschriften">Käufer</td>
                    <td style="width: 65%;" colspan="2">
                        @if($request->telefonk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->telefonk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Telefon</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 75%;" colspan="2">
                        @if($request->namek == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->namek }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Name, Vorname</small></div>
                    </td>
                    <td style="width: 25%;">
                        @if($request->gebdk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->gebdk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Geburtsdatum</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->straßek == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->straßek }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Straße, Hausnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->plzortk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->plzortk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>PLZ, Ort</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->emailk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->emailk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>E-Mail</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33.3%">
                        @if($request->persok == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->persok }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Personalausweis- bzw. Pass-Nr.</small></div>
                    </td>
                    <td style="width: 33.4%">
                        @if($request->behördek == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->behördek }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>ausstellende Behörde</small></div>
                    </td>
                    <td style="width: 33.3%">
                        @if($request->dtpersok == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->dtpersok }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Datum der Ausstellung</small></div>
                    </td>
                </tr>
            </table>
            <!-- Käufer Ende -->
        </td>
    </tr>
    <tr>
        <td class="ueberschriften" colspan="2" style="padding: 5px 0;">1. Fahrzeug</td>
    </tr>
    <tr>
        <td style="width: 50%; padding-right: 5px;">
            <!-- Fahrzeug -->
            <table id="fahrzeug">
                <tr>
                    <td style="width: 100%; vertical-align: bottom;" colspan="2">
                        @if($request->markemodell == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->markemodell }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Marke und Modell</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; vertical-align: bottom;">
                        @if($request->fin == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->fin }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Fahrzeugidentifikationsnummer (FIN)</small></div>
                    </td>
                    <td style="width: 50%; vertical-align: bottom;">
                        @if($request->zulassung == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->zulassung }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Nummer der Zulassungsbescheinigung</small></div>
                    </td>
                </tr>
            </table>
            <!-- Fahrzeug Ende -->
        </td>
        <td style="width: 50%; padding-left: 5px;">
            <!-- Fahrzeug -->
            <table class="fahrzeug">
                <tr>
                    <td style="width: 100%; vertical-align: bottom;" colspan="2">
                        @if($request->motorisierung == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->motorisierung }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Motorisierung</small></div>
                    </td>
                    <td style="width: 25%; vertical-align: bottom;">
                        @if($request->kwps == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->kwps }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>kW/PS</small></div>
                    </td>
                    <td style="width: 25%; vertical-align: bottom;">
                        @if($request->ez == true)
                            <div
                                style="border-bottom: 0.25px solid #ff4400; text-align: right;">{{ $request->ez }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Datum der EZ</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; vertical-align: bottom;" colspan="2">
                        @if($request->kennzeichen == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->kennzeichen }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Amtliches Kennzeichen</small></div>
                    </td>
                    <td style="width: 50%; vertical-align: bottom;" colspan="2">
                        @if($request->preis == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->preis }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
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
                        Das Fahrzeug wird wie besichtigt verkauft. Bestimmte Zusicherungen sind unter Ziffer 3
                        zusammengefasst. Eine Sachmittelhaftung ist dabei ausgeschlossen. Dieser Ausschluss gilt nicht
                        für Schadensersatzansprüche aus Sachmängelhaftung, die auf einer vorsätzlichen oder grob
                        fahrlässigen Verletzung von Pflichten des Verkäufers beruhen, sowie bei der schuldhaften
                        Verletzung von Leben, Körper und Gesundheit. Soweit Ansprüche aus Sachmängelhaftung gegen Dritte
                        bestehen, werden sie an den Käufer abgetreten.
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
            <table class="punkt3">
                <tr>
                    <td>
                        <div>
                            @if($request->drei_eins == "1")
                                <span class="times"></span>
                            @else
                                <span class="check"></span>
                            @endif
                            Der Verkäufer ist unbeschränkter Eigentümer von Zubehör und Fahrzeug.
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($request->drei_zwei == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Das Fahrzeug weist eine Gesamtfahrleistung von
                        @if($request->fahrleistung1 == true)
                            <div
                                style="margin: 0; width: 75px; display: inline-block; text-align: center">{{ $request->fahrleistung1 }}</div>
                        @else
                            <div
                                style="margin: 0; width: 75px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center">
                                &nbsp;
                            </div>
                        @endif
                        km auf.
                    </td>
                </tr>
                <tr>
                    <td>
                        Das Fahrzeug ist mit dem
                        @if($request->drei_drei == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Originalmotor oder einem
                        @if($request->drei_vier == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Austauschmotor mit einer km-Leistung von
                        @if($request->amotorkmleistung == true)
                            <div
                                style="margin: 0; width: 75px; display: inline-block; text-align: center">{{ $request->amotorkmleistung }}</div>
                        @else
                            <div
                                style="margin: 0; width: 75px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center">
                                &nbsp;
                            </div>
                        @endif
                        km ausgerüstet.
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($request->drei_fuenf == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Das Fahrzeug hat keinen Unfallschaden erlitten, seit es im Eigentum des Verkäufers war.
                        @if($request->drei_sechs == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Oder: Das Fahrzeug hatte folgende Unfallschäden:
                        <div
                            style="border: 0.25px solid #ff4400; height: 60px; max-height: 60px; margin-top: 5px; padding: 2px;">
                            {!! Str::limit(nl2br($request->unfallschaeden_text), 1250) !!}
                        </div>
                        <small>Beschreibung des Schadens</small>
                    </td>
                </tr>
            </table>
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
                        <div style="border-bottom: 0.25px solid #ff4400;" id="zubehoer">
                            @if($request->zubehoer == true)
                                {{ $request->zubehoer }}
                            @else
                                &nbsp;
                            @endif
                        </div>
                        <small>Verkauft wird ebenso folgende Zusatzausstattung bzw. Zubehör (z.B. Dachgepäckträger,
                            Winterreifen etc.).</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="ende">
        <td style="vertical-align: top; padding-right: 5px; width: 50%;">
            <div class="ueberschriften" style="padding-bottom: 5px;">5. Der Verkäufer erklärt Folgendes:</div>
            <table id="vereinbarungvk">
                <tr>
                    <td width="100%">
                        Das Fahrzeug hatte nach Kenntnis des Verkäufers
                        @if($request->halter == true)
                            <div style="margin: 0; width: 15px; display: inline; text-align: center;">
                                &nbsp;{{ $request->halter }}&nbsp;
                            </div>
                        @else
                            <div
                                style="margin: 0; width: 15px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>
                        @endif
                        &nbsp;Vorbesitzer (exklusive Verkäufer).
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        Das Fahrzeug wurde gewerblich genutzt:
                        @if($request->gewerblich == "Ja")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;ja&nbsp;
                        @if($request->gewerblich == "Nein")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;nein
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        Das Fahrzeug ist ein Importfahrzeug:
                        @if($request->import == "Ja")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;ja&nbsp;
                        @if($request->import == "Nein")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;nein
                    </td>
                </tr>
            </table>
            <div class="ueberschriften" style="padding: 5px 0;">7. Sondervereinbarungen</div>
            <table id="sondervereinbarung">
                <tr>
                    <td width="100%">
                        <div style="border: 0.25px solid #ff4400; height: 60px; max-height: 60px; padding: 2px"
                             id="sondervereinbarung">
                            {!! Str::limit(nl2br($request->sondervereinbarung_text), 380) !!}
                        </div>
                        <small>(z. B. bei Verkauf eines Sonder-Kfz)</small>
                    </td>
                </tr>
            </table>
            <div class="ueberschriften" style="padding: 5px 0;">9. Bezahlung</div>
            <table id="bezahlung">
                <tr>
                    <td width="100%">
                        @if($request->verkaufer_bezahlung == true)
                            <span class="times"></span>
                        @endif
                        @if($request->verkaufer_bezahlung == false)
                            <span class="check"></span>
                        @endif
                        Der Verkäufer hat vom Käufer den Kaufpreis in Höhe von
                        @if($request->verkaufer_bezahlung_text == true)
                            <div style="margin: 0; width: 15px; display: inline; text-align: center;">
                                &nbsp;{{ $request->verkaufer_bezahlung_text }} </div>
                        @else
                            <div
                                style="margin: 0; width: 15px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>
                        @endif
                        &nbsp;erhalten
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        @if($request->kaufer_bezahlung == true)
                            <span class="times"></span>
                        @endif
                        @if($request->kaufer_bezahlung == false)
                            <span class="check"></span>
                        @endif
                        Der Verkäufer hat vom Käufer eine Anzahlung in Höhe von
                        @if($request->kaufer_bezahlung_text == true)
                            <div style="margin: 0; width: 15px; display: inline; text-align: center;">
                                &nbsp;{{ $request->kaufer_bezahlung_text }} </div>
                        @else
                            <div
                                style="margin: 0; width: 15px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>
                        @endif
                        &nbsp;erhalten
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        Das Fahrzeug bleibt bis zur vollständigen Bezahlung des Kaufpreises im Eigentum des Verkäufers.
                    </td>
                </tr>
            </table>
        </td>
        <td style="vertical-align: top; padding-left: 5px; width: 50%;">
            <div class="ueberschriften" style="padding-bottom: 5px;">6. Ummeldung</div>
            <table id="ummeldung">
                <tr>
                    <td style="width: 5%">
                        @if($request->ummeldung == true)
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                    </td>
                    <td style="width: 95%">Der Käufer verpflichtet sich, das Fahrzeug unverzüglich, spätestens innerhalb
                        einer Woche ab Übergabe, umzumelden.
                    </td>
                </tr>
                <tr>
                    <td colspan="2">oder</td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" style="width: 5%">
                        @if($request->abmeldung == true)
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                    </td>
                    <td style="width: 95%">Der Verkäufer übergibt das Fahrzeug abgemeldet.</td>
                </tr>
            </table>
            <div class="ueberschriften" style="padding: 10px 0;">8. Kfz-Unterlagen</div>
            <table id="unterlagen">
                <tr>
                    <td colspan="4">Der Käufer hat die nachfolgend genannten Unterlagen/Gegenstände vom Verkäufer
                        erhalten:
                    </td>
                </tr>
                <tr>
                    <td style="width: 2%">
                        @if($request->zulassungteilI == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 58%">Zulassungsbescheinigung Teil I (Fahrzeugschein)</td>
                    <td style="width: 2%">
                        @if($request->stillegung == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 40%">Stilllegungsbescheinigung</td>
                </tr>
                <tr>
                    <td style="width: 2%">
                        @if($request->zulassungteilII == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 58%">Zulassungsbescheinigung Teil II (Fahrzeugbrief)</td>
                    <td style="width: 2%">
                        @if($request->schluessel == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 40%">Fahrzeug mit
                        @if($request->schluessel_text == true)
                            <div
                                style="margin: 0; width: 15px; display: inline; text-align: center;">{{ $request->schluessel_text }}</div>
                            &nbsp;Schlüsseln
                        @else
                            <div
                                style="margin: 0; width: 10px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>&nbsp;Schlüsseln
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 17px 0 3px;">Folgende Zahlungsvereinbarung wurde zwischen den
                        Vertragsparteien getroffen:
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div style="border: 0.25px solid #ff4400; height: 55px; max-height: 55px; padding: 2px"
                             id="zahlung">
                            {!! Str::limit(nl2br($request->unfallschaeden), 300) !!}
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table id="ummeldung">
                <tr>
                    <td style="vertical-align: bottom; padding-right: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Verkäufer</small>
                    </td>
                    <td style="vertical-align: bottom; padding-left: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Käufer</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 10px 0;">
            <table id="uebergabe">
                <tr>
                    <td style="vertical-align: top;" style="width: 2%">
                        @if($request->uebergabe == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 48%">Hiermit bestätigt der Verkäufer, das Fahrzeug an den Käufer übergeben, und
                        der Käufer, das Fahrzeug von dem Verkäufer erhalten zu haben.
                    </td>
                    <td colspan="2" style="padding-left: 10px; width: 50%;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400;">{{ $request->uebergabe_datum }}</div>
                        <small>Ort, Datum, Uhrzeit der Fahrzeugübergabe</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="ueberhabe">
                <tr>
                    <td style="vertical-align: bottom; padding-right: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Verkäufer</small>
                    </td>
                    <td style="vertical-align: bottom; padding-left: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Käufer</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<div class="vermerk">
    <span style="float: left;">Für den Verkäufer</span>
    <span style="float: right;">Seite 1</span>
</div>
<div class="page_break"></div>
<table id="kaufvertrag">
    <tbody>
    <tr>
        <td colspan="2">
            <div class="ueberschrift">Kaufvertrag für ein gebrauchtes Fahrzeug</div>
        </td>
    </tr>
    <tr>
        <td style="width: 50%; padding-right: 5px;">
            <!-- Verkäufer -->
            <table id="verkaeufer">
                <tr>
                    <td style="width: 35%; vertical-align: bottom !important;" class="ueberschriften">Verkäufer</td>
                    <td style="width: 65%;" colspan="2">
                        @if($request->telefon == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->telefon }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Telefon</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 75%;" colspan="2">
                        @if($request->name == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->name }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Name, Vorname</small></div>
                    </td>
                    <td style="width: 25%;">
                        @if($request->gebd == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->gebd }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Geburtsdatum</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->straße == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->straße }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Straße, Hausnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->plzort == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->plzort }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>PLZ, Ort</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->email == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->email }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>E-Mail</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33.3%">
                        @if($request->perso == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->perso }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Personalausweis- bzw. Pass-Nr.</small></div>
                    </td>
                    <td style="width: 33.4%">
                        @if($request->behörde == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->behörde }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>ausstellende Behörde</small></div>
                    </td>
                    <td style="width: 33.3%">
                        @if($request->dtperso == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->dtperso }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Datum der Ausstellung</small></div>
                    </td>
                </tr>
            </table>
            <!-- Verkäufer Ende -->
        </td>
        <td style="width: 50%; padding-left: 5px;">
            <!-- Käufer -->
            <table id="kaeufer">
                <tr>
                    <td style="width: 35%; vertical-align: bottom;" class="ueberschriften">Käufer</td>
                    <td style="width: 65%;" colspan="2">
                        @if($request->telefonk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->telefonk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Telefon</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 75%;" colspan="2">
                        @if($request->namek == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->namek }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Name, Vorname</small></div>
                    </td>
                    <td style="width: 25%;">
                        @if($request->gebdk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->gebdk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Geburtsdatum</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->straßek == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->straßek }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Straße, Hausnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->plzortk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->plzortk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>PLZ, Ort</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        @if($request->emailk == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->emailk }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>E-Mail</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33.3%">
                        @if($request->persok == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->persok }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Personalausweis- bzw. Pass-Nr.</small></div>
                    </td>
                    <td style="width: 33.4%">
                        @if($request->behördek == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->behördek }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>ausstellende Behörde</small></div>
                    </td>
                    <td style="width: 33.3%">
                        @if($request->dtpersok == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->dtpersok }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Datum der Ausstellung</small></div>
                    </td>
                </tr>
            </table>
            <!-- Käufer Ende -->
        </td>
    </tr>
    <tr>
        <td class="ueberschriften" colspan="2" style="padding: 5px 0;">1. Fahrzeug</td>
    </tr>
    <tr>
        <td style="width: 50%; padding-right: 5px;">
            <!-- Fahrzeug -->
            <table id="fahrzeug">
                <tr>
                    <td style="width: 100%; vertical-align: bottom;" colspan="2">
                        @if($request->markemodell == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->markemodell }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Marke und Modell</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; vertical-align: bottom;">
                        @if($request->fin == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->fin }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Fahrzeugidentifikationsnummer (FIN)</small></div>
                    </td>
                    <td style="width: 50%; vertical-align: bottom;">
                        @if($request->zulassung == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->zulassung }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Nummer der Zulassungsbescheinigung</small></div>
                    </td>
                </tr>
            </table>
            <!-- Fahrzeug Ende -->
        </td>
        <td style="width: 50%; padding-left: 5px;">
            <!-- Fahrzeug -->
            <table class="fahrzeug">
                <tr>
                    <td style="width: 100%; vertical-align: bottom;" colspan="2">
                        @if($request->motorisierung == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->motorisierung }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Motorisierung</small></div>
                    </td>
                    <td style="width: 25%; vertical-align: bottom;">
                        @if($request->kwps == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->kwps }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>kW/PS</small></div>
                    </td>
                    <td style="width: 25%; vertical-align: bottom;">
                        @if($request->ez == true)
                            <div
                                style="border-bottom: 0.25px solid #ff4400; text-align: right;">{{ $request->ez }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Datum der EZ</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; vertical-align: bottom;" colspan="2">
                        @if($request->kennzeichen == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->kennzeichen }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Amtliches Kennzeichen</small></div>
                    </td>
                    <td style="width: 50%; vertical-align: bottom;" colspan="2">
                        @if($request->preis == true)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->preis }}</div>
                        @else
                            <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
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
                        Das Fahrzeug wird wie besichtigt verkauft. Bestimmte Zusicherungen sind unter Ziffer 3
                        zusammengefasst. Eine Sachmittelhaftung ist dabei ausgeschlossen. Dieser Ausschluss gilt nicht
                        für Schadensersatzansprüche aus Sachmängelhaftung, die auf einer vorsätzlichen oder grob
                        fahrlässigen Verletzung von Pflichten des Verkäufers beruhen, sowie bei der schuldhaften
                        Verletzung von Leben, Körper und Gesundheit. Soweit Ansprüche aus Sachmängelhaftung gegen Dritte
                        bestehen, werden sie an den Käufer abgetreten.
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
            <table class="punkt3">
                <tr>
                    <td>
                        <div>
                            @if($request->drei_eins == "1")
                                <span class="times"></span>
                            @else
                                <span class="check"></span>
                            @endif
                            Der Verkäufer ist unbeschränkter Eigentümer von Zubehör und Fahrzeug.
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($request->drei_zwei == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Das Fahrzeug weist eine Gesamtfahrleistung von
                        @if($request->fahrleistung1 == true)
                            <div
                                style="margin: 0; width: 75px; display: inline-block; text-align: center">{{ $request->fahrleistung1 }}</div>
                        @else
                            <div
                                style="margin: 0; width: 75px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center">
                                &nbsp;
                            </div>
                        @endif
                        km auf.
                    </td>
                </tr>
                <tr>
                    <td>
                        Das Fahrzeug ist mit dem
                        @if($request->drei_drei == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Originalmotor oder einem
                        @if($request->drei_vier == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Austauschmotor mit einer km-Leistung von
                        @if($request->amotorkmleistung == true)
                            <div
                                style="margin: 0; width: 75px; display: inline-block; text-align: center">{{ $request->amotorkmleistung }}</div>
                        @else
                            <div
                                style="margin: 0; width: 75px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center">
                                &nbsp;
                            </div>
                        @endif
                        km ausgerüstet.
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($request->drei_fuenf == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Das Fahrzeug hat keinen Unfallschaden erlitten, seit es im Eigentum des Verkäufers war.
                        @if($request->drei_sechs == "1")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                        Oder: Das Fahrzeug hatte folgende Unfallschäden:
                        <div
                            style="border: 0.25px solid #ff4400; height: 60px; max-height: 60px; margin-top: 5px; padding: 2px;">
                            {!! Str::limit(nl2br($request->unfallschaeden_text), 1250) !!}
                        </div>
                        <small>Beschreibung des Schadens</small>
                    </td>
                </tr>
            </table>
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
                        <div style="border-bottom: 0.25px solid #ff4400;" id="zubehoer">
                            @if($request->zubehoer == true)
                                {{ $request->zubehoer }}
                            @else
                                &nbsp;
                            @endif
                        </div>
                        <small>Verkauft wird ebenso folgende Zusatzausstattung bzw. Zubehör (z.B. Dachgepäckträger,
                            Winterreifen etc.).</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="ende">
        <td style="vertical-align: top; padding-right: 5px; width: 50%;">
            <div class="ueberschriften" style="padding-bottom: 5px;">5. Der Verkäufer erklärt Folgendes:</div>
            <table id="vereinbarungvk">
                <tr>
                    <td width="100%">
                        Das Fahrzeug hatte nach Kenntnis des Verkäufers
                        @if($request->halter == true)
                            <div style="margin: 0; width: 15px; display: inline; text-align: center;">
                                &nbsp;{{ $request->halter }}&nbsp;
                            </div>
                        @else
                            <div
                                style="margin: 0; width: 15px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>
                        @endif
                        &nbsp;Vorbesitzer (exklusive Verkäufer).
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        Das Fahrzeug wurde gewerblich genutzt:
                        @if($request->gewerblich == "Ja")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;ja&nbsp;
                        @if($request->gewerblich == "Nein")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;nein
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        Das Fahrzeug ist ein Importfahrzeug:
                        @if($request->import == "Ja")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;ja&nbsp;
                        @if($request->import == "Nein")
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif&nbsp;nein
                    </td>
                </tr>
            </table>
            <div class="ueberschriften" style="padding: 5px 0;">7. Sondervereinbarungen</div>
            <table id="sondervereinbarung">
                <tr>
                    <td width="100%">
                        <div style="border: 0.25px solid #ff4400; height: 60px; max-height: 60px; padding: 2px"
                             id="sondervereinbarung">
                            {!! Str::limit(nl2br($request->sondervereinbarung_text), 380) !!}
                        </div>
                        <small>(z. B. bei Verkauf eines Sonder-Kfz)</small>
                    </td>
                </tr>
            </table>
            <div class="ueberschriften" style="padding: 5px 0;">9. Bezahlung</div>
            <table id="bezahlung">
                <tr>
                    <td width="100%">
                        @if($request->verkaufer_bezahlung == true)
                            <span class="times"></span>
                        @endif
                        @if($request->verkaufer_bezahlung == false)
                            <span class="check"></span>
                        @endif
                        Der Verkäufer hat vom Käufer den Kaufpreis in Höhe von
                        @if($request->verkaufer_bezahlung_text == true)
                            <div style="margin: 0; width: 15px; display: inline; text-align: center;">
                                &nbsp;{{ $request->verkaufer_bezahlung_text }} </div>
                        @else
                            <div
                                style="margin: 0; width: 15px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>
                        @endif
                        &nbsp;erhalten
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        @if($request->kaufer_bezahlung == true)
                            <span class="times"></span>
                        @endif
                        @if($request->kaufer_bezahlung == false)
                            <span class="check"></span>
                        @endif
                        Der Verkäufer hat vom Käufer eine Anzahlung in Höhe von
                        @if($request->kaufer_bezahlung_text == true)
                            <div style="margin: 0; width: 15px; display: inline; text-align: center;">
                                &nbsp;{{ $request->kaufer_bezahlung_text }} </div>
                        @else
                            <div
                                style="margin: 0; width: 15px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>
                        @endif
                        &nbsp;erhalten
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        Das Fahrzeug bleibt bis zur vollständigen Bezahlung des Kaufpreises im Eigentum des Verkäufers.
                    </td>
                </tr>
            </table>
        </td>
        <td style="vertical-align: top; padding-left: 5px; width: 50%;">
            <div class="ueberschriften" style="padding-bottom: 5px;">6. Ummeldung</div>
            <table id="ummeldung">
                <tr>
                    <td style="width: 5%">
                        @if($request->ummeldung == true)
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                    </td>
                    <td style="width: 95%">Der Käufer verpflichtet sich, das Fahrzeug unverzüglich, spätestens innerhalb
                        einer Woche ab Übergabe, umzumelden.
                    </td>
                </tr>
                <tr>
                    <td colspan="2">oder</td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" style="width: 5%">
                        @if($request->abmeldung == true)
                            <span class="times"></span>
                        @else
                            <span class="check"></span>
                        @endif
                    </td>
                    <td style="width: 95%">Der Verkäufer übergibt das Fahrzeug abgemeldet.</td>
                </tr>
            </table>
            <div class="ueberschriften" style="padding: 10px 0;">8. Kfz-Unterlagen</div>
            <table id="unterlagen">
                <tr>
                    <td colspan="4">Der Käufer hat die nachfolgend genannten Unterlagen/Gegenstände vom Verkäufer
                        erhalten:
                    </td>
                </tr>
                <tr>
                    <td style="width: 2%">
                        @if($request->zulassungteilI == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 58%">Zulassungsbescheinigung Teil I (Fahrzeugschein)</td>
                    <td style="width: 2%">
                        @if($request->stillegung == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 40%">Stilllegungsbescheinigung</td>
                </tr>
                <tr>
                    <td style="width: 2%">
                        @if($request->zulassungteilII == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 58%">Zulassungsbescheinigung Teil II (Fahrzeugbrief)</td>
                    <td style="width: 2%">
                        @if($request->schluessel == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 40%">Fahrzeug mit
                        @if($request->schluessel_text == true)
                            <div
                                style="margin: 0; width: 15px; display: inline; text-align: center;">{{ $request->schluessel_text }}</div>
                            &nbsp;Schlüsseln
                        @else
                            <div
                                style="margin: 0; width: 10px; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                                &nbsp;
                            </div>&nbsp;Schlüsseln
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 17px 0 3px;">Folgende Zahlungsvereinbarung wurde zwischen den
                        Vertragsparteien getroffen:
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div style="border: 0.25px solid #ff4400; height: 55px; max-height: 55px; padding: 2px"
                             id="zahlung">
                            {!! Str::limit(nl2br($request->unfallschaeden), 300) !!}
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table id="ummeldung">
                <tr>
                    <td style="vertical-align: bottom; padding-right: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Verkäufer</small>
                    </td>
                    <td style="vertical-align: bottom; padding-left: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Käufer</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 10px 0;">
            <table id="uebergabe">
                <tr>
                    <td style="vertical-align: top;" style="width: 2%">
                        @if($request->uebergabe == true)
                            <span class="times" style="padding: 0;"></span>
                        @else
                            <span class="check" style="padding: 0;"></span>
                        @endif
                    </td>
                    <td style="width: 48%">Hiermit bestätigt der Verkäufer, das Fahrzeug an den Käufer übergeben, und
                        der Käufer, das Fahrzeug von dem Verkäufer erhalten zu haben.
                    </td>
                    <td colspan="2" style="padding-left: 10px; width: 50%;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400;">{{ $request->uebergabe_datum }}</div>
                        <small>Ort, Datum, Uhrzeit der Fahrzeugübergabe</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="ueberhabe">
                <tr>
                    <td style="vertical-align: bottom; padding-right: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Verkäufer</small>
                    </td>
                    <td style="vertical-align: bottom; padding-left: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Käufer</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<div class="vermerk">
    <span style="float: left;">Für den Käufer</span>
    <span style="float: right;">Seite 2</span>
</div>
<div class="page_break"></div>
<div class="ueberschrift" style="padding-top: 1cm; border-bottom: 2px dashed #000000; padding-bottom: 10px"><span id="versicherung">An die Versicherung und die Zulassungsstelle</span></div>
<table id="versicherung" style="border: 2px solid #ff4400;">
    <tbody>
    <tr>
        <td class="ueberschriften">Mitteilung über den Verkauf des Fahrzeuges</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td style="width: 65%">
                        <div
                            style="border-bottom: 0.25px solid #ff4400;">{{ $request->name }}</div>
                        <div><small>Name, Vorname des Verkäufers</small></div>
                    </td>
                    <td style="width: 32.5%">
                        @if($request->versicherungnr)
                        <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->versicherungnr }}</div>
                        @else
                        <div style="border-bottom: 0.25px solid #ff4400;">&nbsp;</div>
                        @endif
                        <div><small>Kraftfahrzeugversicherungsnummer</small></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="ueberschriften">Mein Fahrzeug</td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 32.5%">
                        @if($request->kennzeichen)
                            <div
                                style="border-bottom: 0.25px solid #ff4400; width: 100%">{{ $request->kennzeichen }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>mit dem Kennzeichen</small></div>
                    </td>
                    <td style="width: 65%">
                        @if($request->fin)
                            <div style="border-bottom: 0.25px solid #ff4400; width: 100%">{{ $request->fin }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Fahrzeugidentifikationsnummer (FIN)</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 67.5%">
                        <div
                            style="border-bottom: 0.25px solid #ff4400; width: 100%">{{ $request->markemodell }}</div>
                        <div><small>Marke, Modell</small></div>
                    </td>
                    <td style="width: 32.5%">
                        <div
                            style="border-bottom: 0.25px solid #ff4400; width: 100%">{{ $request->motorisierung.' ('.$request->kwps.')' }}</div>
                        <div><small>Motorisierung (kW / PS)</small></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="ueberschriften">habe ich verkauft an:</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td style="width: 65%">
                        @if($request->namek)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->namek }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Name, Vorname des Käufers</small></div>
                    </td>
                    <td style="width: 32.5%">
                        @if($request->persok)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->persok }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Personalausweisnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if($request->straßek)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->straßek }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Straße und Hausnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if($request->plzortk)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->plzortk }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>PLZ und Ort</small></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="ueberschriften">Folgende Unterlagen wurden dem Käufer ausgehändigt:</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td colspan="2">
                        <div style="padding-top: 3px;">
                            @if($request->zulassungteilI == true)
                                <span class="times" style="padding: 0;"></span>
                            @else
                                <span class="check" style="padding: 0;"></span>
                            @endif
                            Zulassungsbescheinigung Teil I (Fahrzeugschein)
                        </div>
                        <div style="padding-top: 3px;">
                            @if($request->zulassungteilII == true)
                                <span class="times" style="padding: 0;"></span>
                            @else
                                <span class="check" style="padding: 0;"></span>
                            @endif
                            Zulassungsbescheinigung Teil II (Fahrzeugbrief)
                        </div>
                        <div style="padding-top: 3px;">
                            @if($request->bescheinigunghu == true)
                                <span class="times" style="padding: 0;"></span>
                            @else
                                <span class="check" style="padding: 0;"></span>
                            @endif
                            Bescheinigung über die letzte Hauptuntersuchung (HU)
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; padding-top: 15px;">{{ $request->uebergabe_datum }}</div>
                        <small>Ort, Datum, Uhrzeit der Fahrzeugübergabe</small>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: bottom; padding-right: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Verkäufer</small>
                    </td>
                    <td style="vertical-align: bottom; padding-left: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Käufer</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<div style="border-bottom: 2px dashed #000000; padding-bottom: 10px"><span>&nbsp;</span></div>
<table id="versicherung" style="border: 2px solid #ff4400;">
    <tbody>
    <tr>
        <td class="ueberschriften">Veräußerungsmeldung gemäß § 13 IV FZV an die Zulassungsstelle</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td style="width: 65%">
                        <div
                            style="border-bottom: 0.25px solid #ff4400;">{{ $request->name }}</div>
                        <div><small>Name, Vorname des Verkäufers</small></div>
                    </td>
                    <td style="width: 32.5%">
                        &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="ueberschriften">Mein Fahrzeug</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td style="width: 32.5%">
                        @if($request->kennzeichen)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->kennzeichen }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>mit dem Kennzeichen</small></div>
                    </td>
                    <td style="width: 65%">
                        @if($request->fin)
                            <div style="border-bottom: 0.25px solid #ff4400;">{{ $request->fin }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Fahrzeugidentifikationsnummer (FIN)</small></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 65%">
                        <div
                            style="border-bottom: 0.25px solid #ff4400;">{{ $request->markemodell }}</div>
                        <div><small>Marke, Modell</small></div>
                    </td>
                    <td style="width: 32.5%">
                        <div
                            style="border-bottom: 0.25px solid #ff4400;">{{ $request->motorisierung.' ('.$request->kwps.')' }}</div>
                        <div><small>Motorisierung (kW / PS)</small></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="ueberschriften">habe ich verkauft an:</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td style="width: 65%">
                        @if($request->namek)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->namek }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Name, Vorname des Käufers</small></div>
                    </td>
                    <td style="width: 32.5%">
                        @if($request->persok)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->persok }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Personalausweisnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if($request->straßek)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->straßek }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>Straße und Hausnummer</small></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if($request->plzortk)
                            <div
                                style="border-bottom: 0.25px solid #ff4400;">{{ $request->plzortk }}</div>
                        @else
                            <div
                                style="border-bottom: 0.25px solid #ff4400; display: inline-block; width: 100%;">
                                &nbsp;
                            </div>
                        @endif
                        <div><small>PLZ und Ort</small></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="ueberschriften">Folgende Unterlagen wurden dem Käufer ausgehändigt:</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td colspan="2">
                        <div style="padding-top: 3px;">
                            @if($request->zulassungteilI == true)
                                <span class="times" style="padding: 0;"></span>
                            @else
                                <span class="check" style="padding: 0;"></span>
                            @endif
                            Zulassungsbescheinigung Teil I (Fahrzeugschein)
                        </div>
                        <div style="padding-top: 3px;">
                            @if($request->zulassungteilII == true)
                                <span class="times" style="padding: 0;"></span>
                            @else
                                <span class="check" style="padding: 0;"></span>
                            @endif
                            Zulassungsbescheinigung Teil II (Fahrzeugbrief)
                        </div>
                        <div style="padding-top: 3px;">
                            @if($request->bescheinigunghu == true)
                                <span class="times" style="padding: 0;"></span>
                            @else
                                <span class="check" style="padding: 0;"></span>
                            @endif
                            Bescheinigung über die letzte Hauptuntersuchung (HU)
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; padding-top: 15px;">{{ $request->uebergabe_datum }}</div>
                        <small>Ort, Datum, Uhrzeit der Fahrzeugübergabe</small>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: bottom; padding-right: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Verkäufer</small>
                    </td>
                    <td style="vertical-align: bottom; padding-left: 10px; width: 50%; height: 60px;">
                        <div
                            style="margin: 0; width: 100%; display: inline-block; border-bottom: 0.25px solid #ff4400; text-align: center;">
                            &nbsp;
                        </div>
                        <small>Unterschrift Käufer</small>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<div style="border-bottom: 2px dashed #000000; padding-bottom: 10px"><span>&nbsp;</span></div>
<div class="vermerk">
    <span style="float: left;">&nbsp;</span>
    <span style="float: right;">Seite 3</span>
</div>
</body>
</html>
