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
                        <h1>HAUSORDNUNG</h1>
                        <ul class="list-unstyled">
                            <li class="mb-2">1. Mit Unterzeichnung des Mietvertrages wird die Hausordnung vom Mieter anerkannt.</li>
                            <li class="mb-2">2. Die Vermietung erfolgt unter Ausschluss jeglicher Gewährleistung auf eigenes Risiko.</li>
                            <li class="mb-2">3. Der Mieter ist eigenverantwortlich für ausreichenden Arbeitsschutz und Arbeitsschutzkleidung verantwortlich.</li>
                            <li class="mb-2">4. Kinder und Jugendliche unter 16 Jahre ist der Aufenthalt im Werkstattbereich nur in Begleitung eines Erwachsenen erlaubt. Die Bedienung der Hebebühne ist nur Personen über 18 Jahren erlaubt.</li>
                            <li class="mb-2">5. Für die Entsorgung von Altteilen ist der Mieter verantwortlich. Betriebs- und Schmierstoffe können für eine Pauschale nach gültiger Preisliste entsorgt werden.</li>
                            <li class="mb-2">6. Der Mieter verpflichtet sich an die gesetzlichen Sicherheits- und Brandschutzbestimmungen zu halten und kann bei Missachtung strafbar gemacht werden.</li>
                            <li class="mb-2">7. Das Rauchen ist im Werkstattbereich nicht erlaubt.</li>
                            <li class="mb-2">8. Beschädigungen jeglicher Art sind unverzüglich dem Vermieter zu melden.</li>
                            <li class="mb-2">9. Der Mieter haftet für entstandene Schäden an Einrichtung, Mobiliar, Werkzeuge oder Maschinen in voller Höhe.</li>
                            <li class="mb-2">10. Der Arbeitsplatz wird im sauberen Zustand übergeben und ist in einem gesäuberten Zustand zu hinterlassen, anderenfalls wird eine Reinigungspauschale von 15 € erhoben.</li>
                            <li class="mb-2">11. Der Mietzins ist direkt nach Beendigung des Mietverhältnisses an den Vermieter zu entrichten.</li>
                            <li class="mb-2">12. Der Mieter führt jegliche Art von Reparaturen / Instandhaltungen/ Arbeiten in Eigenverantwortung durch.</li>
                            <li class="mb-2">13. Der Vermieter ist berechtigt ohne Angabe von Gründen den Mietvertrag fristlos zu kündigen.</li>
                            <li class="mb-2">14. Der Vermieter haftet nur für groben Vorsatz oder grobe Fahrlässigkeit seinerseits.</li>
                            <li class="mb-2">15. Die Benutzung von hauseigenen Werkzeugen und Geräten bedarf der Genehmigung des Vermieters und wird gesondert berechnet.</li>
                            <li class="mb-2">16. Bei Bestellung von Teilen ist eine Anzahlung in Höhe von 50% des Kaufpreises zu entrichten. Bestellte Ware bleibt bis zur vollständigen Bezahlung Eigentum der Mietwerkstatt Roßleben.</li>
                            <li class="mb-2">17. Die Unterbringung von persönlichen Gegenständen des Mieters erfolgt auf eigenes Risiko. Der Vermieter haftet nicht bei Diebstahl.</li>
                            <li class="mb-2">18. Den Anweisungen des Personals ist Folge zu leisten.</li>
                            <li class="mb-2">19. Bei Verstoß gegen die Hausordnung ist der Vermieter berechtigt das Mietverhältnis fristlos zu kündigen, und ein Hausverbot auszusprechen.</li>
                            <li class="mb-2">20. Die Beratung des Personals ist unverbindlich.</li>
                            <li class="mb-2">21. Sofern nicht schriftlich etwas Abweichendes vereinbart ist, ist Erfüllungsort der Geschäftssitz der Mietwerkstatt. Das Vertragsverhältnis unterliegt dem Recht der Bundesrepublik Deutschland.</li>
                            <li class="mb-2">22. Sämtliche Vereinbarungen zwischen dem Verkäufer / Vermieter und dem Käufer / Mieter über die Durchführung des Vertrages sind schriftlich niederzulegen.</li>
                            <li class="mb-2">23. Gegenseitig zu helfen ist selbstverständlich.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
