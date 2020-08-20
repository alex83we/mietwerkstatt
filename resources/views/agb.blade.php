@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'AGB ')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="container-content border-0">
                    <div class="container-inner" id="impressum">
                        <h1>Bedingungen für die Vermietung von Hebebühnen, Werkzeug und Maschinen zur Reparatur von
                            Personenkraftwagen</h1>
                        <h4>§ 1 Vertragsgegenstand</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Der Vermieter stellt dem Mieter Räumlichkeiten, Hebebühnen und Werkzeug zur Reparatur von
                                Kraftfahrzeugen gegen Entgelt zur Verfügung.</li>
                            <li class="mb-2">b. Weiterhin stellt der Vermieter qualifiziertes Aufsichtspersonal, das in der Sachkundigen
                                Benutzung von Werkzeugen und Maschinen beratend tätig werden kann. Der Mieter hat jedoch keinen
                                Anspruch auf eine Beratung über die Ausführung oder Zuverlässigkeit der geplanten Reparatur.</li>
                        </ul>
                        <h4>§ 2 Vertragsabschluss, Vertragsdauer und Preise</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Der Mietvertrag kommt zustande durch Unterzeichnung eines schriftlichen Mietvertrages durch
                        den Mieter. Auf dem Mietvertrag wird der Mietumfang (Hebebühne, benötigte Werkzeuge, etc.)
                                festgelegt, ebenso der Zeitpunkt des Beginnes des Mietverhältnisses.</li>
                        <li class="mb-2">b. Der Mietvertrag kann jederzeit vom Mieter um weitere Leistungen erweitert werden. Auch hier
                            werden jeweils die Ausgabezeiten notiert.</li>
                            <li class="mb-2">c. Es gelten die Preise, die in der Mietwerkstatt ausgehängt sind.</li>
                        <li class="mb-2">d. Werden einzelne Mietgegenstände wieder zurückgegeben, so wird die Rücknahme auf dem Auftrag
                            notiert.</li>
                        <li class="mb-2">e. Der Mietvertrag endet mit ordnungsgemäßer Rückgabe aller angemieteten Mietgegenstände sowie
                            Erteilung der Rechnung über den Mietzins und eventuell vereinbarte Zusatzleistung.</li>
                        </ul>
                        <h4>§ 3 Pflichten des Vermieters</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Der Vermieter stellt die in der Preisliste aufgeführten Werkzeuge gegen Entgelt zur
                                Verfügung. Weiteres Werkzeug kann der Vermieter auf Anfrage zur Verfügung stellen, ein
                                Anspruch
                                hierauf besteht nicht.
                            </li>
                            <li class="mb-2">b. Der Vermieter stellt sicher, dass die ausgegebenen Werkzeuge einwandfreiem Zustand
                                und den
                                geltenden Unfallverhütungsvorschriften entsprechen, ebenso den Prüfungen nach den
                                behördlichen
                                und gesetzlichen Vorgaben regelmäßig unterzogen werden.
                            </li>
                        </ul>
                        <h4>§ 4 Pflichten des Mieters</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Der Mieter hat mit den angemieteten Werkzeugen und Maschinen sorgfältig umzugehen.
                            </li>
                            <li class="mb-2">b. Im Falle einer schuldhaften Beschädigung überlassener Mietgegenstände oder sonstiger
                                Betriebseinrichtungen des Vermieters, auch bei unsachgemäßer Bedienung, ist der Mieter
                                zum
                                Schadensersatz verpflichtet.
                            </li>
                            <li class="mb-2">c. Der Mieter hat den Anweisungen des Aufsichtspersonals unbedingt Folge zu leisten.
                            </li>
                            <li class="mb-2">d. Aushängenden Betriebsanweisungen sind unbedingt Folge zu leisten. Das ausgehändigte
                                Info-Blatt mit Sicherheitshinweisen ist zu beachten.
                            </li>
                            <li class="mb-2">e. Der jeweilige Arbeitsplatz ist sauber zu halten.</li>
                            <li class="mb-2">f. Der Mieter darf an seinem Fahrzeug keine Umbauten vornehmen, die gegen die
                                Straßenverkehrsordnung verstoßen.
                            </li>
                        </ul>
                        <h4>§ 5 Haftungsausschluss</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Der Vermieter haftet nicht für die Arbeiten, die der Mieter an seinem Fahrzeug
                                durchführt.
                            </li>
                            <li class="mb-2">b. Eventuelle Beratungen durch das Aufsichtspersonal erfolgen nach bestem Wissen und
                                Gewissen,
                                gleichwohl unverbindlich. Hat der Vermieter nach den gesetzlichen Bestimmungen für einen
                                auf
                                einer nachgewiesenen schuldhaften Fehlberatung oder sonstigen in seinem
                                Verantwortungsbereich
                                begründeten Schaden aufzukommen, haftet der Vermieter soweit nicht Leben, Körper und
                                Gesundheit
                                betroffen sind, nur im Falle grober Fahrlässigkeit oder vorsätzlicher Pflichtverletzung
                                seines
                                gesetzlichen Vertreters oder seiner Erfüllungsgehilfen.
                            </li>
                            <li class="mb-2">c. Nimmt ein Mieter entgegen Punkt IV. f Umbauten an seinem Fahrzeug vor, die gegen die
                                Straßenverkehrsordnung verstoßen, so kann der Vermieter hierfür nicht haftbar gemacht
                                werden.
                            </li>
                            <li class="mb-2">d. Die Benutzung der Mietwerkstatt erfolgt auf eigene Gefahr. Im Falle von Unfällen,
                                bedingt
                                durch Verkehrssicherungspflichtverletzungen des Vermieters bleibt die Haftung des
                                Vermieters
                                beschränkt auf Fälle vorsätzlicher oder grob fahrlässiger Pflichtverletzungen. Dies gilt
                                nicht
                                im Falle von Schadensersatzansprüchen aus der Verletzung von Leben, Körper oder
                                Gesundheit des
                                Mieters.
                            </li>
                        </ul>
                        <h4>§ 6 Zahlung</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Der Rechnungsbetrag für die Miete ist vor Verlassen der Werkstatt sofort in bar oder
                                EC-Cash
                                fällig.
                            </li>
                            <li class="mb-2">b. Eine Aufrechnung des Mieters mit Ansprüchen gegen den Vermieter ist nur möglich, wenn
                                die
                                Gegenforderung des Mieters unbestritten ist oder ein rechtskräftiger Titel vorliegt; ein
                                Zurückbehaltungsrecht kann der Mieter nur geltend machen, soweit es auf Ansprüchen aus
                                dem
                                Mietverhältnis beruht.
                            </li>
                            <li class="mb-2">c. Der Vermieter ist berechtigt, bei Mietbeginn eine entsprechende Vorauszahlung zu
                                verlangen.
                            </li>
                        </ul>
                        <h4>§ 7 Erweitertes Pfandrecht</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Dem Vermieter steht wegen seiner Forderung aus dem Mietverhältnis ein vertragliches
                                Pfandrecht an den aufgrund des Mietverhältnisses in seine Räumlichkeiten gelangten
                                Gegenständen
                                zu.
                            </li>
                            <li class="mb-2">b. Das vertragliche Pfandrecht kann auch wegen Forderungen aus früheren
                                Mietverhältnissen
                                geltend gemacht werden. Für sonstige Ansprüche aus der Geschäftsverbindung gilt das
                                vertragliche
                                Pfandrecht nur, soweit diese unbestritten sind oder ein rechtskräftiger Titel vorliegt
                                und die
                                Gegenstände im Eigentum des Mieters stehen.
                            </li>
                        </ul>
                        <h4>§ 8 Geltung weiterer Allgemeiner Geschäftsbedingungen</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Erwirbt der Mieter beim Vermieter Ersatzteile, Schmierstoffe o.ä., so gelten hierfür
                                die im
                                Betrieb des Vermieters aushängenden Allgemeinen Lieferbedingungen für Ersatz- und
                                Austauschteile.
                            </li>
                            <li class="mb-2">b. Gibt der Mieter dem Vermieter den Auftrag, eine Reparatur an dem Fahrzeug
                                durchzuführen, so
                                gelten hierfür die im Betrieb des Vermieters aushängenden Bedingungen für die Ausführung
                                von
                                Arbeiten an Kraftfahrzeugen, Anhängern, Aggregaten und deren Teilen und für
                                Kostenvoranschläge.
                            </li>
                        </ul>
                        <h4>§ 9 Gerichtsstand</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">a. Für sämtliche gegenwärtigen und zukünftigen Ansprüche aus der Geschäftsverbindung mit
                                Kaufleuten einschließlich Wechsel- und Scheckforderungen ist ausschließlicher
                                Gerichtsstand der
                                Sitz des Vermieters. Der gleiche Gerichtsstand gilt, wenn der Mieter keinen allgemeinen
                                Gerichtsstand im Inland hat, nach Vertragsabschluss seinen Wohnsitz oder gewöhnlichen
                                Aufenthaltsort aus dem Inland verlegt oder sein Wohnsitz oder gewöhnlicher
                                Aufenthaltsort zum
                                Zeitpunkt der Klageerhebung nicht bekannt ist.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
