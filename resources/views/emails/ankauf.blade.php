<!doctype html>
<html lang="de">
<head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
<div
    style="display: none; font-size: 1px; color: #3d4852; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#343a40" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#343a40" align="center" style="padding: 0px 10px 0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top"
                        style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 48px; font-weight: 400; margin: 2px;">Fahrzeugankauf</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                        <p>Es ist eine neue Fahrzeuganfrage eingegangen:</p>
                        <table width="100%" border="0">
                            <tr>
                                <td>Marke</td>
                                <td>{{ $ankauf['marke'] }}</td>
                            </tr>
                            <tr>
                                <td>Modell</td>
                                <td>{{ $ankauf['modell'] }}</td>
                            </tr>
                            <tr>
                                <td>Erstzulassung</td>
                                <td>{{ $ankauf['zulassung'] }}</td>
                            </tr>
                            <tr>
                                <td>Kilometerstand</td>
                                <td>{{ $ankauf['km'] }}</td>
                            </tr>
                            <tr>
                                <td>TÜV</td>
                                <td>{{ $ankauf['tuev'] }}</td>
                            </tr>
                            <tr>
                                <td>Leistung</td>
                                <td>{{ $ankauf['kw'] . ' KW (' . $ankauf['PS'] . ' PS)' }}</td>
                            </tr>
                            <tr>
                                <td>Kraftstoff</td>
                                <td>{{ $ankauf['kraftstoff'] }}</td>
                            </tr>
                            <tr>
                                <td>Getriebe</td>
                                <td>{{ $ankauf['getriebe'] }}</td>
                            </tr>
                            <tr>
                                <td>Karosserieform</td>
                                <td>{{ $ankauf['karosserie'] }}</td>
                            </tr>
                            <tr>
                                <td>Türen</td>
                                <td>{{ $ankauf['tuer'] }}</td>
                            </tr>
                            <tr>
                                <td>Halter</td>
                                <td>{{ $ankauf['getriebe'] }}</td>
                            </tr>
                            <tr>
                                <td>Import/Reimport Fahrzeug?</td>
                                <td>{{ $ankauf['import'] }}</td>
                            </tr>
                            <tr>
                                <td>Unfallfrei?</td>
                                <td>{{ $ankauf['unfall'] }}</td>
                            </tr>
                            <tr>
                                <td>Getriebeschaden?</td>
                                <td>{{ $ankauf['getriebeschaden'] }}</td>
                            </tr>
                            <tr>
                                <td>Motorschaden?</td>
                                <td>{{ $ankauf['motorschaden'] }}</td>
                            </tr>
                            @if($ankauf['extras'])
                            <tr>
                                <td valign="top">Ausstattung</td>
                                <td>
                                    @if($ankauf['extras'] == null)
                                        Keine Sonderausstattungen
                                    @else
                                        @foreach($ankauf['extras'] as $extra)
                                            {{ $extra }}<br>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr class="mt-1">
                                <td colspan="2">
                                    {!! $ankauf['description'] !!}<br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                        <p>Kontaktdaten des Verkäufers:</p>
                        {{ $ankauf['vorname'] . ' ' . $ankauf['nachname']  }}<br>
                        {{ 'E-Mail: '. $ankauf['email'] }}<br>
                        {{ 'Telefon:' . $ankauf['telefonnummer']  }}<br>
                        {{ 'Standort des KFZ: '. $ankauf['kfzplz'] }}<br><br>
                        <p>Preis für das Fahrzeug:</p>
                        {{ 'Wunschpreis: '. $ankauf['wpreis'] }}<br>
                        {{ 'Mindestpreis:' . $ankauf['mpreis']  }}<br>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="left"
                        style="padding: 0px 30px 20px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                        @if($ankauf['image'] == true)
                            <p>Bilder zum Auto:</p>
                            @foreach ($ankauf['image'] as $image)
                                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('ankauf/'.$image) }}" class="p-3 img-fluid mx-auto d-block" alt="" style="width: 480px; height: 320px; object-fit: cover; object-position: center;"><br><br>
                            @endforeach
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
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
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
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


