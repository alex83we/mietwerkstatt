<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Preisschild</title>
    <style>
        @page {
            size: 21cm 29.7cm;
            margin: 0;
        }
        body {
            font-size: 14px;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            padding: 0.5cm 1cm;
        }
        #preisschild, .inner, .inneraus {
            width: 100%;
        }
        #preisschild th {
            text-align: left;
            border-bottom: 3px solid;
        }
        .tdwidth {
            width: 50%;
            vertical-align: top;
        }
        .inner, .inneraus {
            padding: 5px 0;
        }
        .ausstattung {
            height: 190px;
            vertical-align: top;
        }
        .description {
            height: 350px;
            vertical-align: top;
        }
        .description {
            padding: 5px;
        }
        .preis td {
            height: 110px;
            padding: 0 5px;
        }
    </style>
</head>
<body>
<div style="text-align: right;"><img src="images/logoWerkstatt.png" style="width: 250px;"></div>
<h1>{{ $fahrzeuge->anzeigetext }}</h1>
<table id="preisschild">
    <tr>
        <th colspan="3">Technische Daten</th>
    </tr>
    <tr class="daten">
        <td colspan="3">
            <table class="inner">
                <tr>
                    <td class="tdwidth">Leistung kW (PS)</td>
                    <td class="tdwidth">{{ $fahrzeuge->kw .' (' . $fahrzeuge->ps .')'  }}</td>
                    <td class="tdwidth">Erstzulassung</td>
                    <td class="tdwidth">{{ $fahrzeuge->ez_monat . '/' . $fahrzeuge->ez }}</td>
                </tr>
                <tr>
                    <td class="tdwidth">Hubraum (ccm)</td>
                    <td class="tdwidth">{{ $fahrzeuge->ccm  }}</td>
                    <td class="tdwidth">Vorbesitzer</td>
                    <td class="tdwidth">{{ $fahrzeuge->halter }}</td>
                </tr>
                <tr>
                    <td class="tdwidth">Kilometerstand</td>
                    <td class="tdwidth">{{ $fahrzeuge->km  }}</td>
                    <td class="tdwidth">Lackierung</td>
                    <td class="tdwidth">{{ $ausstattung->aussenfarbe }}</td>
                </tr>
                <tr>
                    <td class="tdwidth">Getriebe</td>
                    <td class="tdwidth">{{ $fahrzeuge->getriebe }}</td>
                    <td class="tdwidth">HU/AU</td>
                    <td class="tdwidth">{{ $fahrzeuge->hu }}</td>
                </tr>
                <tr>
                    <td class="tdwidth">Kraftstoff</td>
                    <td class="tdwidth">{{ $fahrzeuge->kraftstoff  }}</td>
                    <td class="tdwidth">Unfallfahrzeug</td>
                    <td class="tdwidth">{{ $fahrzeuge->unfallfahrzeug }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th colspan="3">Ausstattung</th>
    </tr>
    <tr id="ausstattung">
        <td colspan="3" class="ausstattung">
            <table class="inneraus">
                <tr>
                    <td class="tdwidth">
                        @if($ausstattung->anhaengerkupplung == true)
                            <span>{{ $ausstattung->anhaengerkupplung }}</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if($ausstattung->leichtmetallfelgen == true)
                            <span>Leichtmetallfelgen</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if ($ausstattung->selbstlenkend == true)
                        <span>Selbstlenkende Systeme</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if ($ausstattung->scheinwerfer == true)
                            <span>{{ $ausstattung->scheinwerfer }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="tdwidth">
                        @if ($ausstattung->klimatisierung == true)
                            <span>{{ $ausstattung->klimatisierung }}</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if($ausstattung->schiebedach == true)
                            <span>Schiebedach</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if ($ausstattung->vorneep == true and $ausstattung->hintenep == true)
                            <span>Akkustische Einparkhilfe</span>
                        @elseif ($ausstattung->hintenep == true)
                            <span>Akkustische Einparkhilfe</span>
                        @elseif ($ausstattung->vorneep == true)
                            <span>Akkustische Einparkhilfe</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if ($ausstattung->vornesv == true and $ausstattung->hintensh == true)
                            <span> Sitzheizung: Vorne & Hinten </span>
                        @elseif ($ausstattung->vornesv == true)
                            <span>Sitzheizung: Vorne</span>
                        @elseif ($ausstattung->hintensh == true)
                            <span>Sitzheizung: Hinten</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="tdwidth">
                        @if ($ausstattung->tunerradio == true)
                            <span>Tuner/Radio</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if($ausstattung->panoramadach == true)
                            <span>Panorama-Dach</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if ($ausstattung->kamera == true and $ausstattung->kamera_360 == true)
                            <span>Visuelle Einparkhilfe</span>
                        @elseif ($ausstattung->kamera == true)
                            <span>Visuelle Einparkhilfe</span>
                        @elseif ($ausstattung->kamera_360 == true)
                            <span>Visuelle Einparkhilfe</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if($ausstattung->tempomat == true)
                            <span>{{ $ausstattung->tempomat }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="tdwidth">
                        @if ($ausstattung->bluetooth == true)
                            <span>Bluetooth</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if($fahrzeuge->nichtraucher == true)
                            <span>Nichtraucherfahrzeug</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if ($ausstattung->freisprecheinrichtung == true)
                            <span>Freisprecheinrichtung</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="tdwidth">
                        @if ($ausstattung->antiblockiersystem == true)
                            <span>Antiblockiersystem</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        @if($fahrzeuge->scheckheft == true)
                            <span>Scheckheftgepflegt</span>
                        @endif
                    </td>
                    <td class="tdwidth">
                        &nbsp;
                    </td>
                    <td class="tdwidth">
                        &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="description">
            @if($fahrzeuge->beschreibung == true)
                <b>Beschreibung:</b><br>
                {!! Str::limit($fahrzeuge->beschreibung, 1500) !!}
            @endif
        </td>
    </tr>
    <tr>
        <th colspan="3">Barzahlungspreis</th>
    </tr>
    <tr class="preis" style="text-align: center;">
        <td>Weitere Infos unter:<br>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(75)->generate(route('verkauf.show',$fahrzeuge->slug))) !!}">
        </td>
        <td><img src="https://dev.mietwerkstatt-rossleben.de/images/Gruene_Plakette.png" width="100px"></td>
        <td style="text-align: right; font-size: 32px; font-weight: bold;">{{ $fahrzeuge->preis. ' €' }}</td>
    </tr>
</table>
    <div style="padding: 5px;"><b>Link:</b> {{ url($fahrzeuge->slug) }}</div>
</body>
</html>
