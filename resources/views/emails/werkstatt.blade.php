<!doctype html>

<html lang="de">
<head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .border-top {
            border-top: 1px solid #343a40;
        }
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
<div
    style="display: none; font-size: 1px; color: #3d4852; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#343a40" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#343a40" align="center" style="padding: 0px 10px 0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top"
                        style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 48px; font-weight: 400; margin: 2px;">Werkstattanfrage</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;">
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 0px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                        @if($werkstatt['anrede'] == 'Herr')
                            {{ $werkstatt['anrede']. ' ' }}
                        @elseif($werkstatt['anrede'] == 'Frau')
                            {{ $werkstatt['anrede']. ' ' }}
                        @else
                            {{ $werkstatt['anrede'] . ' ' . $werkstatt['firma'] }}<br>
                        @endif
                        @if($werkstatt['vorname'] == true and $werkstatt['nachname'] == true)
                            {{ $werkstatt['vorname'] . ' ' . $werkstatt['nachname']  }}<br>
                        @endif
                        @if($werkstatt['strasse'] == true)
                            {{ $werkstatt['strasse']  }}<br>
                        @endif
                        @if($werkstatt['plz'] == true and $werkstatt['ort'] == true)
                            {{ $werkstatt['plz'] . ' ' . $werkstatt['ort']  }}<br>
                        @endif
                        @if($werkstatt['email'] == true and $werkstatt['tel'] == true)
                            {{ 'E-Mail: ' . $werkstatt['email'] }}<br>{{ 'Telefon: ' . $werkstatt['tel'] }}<br><br>
                        @elseif($werkstatt['tel'] == true)
                            {{ 'Telefon: ' . $werkstatt['tel'] }}<br><br>
                        @else
                            {{ 'E-Mail: ' . $werkstatt['email'] }}<br><br>
                        @endif
                        @if($werkstatt['wtermin'] == true and $werkstatt['wterminuhrzeit'] == true and $werkstatt['wterminuhrzeit1'])
                            {{ 'Wunschtermin am: '. \Carbon\Carbon::parse($werkstatt['wtermin'])->isoFormat('DD.MM.YYYY') .' um: '.$werkstatt['wterminuhrzeit'].':'.$werkstatt['wterminuhrzeit1'] }}<br>
                        @endif
                        <br>
                        @if($werkstatt['atermin'] == true and $werkstatt['aterminuhrzeit'] == true and $werkstatt['aterminuhrzeit1'])
                            {{ 'Alternativtermin am: '. \Carbon\Carbon::parse($werkstatt['atermin'])->isoFormat('DD.MM.YYYY') .' um: '.$werkstatt['aterminuhrzeit'].':'.$werkstatt['aterminuhrzeit1'] }}<br>
                        @else
                            Keinen Alternativtermin angegeben eventuell per Telefon erfragen: {{ $werkstatt['tel'] }}<br>
                        @endif
                        <br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @if($werkstatt['fahrzeug'] == true or $werkstatt['kennzeichen'] == true or $werkstatt['fahrgestell'] == true or $werkstatt['km'] == true or $werkstatt['bj'] == true)
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;" class="border-top">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 10px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                            <table width="100%">
                                <tr>
                                    <td colspan="4" style="font-weight: bold;">
                                        Fahrzeugdaten
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hersteller / Modell:</td>
                                    <td>{{ $werkstatt['fahrzeug'] }}</td>
                                    <td>Kennzeichen:</td>
                                    <td>{{ $werkstatt['kennzeichen'] }}</td>
                                </tr>
                                <tr>
                                    <td>Fahrgestellnummer:</td>
                                    @if($werkstatt['fahrgestell'])
                                        <td>{{ $werkstatt['fahrgestell'] }}</td>
                                    @else
                                        <td>Keine Angabe</td>
                                    @endif
                                    <td>Kilometerstand:</td>
                                    <td>{{ $werkstatt['km'] }}</td>
                                </tr>
                                <tr>
                                    <td>Baujahr:</td>
                                    @if($werkstatt['bj'])
                                        <td>{{ $werkstatt['bj'] }}</td>
                                    @else
                                        <td>Keine Angabe</td>
                                    @endif
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @endif
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;" class="border-top">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 10px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                            <table width="100%">
                                <tr>
                                    <td colspan="4" style="font-weight: bold;">
                                        Servicewünsche
                                    </td>
                                </tr>
                                <tr>
                                    @if($werkstatt['hebebuehne'] == true)
                                        <td colspan="2"><i class="fas fa-check text-success"></i> {{ $werkstatt['hebebuehne'] }}</td>
                                    @else
                                        <td colspan="2"><i class="fas fa-times text-danger"></i> Hebebuehne</td>
                                    @endif
                                    @if($werkstatt['reifenwechsel'] == true)
                                        <td colspan="2"><i class="fas fa-check text-success"></i> {{ $werkstatt['reifenwechsel'] }}</td>
                                    @else
                                        <td colspan="2"><i class="fas fa-times text-danger"></i> Reifenwechsel</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($werkstatt['huau'] == true)
                                        <td colspan="2"><i class="fas fa-check text-success"></i> {{ $werkstatt['huau'] }}</td>
                                    @else
                                        <td colspan="2"><i class="fas fa-times text-danger"></i> HU / AU</td>
                                    @endif
                                    @if($werkstatt['service'] == true)
                                        <td colspan="2"><i class="fas fa-check text-success"></i> {{ $werkstatt['service'] }}</td>
                                    @else
                                        <td colspan="2"><i class="fas fa-times text-danger"></i> Service</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($werkstatt['inspektion'] == true)
                                        <td colspan="2"><i class="fas fa-check text-success"></i> {{ $werkstatt['inspektion'] }}</td>
                                    @else
                                        <td colspan="2"><i class="fas fa-times text-danger"></i> Inspektion</td>
                                    @endif
                                    @if($werkstatt['sonstiges'] == true)
                                        <td colspan="2"><i class="fas fa-check text-success"></i> {{ $werkstatt['sonstiges'] }}</td>
                                    @else
                                        <td colspan="2"><i class="fas fa-times text-danger"></i> Sonstiges</td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @if($werkstatt['text'] == true)
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;" class="border-top">
                    <tr>
                        <td bgcolor="ffffff" align="left" style="padding: 10px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                            <p>Anfrage:</p>
                            {!! $werkstatt['text'] !!}<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @endif
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;">
                @if ($werkstatt['datenschutz'] == true)
                    <tr>
                        <td bgcolor="green" align="left" style="padding: 10px 30px; color: white; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px; text-align: center;">
                            Dem Datenschutz wurde zugestimmt.
                        </td>
                    </tr>
                @else
                    <tr>
                        <td bgcolor="red" align="left" style="padding: 10px 30px; color: white; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px; text-align: center;">
                            Datenschutz wurde nicht bestätigt.
                        </td>
                    </tr>
                @endif
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;">
                <tr>
                    <td bgcolor="#404040" align="center"
                        style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #e7e7e7; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                        <ul style="padding-left: 0; list-style: none;">
                            @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma)
                                <li>{{ $firma->firmenname }}</li>
                                <li>{{ $firma->firmenzusatz }}</li>
                                <li>{{ $firma->straße }}</li>
                                <li>{{ $firma->plz.' '.$firma->ort }}</li>
                                <br>
                                <li>{{ 'Telefon: '.$firma->telefon }}</li>
                                <li>{{ 'Telefon: '.$firma->mobil }}</li>
                                <li>{{ 'Telefax: '.$firma->fax }}</li>
                                <br>
                                <li>{{ 'E-Mail: '.$firma->email }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1024px;">
                <tr>
                    <td bgcolor="#f4f4f4" align="left"
                        style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 14px; font-weight: 400; line-height: 18px;">
                        <br>
                        <p style="margin: 0;">&nbsp;</p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>





