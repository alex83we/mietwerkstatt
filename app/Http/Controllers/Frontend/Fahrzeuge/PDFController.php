<?php

namespace App\Http\Controllers\Frontend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Fahrzeuge\Verkauf;
use App\Models\Firma;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $fahrzeuge = Verkauf::find($id);
        $firma = Firma::find(1);

        $output = '<!doctype html>
                    <html lang="de">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport"
                              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Verkaufsanzeige</title>
                        <style type="text/css">
                            body {
                                color: #000000;
                                background: #FFFFFF !important;
                                font-size: 14px;
                                font-family: Helvetica, Arial, "Lucida Grande", sans-serif !important;
                            }
                            ul {
                                padding: 0;
                                margin-top: 0;
                                margin-bottom: 1rem;
                                list-style: none;
                            }
                            li {
                                padding: 0;
                                list-style: none;
                                display: list-item;
                                text-align: -webkit-match-parent;
                            }
                            h2 {
                                font-size: 20px !important;
                            }
                            .flex-container {
                                display: flex; flex-wrap: wrap;
                            }
                        </style>
                    </head>
                    <body>
                    <table>';
        foreach ($fahrzeuge->fahrzeuges_ausstattung as $key => $ausstattung) {
            $output .= '<tr>
                            <td style="width: 50%; text-align: left"><img src="images/logoWerkstatt.png" style="height: 100px; vertical-align: middle;"></td>
                            <td style="width: 50%; text-align: right">
                                <div id="firma">
                                    <h2 style="margin: 0;">' . $firma->firmenname . '</h2>
                                    <h4 style="margin: 0;">' . $firma->firmenzusatz . '</h4>
                                    <div>' . $firma->straße . ' ' . $firma->plz . ' ' . $firma->ort . '</div>
                                    <div>Tel.: ' . str_replace(' ', '', $firma->telefon) . ' / Fax: ' . str_replace(' ', '', $firma->fax) . '</div>
                                    <div>E-Mail.: ' . $firma->email . '</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><div style="border-top: 3px solid #ff4600; margin-top: 10px; margin-bottom: 10px;"></div></td>
                        </tr>
                        <tr>
                            <td colspan="2"><div style="font-weight: bold; color: #ff4600; font-size: 20px; margin-top: 20px; margin-bottom: 15px">';
                                if ($fahrzeuge->anzeigetext == false) {
                        $output .= $fahrzeuge->marke . ' ' . $fahrzeuge->modell;
                                } else {
                        $output .= $fahrzeuge->anzeigetext;
                                }
            $output .= '</div></td>
                        </tr>';
            $output .= '<tr>
                        <td style="width: 49%;">
                            <div style="padding-right: 10px">';
                                if ($fahrzeuge->images == false) {
                        $output .= '<img src="images/default.png" style="height: 275px; width: 350px;">';
                                } else {
                        $output .= '<img src="storage/fahrzeuge/' . $fahrzeuge->images . '" style="height: 275px; width: 350px;">';
                                }
                $output .= '</div>
                        </td>
                        <td style="width: 49%; vertical-align: top;">
                            <div style="padding-left: 10px">
                                <p style="font-size: 30px; font-weight: bolder; margin-top: 0; text-align: right;">'. number_format($fahrzeuge->preis, 2, ',', '.') .' €';
            if ($fahrzeuge->preisx == 'Verhandlungsbasis') {
                $output .= " VB";
            }
            $output .= '</p>
                            </div>
                            <table style="padding-top: 50px; width: 100%;">
                                <tr>
                                    <td colspan="2"><h2 style="margin: 0; font-size: 21px; color: #ff4600;">Technische Daten</h2></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">Fahrzeugart:</td>
                                    <td style="width: 50%;">'. $fahrzeuge->fahrzeugart .'</td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">Kategorie:</td>
                                    <td style="width: 50%;">'. $fahrzeuge->kategorie .'</td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">Erstzulassung:</td>
                                    <td style="width: 50%;">'. $fahrzeuge->ez .'</td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">Kilometerstand:</td>
                                    <td style="width: 50%;">'. number_format($fahrzeuge->km, 3, '.', ',').' km' .'</td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">Kraftstoff:</td>
                                    <td style="width: 50%;">'. $fahrzeuge->kraftstoff .'</td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">Leistung:</td>
                                    <td style="width: 50%;">'. $fahrzeuge->kw.' kW ('.$fahrzeuge->ps.' PS)' .'</td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">Auftragsnummer:</td>
                                    <td style="width: 50%;">'. $fahrzeuge->id.'-'.date('m.Y') .'</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table style="width: 100%;">
                                <tr>
                                    <td colspan="3"><h2 style="margin-top: 10px; font-size: 21px; color: #ff4600">Technische Daten</h2></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <ul>';
            if ($ausstattung->aussenfarbe == true) {
                $output .= '<li><b>Lackierung:</b>
                                                    '. $ausstattung->aussenfarbe .'
                                                </li>';
            }
            if($ausstattung->innenfarbe == true) {
                $output .= '<li><b>Innenausstattung:</b>
                                                    '. $ausstattung->innenfarbe .'
                                                </li>';
            }
            if($ausstattung->innenmaterial == true) {
                $output .= '<li><b>Polsterung:</b>
                                                    '. $ausstattung->innenmaterial .'
                                                </li>';
            }
            if($fahrzeuge->besfahrzeug == true) {
                $output .= '<li><b>Beschädigtes Fahrzeug:</b> '. $fahrzeuge->besfahrzeug .'</li>';
            }
            if($fahrzeuge->unfallfahrzeug == true) {
                $output .= '<li><b>Unfallfahrzeug:</b> '. $fahrzeuge->unfallfahrzeug .'</li>';
            }
            if($fahrzeuge->fahrtauglich == true) {
                $output .= '<li><b>Fahrtauglich:</b> '. $fahrzeuge->fahrtauglich .'</li>';
            }
            if($fahrzeuge->nichtraucher == true) {
                $output .= '<li><b>Nichtraucherfahrzeug</b></li>';
            }
            $output .= '</ul>
                                        </div>
                                    </td>
                                    <td style="vertical-align: top;">
                                        <ul>';
            if($fahrzeuge->kw == true and $fahrzeuge->ps == true) {
                $output .= '<li><b>Leistung:</b> '. $fahrzeuge->kw .' kW ('. $fahrzeuge->ps .' PS)</li>';
            }
            if($fahrzeuge->ccm == true) {
                $output .= '<li><b>Hubraum:</b> '. number_format($fahrzeuge->ccm, 0, ',', '.') .' cm³</li>';
            }
            if($fahrzeuge->getriebe == true) {
                $output .= '<li><b>Getriebe:</b> '. $fahrzeuge->getriebe .'</li>';
            }
            if($fahrzeuge->allrad == true) {
                $output .= '<li><b>Allradantrieb</b></li>';
            }
            if($fahrzeuge->schaltwippen == true) {
                $output .= '<li><b>Schaltwippen</b></li>';
            }
            if($fahrzeuge->halter == true) {
                $output .= '<li><b>Vorbesitzer:</b> '. $fahrzeuge->halter .'</li>';
            }
            $output .= '</ul>
                                        </div>
                                    </td>
                                    <td style="vertical-align: top;">
                                        <ul>';
            if($fahrzeuge->tueren == true) {
                $output .= '<li><b>Anzahl Türen:</b>'. $fahrzeuge->tueren .'</li>';
            }
            if($fahrzeuge->scheibetueren == true) {
                $output .= '<li><b>Schiebetüren:</b>'. $fahrzeuge->scheibetueren .'</li>';
            }
            if($fahrzeuge->sitzplaetze == true) {
                $output .= '<li><b>Anzahl Sitzplätze:</b> '. $fahrzeuge->sitzplaetze .'</li>';
            }
            if($fahrzeuge->scheckheft == true) {
                $output .= '<li><b>Scheckheftgepflegt</b></li>';
            }
            if($fahrzeuge->garantie == true) {
                $output .= '<li><b>Garantie/Werksgarantie</b></li>';
            }
            if($fahrzeuge->hu == true) {
                $output .= '<li><b>HU / AU:</b><span> '. $fahrzeuge->hu .' </span></li>';
            }
            $output .='</ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>';
            if($fahrzeuge->schadstoffklasse == true or $fahrzeuge->partikelfilter == true or $fahrzeuge->umweltplakette == true or $fahrzeuge->ssa == true or $fahrzeuge->kraftstoff_komb == true
                or $fahrzeuge->kraftstoff_innerorts == true or $fahrzeuge->kraftstoff_ausserorts == true or $fahrzeuge->co2 == true) {
                $output .= '<tr>
                            <td colspan="2">
                                <table style="width: 100%;">
                                    <tr>
                                        <td colspan="2">
                                                <h2 style="margin: 0 0 5px; font-size: 21px; color: #ff4600">Kraftstoffverbrauch &amp; CO2-Emission*</h2>
                                        </td>
                                    </tr>';
                if($fahrzeuge->schadstoffklasse == true) {
                    $output .= '<tr>
                                        <td style="width: 50%;"><div style="font-weight: bold;">Schadstoffklase:</div></td>
                                        <td style="width: 50%;">'. $fahrzeuge->schadstoffklasse .'</td>
                                    </tr>';
                }
                if($fahrzeuge->partikelfilter == true) {
                    $output .='<tr>
                                        <td style="width: 50%;"><div style="font-weight: bold;">Partikelfilter:</div></td>
                                        <td style="width: 50%;">Ja</td>
                                    </tr>';
                }
                if($fahrzeuge->umweltplakette == true) {
                    $output .= '<tr>
                                        <td style = "width: 50%;" ><div style = "font-weight: bold;" > Umweltplakette:</div ></td >';
                    if($fahrzeuge->umweltplakette == '4 (Grün)') {
                        $output .= '<td style="width: 50%;"><img src="images/Gruene_Plakette.png" width="50px"></td>';
                    } else if ($fahrzeuge->umweltplakette == '3 (Gelb)') {
                        $output .= '<td style="width: 50%;"><img src="images/Gelbe_Plakette.png" width="50px"></td>';
                    } else if ($fahrzeuge->umweltplakette == '2 (Rot)') {
                        $output .= '<td style="width: 50%;"><img src="images/Rote_Plakette.png" width="50px"></td>';
                    } else if ($fahrzeuge->umweltplakette == '1 (Keine)') {
                        $output .= '<td style="width: 50%;">1 (Keine)</td>';
                    }
                    $output .= '</tr>';
                }
                if($fahrzeuge->ssa == true) {
                    $output .= '<tr>
                                                <td style="width: 50%;"><div style="font-weight: bold;">Start / Stopp-Automatik</div></td>
                                                <td style="width: 50%;">Ja</td>
                                            </tr>';
                }
                if($fahrzeuge->kraftstoff_komb == true) {
                    $output .= '<tr>
                                                <td style="width: 50%;"><div style="font-weight: bold;">Kraftstoffverbrauch (komb.)</div></td>
                                                <td style="width: 50%;">'. $fahrzeuge->kraftstoff_komb .' l/100km</td>
                                            </tr>';
                }
                if($fahrzeuge->kraftstoff_innerorts == true) {
                    $output .= '<tr>
                                                <td style="width: 50%;"><div style="font-weight: bold;">Kraftstoffverbrauch (innerorts)</div></td>
                                                <td style="width: 50%;">'. $fahrzeuge->kraftstoff_innerorts .' l/100km</td>
                                            </tr>';
                }
                if($fahrzeuge->kraftstoff_ausserorts == true) {
                    $output .= '<tr>
                                                <td style="width: 50%;"><div style="font-weight: bold;">Kraftstoffverbrauch (außerorts)</div></td>
                                                <td style="width: 50%;">'. $fahrzeuge->kraftstoff_ausserorts .' l/100km</td>
                                            </tr>';
                }
                if($fahrzeuge->co2 == true) {
                    $output .= '<tr>
                                                <td style="width: 50%;"><div style="font-weight: bold;">CO&sup2;-Emissionen (komb.)</div></td>
                                                <td style="width: 50%;">'. $fahrzeuge->co2 .' g/km</td>
                                            </tr>';
                }
                $output .='<tr>
                                        <td colspan="2">
                                            <div style="padding-top: 20px; clear: both;">
                                                <p style="font-size: 12px; line-height: 15px; margin: 0">* Weitere Informationen zum offiziellen Kraftstoffverbrauch und zu den
                                                    offiziellen spezifischen CO2-Emissionen und ggf. zum Stromverbrauch neuer Pkw können dem
                                                    Leitfaden über den offiziellen Kraftstoffverbrauch, die offiziellen spezifischen
                                                    CO2-Emissionen und den offiziellen Stromverbrauch neuer Pkw entnommen werden. Dieser ist an
                                                    allen Verkaufsstellen und bei der Deutschen Automobil Treuhand GmbH unentgeltlich
                                                    erhältlich, sowie unter <a href="https://www.dat.de" target="_blank">www.dat.de</a>.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    </table>
                            </td>
                        </tr>';
            }
            if($ausstattung->antiblockiersystem == true or $ausstattung->esp == true or $ausstattung->asr == true or $ausstattung->berganfahrassistent == true or $ausstattung->muedigkeitswarner == true
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
                or $ausstattung->skisack == true or $ausstattung->schiebedach == true or $ausstattung->panoramadach == true or $ausstattung->dachreling == true or $ausstattung->behindertengerecht == true or $ausstattung->taxi == true) {
                $output .= '<tr>
                        <td colspan="2">
                        <div style="page-break-before: auto;"></div>
                            <table style="width: 100%;">
                                <tr>
                                    <td colspan="2"><h2 style="margin-bottom: 5px; font-size: 21px; color: #ff4600">Ausstattung</h2></td>
                                </tr>
                                <tr>
                                    <td  style="width: 50%; vertical-align: top;">';
                if($ausstattung->antiblockiersystem == true or $ausstattung->esp == true or $ausstattung->asr == true or $ausstattung->berganfahrassistent == true or $ausstattung->muedigkeitswarner == true
                    or $ausstattung->spurhalteassistent == true or $ausstattung->totwinkelassistent == true or $ausstattung->innenspiegel == true or $ausstattung->nachtsicht == true
                    or $ausstattung->notbremsassistent == true or $ausstattung->verkehrszeichenerkennung == true or $ausstattung->tempomat == true or $ausstattung->geschwindigkeitsbegrenzer == true or $ausstattung->abstandswarner == true
                    or $ausstattung->airbag == true or $ausstattung->isofix == true or $ausstattung->isofixbeifahrer == true or $ausstattung->scheinwerfer == true or $ausstattung->Scheinwerferreinigung == true or $ausstattung->fernlicht == true
                    or $ausstattung->fernlichtassistent == true or $ausstattung->tagfahrlicht == true or $ausstattung->kurvenlicht == true or $ausstattung->nebelscheinwerfer == true or $ausstattung->alarmanlage == true or $ausstattung->wegfahrsperre == true
                    or $ausstattung->klimatisierung == true or $ausstattung->standheizung == true or $ausstattung->beheizbarefrontscheibe == true or $ausstattung->beheizbareslenkrad == true or $ausstattung->selbstlenkend == true or $ausstattung->vorneep == true or $ausstattung->hintenep == true or $ausstattung->kamera == true or $ausstattung->kamera_360 == true
                    or $ausstattung->vornesv == true or $ausstattung->hintensh == true or $ausstattung->vorneesv == true or $ausstattung->hintenesh == true or $ausstattung->sportsitze == true or $ausstattung->armlehne == true or $ausstattung->lordosenstuetze == true or $ausstattung->massagesitze == true or $ausstattung->sitzbelueftung == true
                    or $ausstattung->umklappbarerbeifahrersitz == true or $ausstattung->efensterheber == true or $ausstattung->eheckklappe == true or $ausstattung->eseitenspiegel == true or $ausstattung->zv == true or $ausstattung->szv == true or $ausstattung->lichtsensor == true or $ausstattung->regensensor == true or $ausstattung->servo == true
                    or $ausstattung->ambilight == true or $ausstattung->lederlenkrad == true) {
                    $output .= '<ul style="margin-right: 20px;">';
                    if($ausstattung->antiblockiersystem == true or $ausstattung->esp == true or $ausstattung->asr == true or $ausstattung->berganfahrassistent == true or $ausstattung->muedigkeitswarner == true
                        or $ausstattung->spurhalteassistent == true or $ausstattung->totwinkelassistent == true or $ausstattung->innenspiegel == true or $ausstattung->nachtsicht == true
                        or $ausstattung->notbremsassistent == true or $ausstattung->verkehrszeichenerkennung == true or $ausstattung->tempomat == true or $ausstattung->geschwindigkeitsbegrenzer == true or $ausstattung->abstandswarner == true) {
                        $output .= '<li>
                                                        <span style="font-weight: bold;">Assistenzsysteme:</span>
                                                    </li>
                                                    <li>';
                        if($ausstattung->antiblockiersystem == true) {
                            $output .= '<span>Antiblockiersystem</span><br>';
                        }
                        if($ausstattung->esp == true) {
                            $output .= '<span>Elektronisches Stabilitätsprogramm (ESP)</span><br>';
                        }
                        if($ausstattung->asr == true) {
                            $output .= '<span>Traktionskontrolle (ASR)</span><br>';
                        }
                        if($ausstattung->berganfahrassistent == true) {
                            $output .= '<span>Berganfahrassistent</span><br>';
                        }
                        if($ausstattung->muedigkeitswarner == true) {
                            $output .= '<span>Muedigkeitswarner</span><br>';
                        }
                        if($ausstattung->spurhalteassistent == true) {
                            $output .= '<span>Spurhalteassistent</span><br>';
                        }
                        if($ausstattung->totwinkelassistent == true) {
                            $output .= '<span>Totwinkelassistent</span><br>';
                        }
                        if($ausstattung->innenspiegel == true) {
                            $output .= '<span>Innenspiegel autom. abblendend</span><br>';
                        }
                        if($ausstattung->nachtsicht == true) {
                            $output .= '<span>Nachtsicht-Assistent</span><br>';
                        }
                        if($ausstattung->notbremsassistent == true) {
                            $output .= '<span>Notbremsassistent</span><br>';
                        }
                        if($ausstattung->notrufsystem == true) {
                            $output .= '<span>Notrufsystem</span><br>';
                        }
                        if($ausstattung->verkehrszeichenerkennung == true) {
                            $output .= '<span>Verkehrszeichenerkennung</span><br>';
                        }
                        if($ausstattung->tempomat == true) {
                            $output .= '<span>'. $ausstattung->tempomat .'</span><br>';
                        }
                        if($ausstattung->geschwindigkeitsbegrenzer == true) {
                            $output .= '<span>Geschwindigkeitsbegrenzer</span><br>';
                        }
                        if($ausstattung->abstandswarner == true) {
                            $output .= '<span>Abstandswarner</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->airbag == true or $ausstattung->isofix == true or $ausstattung->isofixbeifahrer == true) {
                        $output .= '<li><span style="font-weight: bold;">Insassenschutz:</span></li>
                                                <li>';
                        if($ausstattung->airbag == true) {
                            $output .= '<span>'. $ausstattung->airbag .'</span><br>';
                        }
                        if($ausstattung->isofix == true) {
                            $output .= '<span>Isofix (Kindersitzbefestigung)</span><br>';
                        }
                        if($ausstattung->isofixbeifahrer == true) {
                            $output .= '<span>Isofix Beifahrersitz</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->scheinwerfer == true or $ausstattung->Scheinwerferreinigung == true or $ausstattung->fernlicht == true or $ausstattung->fernlichtassistent == true
                        or $ausstattung->tagfahrlicht == true or $ausstattung->kurvenlicht == true or $ausstattung->nebelscheinwerfer == true) {
                        $output .= '<li><span style="font-weight: bold;">Licht und Sicht:</span></li>
                                                <li>';
                        if ($ausstattung->scheinwerfer == true) {
                            $output .= '<span>'. $ausstattung->scheinwerfer .'</span><br>';
                        }
                        if ($ausstattung->Scheinwerferreinigung == true) {
                            $output .= '<span>Scheinwerferreinigung</span><br>';
                        }
                        if ($ausstattung->fernlicht == true) {
                            $output .= '<span>Blendfreies Fernlicht</span><br>';
                        }
                        if ($ausstattung->fernlichtassistent == true) {
                            $output .= '<span>Fernlichtassistent</span><br>';
                        }
                        if ($ausstattung->tagfahrlicht == true) {
                            $output .= '<span>'. $ausstattung->tagfahrlicht .'</span><br>';
                        }
                        if ($ausstattung->kurvenlicht == true) {
                            $output .= '<span>'. $ausstattung->kurvenlicht .'</span><br>';
                        }
                        if ($ausstattung->nebelscheinwerfer == true) {
                            $output .= '<span>Nebelscheinwerfer</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->alarmanlage == true or $ausstattung->wegfahrsperre == true) {
                        $output .= '<li><span style = "font-weight: bold;" > Diebstahlschutz:</span></li>
                                                <li>';
                        if ($ausstattung->alarmanlage == true) {
                            $output .= '<span> Alarmanlage</span><br>';
                        }
                        if ($ausstattung->wegfahrsperre == true) {
                            $output .= '<span > Elektrische Wegfahrsperre </span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                    </li>';
                    }
                    if($ausstattung->klimatisierung == true or $ausstattung->standheizung == true or $ausstattung->beheizbarefrontscheibe == true or $ausstattung->beheizbareslenkrad == true) {
                        $output .= '<li><span style="font-weight: bold;">Klimatisierung:</span></li>
                                                <li>';
                        if ($ausstattung->klimatisierung == true) {
                            $output .= '<span>'. $ausstattung->klimatisierung .'</span><br>';
                        }
                        if ($ausstattung->standheizung == true) {
                            $output .= '<span>Standheizung</span><br>';
                        }
                        if ($ausstattung->beheizbarefrontscheibe == true) {
                            $output .= '<span>Beheizbare Frontscheibe</span><br>';
                        }
                        if ($ausstattung->beheizbareslenkrad == true) {
                            $output .= '<span>Beheizbares Lenkrad</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->selbstlenkend == true or $ausstattung->vorneep == true or $ausstattung->hintenep == true or $ausstattung->kamera == true or $ausstattung->kamera_360 == true) {
                        $output .= '<li><span style="font-weight: bold;">Einparkhilfe:</span></li>
                                                <li>';
                        if ($ausstattung->selbstlenkend == true) {
                            $output .= '<span>Selbstlenkende Systeme</span><br>';
                        }
                        if ($ausstattung->vorneep == true and $ausstattung->hintenep == true) {
                            $output .= '<span>Akkustische Einparkhilfe: Vorne & Hinten</span><br>';
                        } else if($ausstattung->hintenep == true) {
                            $output .= '<span>Akkustische Einparkhilfe: Hinten</span><br>';
                        } else if($ausstattung->vorneep == true) {
                            $output .= '<span>Akkustische Einparkhilfe: Vorne</span><br>';
                        }
                        if ($ausstattung->kamera == true and $ausstattung->kamera_360 == true) {
                            $output .= '<span>Visuelle Einparkhilfe: Kamera & 360°-Kamera</span><br>';
                        } else if($ausstattung->kamera == true) {
                            $output .= '<span>Visuelle Einparkhilfe: Kamera</span><br>';
                        } else if($ausstattung->kamera_360 == true) {
                            $output .= '<span>Visuelle Einparkhilfe: 360°-Kamera</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->vornesv == true or $ausstattung->hintensh == true or $ausstattung->vorneesv == true or $ausstattung->hintenesh == true or $ausstattung->sportsitze == true
                        or $ausstattung->armlehne == true or $ausstattung->lordosenstuetze == true or $ausstattung->massagesitze == true or $ausstattung->sitzbelueftung == true or $ausstattung->umklappbarerbeifahrersitz == true) {
                        $output .= '<li><span style="font-weight: bold;">Sitze:</span></li>
                                                <li>';
                        if ($ausstattung->vornesv == true and $ausstattung->hintensh == true) {
                            $output .= '<span> Sitzheizung: Vorne & Hinten </span><br>';
                        } else if ($ausstattung->vornesv == true) {
                            $output .= '<span>Sitzheizung: Vorne</span><br>';
                        }else if ($ausstattung->hintensh == true) {
                            $output .= '<span>Sitzheizung: Hinten</span><br>';
                        }
                        if ($ausstattung->vorneesv == true and $ausstattung->hintenesh == true) {
                            $output .= '<span>Elektrische Sitzeinstellung: Vorne & Hinten</span><br>';
                        } else if ($ausstattung->vorneesv == true) {
                            $output .= '<span>Elektrische Sitzeinstellung: Vorne</span><br>';
                        } else if ($ausstattung->hintenesh == true) {
                            $output .= '<span>Elektrische Sitzeinstellung: Hinten</span><br>';
                        }
                        if ($ausstattung->sportsitze == true) {
                            $output .= '<span>Sportsitze</span><br>';
                        }
                        if ($ausstattung->armlehne == true) {
                            $output .= '<span>Armlehne</span><br>';
                        }
                        if ($ausstattung->lordosenstuetze == true) {
                            $output .= '<span>Lordosenstütze</span><br>';
                        }
                        if ($ausstattung->massagesitze == true) {
                            $output .= '<span>Massagesitze</span><br>';
                        }
                        if ($ausstattung->sitzbelueftung == true) {
                            $output .= '<span>Sitzbelüftung</span><br>';
                        }
                        if ($ausstattung->umklappbarerbeifahrersitz == true) {
                            $output .= '<span>Umklappbarer Beifahrersitz</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->efensterheber == true or $ausstattung->eheckklappe == true or $ausstattung->eseitenspiegel == true or $ausstattung->zv == true) {
                        $output .= '<li><span style="font-weight: bold;">Weitere Komfortausstattungen:</span></li>
                                                <li>';
                        if ($ausstattung->efensterheber == true) {
                            $output .= '<span>Elektrische Fensterheber</span><br>';
                        }
                        if ($ausstattung->eheckklappe == true) {
                            $output .= '<span>Elektrische Heckklappe</span><br>';
                        }
                        if ($ausstattung->eseitenspiegel == true) {
                            $output .= '<span>Elektrische Seitenspiegel</span><br>';
                        }
                        if ($ausstattung->zv == true) {
                            $output .= '<span>Zentralverriegelung</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    $output .= '</ul></div>';
                }
                $output .= '</td>
                                    <td style="width: 50%; vertical-align: top;">';
                if($ausstattung->tunerradio == true or $ausstattung->dab == true or $ausstattung->cd == true or $ausstattung->tv == true or $ausstattung->navigationssystem == true or $ausstattung->soundsystem == true
                    or $ausstattung->touchscreen == true or $ausstattung->sprachsteuerung == true or $ausstattung->multifunktionslenkrad == true or $ausstattung->freisprecheinrichtung == true or $ausstattung->usb == true
                    or $ausstattung->bluetooth == true or $ausstattung->androidauto == true or $ausstattung->carplay == true or $ausstattung->wlanwifi == true or $ausstattung->streaming == true or $ausstattung->induktionsladen == true
                    or $ausstattung->bordcomputer == true or $ausstattung->headup == true or $ausstattung->kombiinstrument == true or $ausstattung->leichtmetallfelgen == true or $ausstattung->sommerreifen == true or $ausstattung->winterreifen == true
                    or $ausstattung->allwetterreifen == true or $ausstattung->pannenhilfe == true or $ausstattung->reifendruckkontrolle == true or $ausstattung->winterpaket == true or $ausstattung->raucherpaket == true or $ausstattung->sportpaket == true
                    or $ausstattung->sportfahrwerk == true or $ausstattung->luftfederung == true or $ausstattung->anhaengerkupplung == true or $ausstattung->gepaeckraumabtrennung == true or $ausstattung->skisack == true or $ausstattung->schiebedach == true
                    or $ausstattung->panoramadach == true or $ausstattung->dachreling == true or $ausstattung->behindertengerecht == true or $ausstattung->taxi == true) {
                    $output .= '<ul style="margin-right: 20px;">';
                    if($ausstattung->szv == true or $ausstattung->lichtsensor == true or $ausstattung->regensensor == true or $ausstattung->servo == true  or $ausstattung->ambilight == true or $ausstattung->lederlenkrad == true) {
                        $output .= '<li>';
                        if ($ausstattung->szv == true) {
                            $output .= '<span>Schlüssellose Zentralverriegelung</span><br>';
                        }
                        if ($ausstattung->lichtsensor == true) {
                            $output .= '<span>Lichtsensor</span><br>';
                        }
                        if ($ausstattung->regensensor == true) {
                            $output .= '<span>Regensensor</span><br>';
                        }
                        if ($ausstattung->servo == true) {
                            $output .= '<span>Servolenkung</span><br>';
                        }
                        if ($ausstattung->ambilight == true) {
                            $output .= '<span>Ambiente-Beleuchtung</span><br>';
                        }
                        if ($ausstattung->lederlenkrad == true) {
                            $output .= '<span>Lederlenkrad</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->tunerradio == true or $ausstattung->dab == true or $ausstattung->cd == true or $ausstattung->tv == true or $ausstattung->navigationssystem == true or $ausstattung->soundsystem == true
                        or $ausstattung->touchscreen == true or $ausstattung->sprachsteuerung == true or $ausstattung->multifunktionslenkrad == true or $ausstattung->freisprecheinrichtung == true) {
                        $output .= '<li>
                                                    <span style="font-weight: bold;">Multimedia, Bedienung und Steuerung:</span>
                                                </li>
                                                <li>';
                        if ($ausstattung->tunerradio == true) {
                            $output .= '<span>Tuner/Radio</span><br>';
                        }
                        if ($ausstattung->dab == true) {
                            $output .= '<span>Radio DAB</span><br>';
                        }
                        if ($ausstattung->cd == true) {
                            $output .= '<span>CD-Spieler</span><br>';
                        }
                        if ($ausstattung->tv == true) {
                            $output .= '<span>TV</span><br>';
                        }
                        if ($ausstattung->navigationssystem == true) {
                            $output .= '<span>Navigationssystem</span><br>';
                        }
                        if ($ausstattung->soundsystem == true) {
                            $output .= '<span>Soundsystem</span><br>';
                        }
                        if ($ausstattung->touchscreen == true) {
                            $output .= '<span>Touchscreen</span><br>';
                        }
                        if ($ausstattung->sprachsteuerung == true) {
                            $output .= '<span>Sprachsteuerung</span><br>';
                        }
                        if ($ausstattung->multifunktionslenkrad == true) {
                            $output .= '<span>Multifunktionslenkrad</span><br>';
                        }
                        if ($ausstattung->freisprecheinrichtung == true) {
                            $output .= '<span>Freisprecheinrichtung</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->usb == true or $ausstattung->bluetooth == true or $ausstattung->androidauto == true or $ausstattung->carplay == true or $ausstattung->wlanwifi == true or $ausstattung->streaming == true or $ausstattung->induktionsladen == true) {
                        $output .= '<li>
                                                    <span style="font-weight: bold;">Konnektivität und Schnittstellen:</span>
                                                </li>
                                                <li>';
                        if ($ausstattung->usb == true) {
                            $output .= '<span>USB</span><br>';
                        }
                        if ($ausstattung->bluetooth == true) {
                            $output .= '<span>Bluetooth</span><br>';
                        }
                        if ($ausstattung->androidauto == true) {
                            $output .= '<span>Android Auto</span><br>';
                        }
                        if ($ausstattung->carplay == true) {
                            $output .= '<span>Apple CarPlay</span><br>';
                        }
                        if ($ausstattung->wlanwifi == true) {
                            $output .= '<span>WLAN / Wifi Hotspot</span><br>';
                        }
                        if ($ausstattung->streaming == true) {
                            $output .= '<span>Musikstreaming integriert</span><br>';
                        }
                        if ($ausstattung->induktionsladen == true) {
                            $output .= '<span>Induktionsladen für Smartphones</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->bordcomputer == true or $ausstattung->headup == true or $ausstattung->kombiinstrument == true) {
                        $output .= '<li>
                                                    <span style="font-weight: bold;">Instrumentenanzeige:</span>
                                                </li>
                                                <li>';
                        if ($ausstattung->bordcomputer == true) {
                            $output .= '<span>Boardcomputer</span><br>';
                        }
                        if ($ausstattung->headup == true) {
                            $output .= '<span>Head-Up Display</span><br>';
                        }
                        if ($ausstattung->kombiinstrument == true) {
                            $output .= '<span>Volldigitales Kombiinstrument</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->leichtmetallfelgen == true or $ausstattung->sommerreifen == true or $ausstattung->winterreifen == true or $ausstattung->allwetterreifen == true or $ausstattung->pannenhilfe == true or $ausstattung->reifendruckkontrolle == true) {
                        $output .= '<li>
                                                    <span style="font-weight: bold;">Reifen und Felgen:</span>
                                                </li>
                                                <li>';
                        if($ausstattung->leichtmetallfelgen == true) {
                            $output .= '<span>Leichtmetallfelgen</span><br>';
                        }
                        if($ausstattung->sommerreifen == true) {
                            $output .= '<span>Sommerreifen</span><br>';
                        }
                        if($ausstattung->winterreifen == true) {
                            $output .= '<span>Winterreifen</span><br>';
                        }
                        if($ausstattung->allwetterreifen == true) {
                            $output .= '<span>Allwetterreifen</span><br>';
                        }
                        if($ausstattung->pannenhilfe == true) {
                            $output .= '<span>Pannenhilfe</span><br>';
                        }
                        if($ausstattung->reifendruckkontrolle == true) {
                            $output .= '<span>Reifendruckkontrolle</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    if($ausstattung->winterpaket == true or $ausstattung->raucherpaket == true or $ausstattung->sportpaket == true or $ausstattung->sportfahrwerk == true or $ausstattung->luftfederung == true
                        or $ausstattung->anhaengerkupplung == true or $ausstattung->gepaeckraumabtrennung == true or $ausstattung->skisack == true or $ausstattung->schiebedach == true or $ausstattung->panoramadach == true
                        or $ausstattung->dachreling == true or $ausstattung->behindertengerecht == true or $ausstattung->taxi == true) {
                        $output .= '<li>
                                                    <span style="font-weight: bold;">Sonderausstattung:</span>
                                                </li>
                                                <li>';
                        if($ausstattung->winterpaket == true) {
                            $output .= '<span>Winterpaket</span><br>';
                        }
                        if($ausstattung->raucherpaket == true) {
                            $output .= '<span>Raucherpaket</span><br>';
                        }
                        if($ausstattung->sportpaket == true) {
                            $output .= '<span>Sportpaket</span><br>';
                        }
                        if($ausstattung->sportfahrwerk == true) {
                            $output .= '<span>Sportfahrwerk </span><br>';
                        }
                        if($ausstattung->luftfederung == true) {
                            $output .= '<span>Luftfederung</span><br>';
                        }
                        if($ausstattung->anhaengerkupplung == true) {
                            $output .= '<span>'. $ausstattung->anhaengerkupplung .'</span><br>';
                        }
                        if($ausstattung->gepaeckraumabtrennung == true) {
                            $output .= '<span>Gepäckraumabtrennung</span><br>';
                        }
                        if($ausstattung->skisack == true) {
                            $output .= '<span>Skisack</span><br>';
                        }
                        if($ausstattung->schiebedach == true) {
                            $output .= '<span>Schiebedach</span><br>';
                        }
                        if($ausstattung->panoramadach == true) {
                            $output .= '<span>Panorama-Dach</span><br>';
                        }
                        if($ausstattung->dachreling == true) {
                            $output .= '<span>Dachreling</span><br>';
                        }
                        if($ausstattung->behindertengerecht == true) {
                            $output .= '<span>Behindertengerecht</span><br>';
                        }
                        if($ausstattung->taxi == true) {
                            $output .= '<span>Taxi</span><br>';
                        }
                        $output .= '<div style="margin-bottom: 10px;"></div>
                                                </li>';
                    }
                    $output .= '</ul>';
                }
                $output .= '</td>
                                </tr>
                            </table>
                        </td>
                        </tr>';
            }
            $output .= '<div style="page-break-before: auto;"></div>';
            if ($fahrzeuge->beschreibung == true) {
                $output .= '<tr>
                            <td colspan="2"><h2 style="margin: 0 0 5px; font-size: 21px; color: #ff4600">Beschreibung</h2></td>
                        </tr>
                        <tr>
                            <td colspan="2">' . $fahrzeuge->beschreibung . '
                                <div style="margin-bottom: 10px;"></div>
                            </td>
                        </tr>';
            }
            foreach($fahrzeuge->fahrzeuges_kontakt as $key=>$kontakt) {
                $output .= '<tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    <tr>
                        <td colspan="2">
                            <h2 style="margin: 0 0 5px; font-size: 21px; color: #ff4600">Kontakt / Fahrzeugstandort</h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">';
                if($kontakt->kontakt == '0') {
                    $output .= '<span class="font-weight-bold">Private Anzeige</span>
                                    <br><br>
                                    <span>'. $kontakt->anrede .' '. $kontakt->vorname .' '. $kontakt->nachname .'</span>
                                    <br>
                                    <span>'. $kontakt->strasse .'</span>
                                    <br>
                                    <span>'. $kontakt->plz .' '. $kontakt->ort .'</span>
                                    <br><br>
                                    <span>Tel: <a style="color: inherit; text-decoration: none;"
                                            href="tel:'. $kontakt->telefon .'">'. $kontakt->telefon .'</a></span>
                                    <br><br>
                                    <span>Mail: <a style="color: inherit; text-decoration: none;" href="'. $kontakt->email .'">'. $kontakt->email .'</a></span>
                                    <br><br>';
                } else if ($kontakt->kontakt == '1') {
                    $output .= '<span style="font-weight: bold;">Gewerbliche Anzeige</span>
                                    <br><br>';
                    if($kontakt->firma == true) {
                        $output .= '<span>'. $kontakt->firma .'</span><br>';
                    }
                    $output .= '<span>'. $kontakt->anrede .' '. $kontakt->vorname .' '. $kontakt->nachname .'</span>
                                    <br>
                                    <span>'. $kontakt->strasse .'</span>
                                    <br>
                                    <span>'. $kontakt->plz .' '. $kontakt->ort .'</span>
                                    <br><br>
                                    <span>Tel: <a style="color: inherit; text-decoration: none;"
                                            href="tel:'. $kontakt->telefon .'">'. $kontakt->telefon .'</a></span>
                                    <br><br>
                                    <span>Mail: <a style="color: inherit; text-decoration: none;" href="'. $kontakt->email .'">'. $kontakt->email .'</a></span>
                                    <br><br>';
                } else if ($kontakt->kontakt == '2') {
                    $output .= '<span>Thüringer Tuning Freunde</span>
                                    <br>
                                    <span>Rosenstraße 2a</span>
                                    <br>
                                    <span>06571 Roßleben</span>
                                    <br><br>
                                    <span>Tel: <a href="tel:034672 / 1798-61">034672 / 1798-61</a></span>
                                    <br>
                                    <span>Fax: <a href="fax:034672 / 1798-61">034672 / 1798-63</a></span>
                                    <br><br>
                                    <span>Mail: <a href="verkauf@thueringer-tuning-freunde.de">Verkauf</a></span>
                                    <br><br>';
                }
            }
            $output .= '<tr><td colspan="2">&nbsp;</td></tr></table>';
            foreach($fahrzeuge->fahrzeuges_image as $key=>$item) {
                if ($item->images == false) {
                    $output .= '<img src="images/default.png" style="width: 335px; height: 235px; margin: 10px 5px; object-fit: cover; object-position: center;>';
                } else {
                    $output .= '<img src="storage/fahrzeuge/' . $item->images . '" style="width: 335px; height: 235px; margin: 10px 5px; object-fit: cover; object-position: center;"
                            alt="' . $fahrzeuge->marke . '/' . $fahrzeuge->modell . '/' . $item->images . '">';
                }
            }
        }
        $output .= '
                    </body>
                    </html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($output);
        $dompdf->setPaper('A4');
        $dompdf->render();
        $dompdf->stream($fahrzeuge->marke.'_'.$fahrzeuge->modell.'_'.date('d.m.Y').'_expose.pdf');
    }
}
