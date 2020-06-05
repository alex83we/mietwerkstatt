@extends('layouts.main')

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Impressum ')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="container-content border-0">
                    <div class="container-inner" id="impressum">
                        <h1>Impressum</h1>
                        <h3>Informationspflicht laut § 5 TMG.</h3>
                        @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma)
                            <p>{{ $firma->firmenname }}<br>
                            {{ $firma->firmenzusatz }}<br>
                            {{ $firma->straße }}<br>
                            {{ $firma->plz.' '.$firma->ort }}<br>
                            <br>
                            {{ 'Telefon: '.$firma->telefon }}<br>
                            {{ 'Telefon: '.$firma->mobil }}<br>
                            {{ 'Telefax: '.$firma->fax }}<br>
                            <br>
                            {{ 'E-Mail: '.$firma->email }}</p>
                        @endforeach
                        <h3>Aufsichtsbehörde</h3>
                        <p>Der Thüringer Landesbeauftragte für den Datenschutz (TLFD)<br>
                            Webseite der Aufsichtsbehörde<br>
                            <a href="http://www.thueringen.de/datenschutz">http://www.thueringen.de/datenschutz</a> <br>
                            Anschrift der Aufsichtsbehörde<br>
                            Postfach 90 04 55, 99107 Erfurt Häßlerstr. 8, 99096 Erfurt</p>

                        <h3>EU-Streitschlichtung</h3>
                        <p>Gemäß Verordnung über Online-Streitbeilegung in Verbraucherangelegenheiten (ODR-Verordnung) möchten wir Sie über die Online-Streitbeilegungsplattform (OS-Plattform) informieren.</p>
                        <p>Verbraucher haben die Möglichkeit, Beschwerden an die Online Streitbeilegungsplattform der Europäischen Kommission unter <a href="http://ec.europa.eu/odr?tid=321141521">http://ec.europa.eu/odr?tid=321141521</a> zu richten. Die dafür notwendigen Kontaktdaten finden Sie oberhalb in unserem Impressum.</p>

                        <p>Wir möchten Sie jedoch darauf hinweisen, dass wir nicht bereit oder verpflichtet sind, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>

                        <h3>Haftung für Inhalte dieser Website</h3>
                        <p>Wir entwickeln die Inhalte dieser Webseite ständig weiter und bemühen uns korrekte und aktuelle Informationen bereitzustellen. Laut Telemediengesetz <a href="https://www.gesetze-im-internet.de/tmg/__7.html?tid=321141521">(TMG) §7 (1)</a> sind wir als Diensteanbieter für eigene Informationen, die wir zur Nutzung bereitstellen, nach den allgemeinen Gesetzen verantwortlich. Leider können wir keine Haftung für die Korrektheit aller Inhalte auf dieser Webseite übernehmen, speziell für jene die seitens Dritter bereitgestellt wurden. Als Diensteanbieter im Sinne der §§ 8 bis 10 sind wir nicht verpflichtet, die von ihnen übermittelten oder gespeicherten Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>

                        <p>Unsere Verpflichtungen zur Entfernung von Informationen oder zur Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen aufgrund von gerichtlichen oder behördlichen Anordnungen bleiben auch im Falle unserer Nichtverantwortlichkeit nach den §§ 8 bis 10 unberührt.</p>

                        <p>Sollten Ihnen problematische oder rechtswidrige Inhalte auffallen, bitte wir Sie uns umgehend zu kontaktieren, damit wir die rechtswidrigen Inhalte entfernen können. Sie finden die Kontaktdaten im Impressum.</p>

                        <h3>Haftung für Links auf dieser Website</h3>
                        <p>Unsere Webseite enthält Links zu anderen Webseiten für deren Inhalt wir nicht verantwortlich sind. Haftung für verlinkte Websites besteht für uns nicht, da wir keine Kenntnis rechtswidriger Tätigkeiten hatten und haben, uns solche Rechtswidrigkeiten auch bisher nicht aufgefallen sind und wir Links sofort entfernen würden, wenn uns Rechtswidrigkeiten bekannt werden.</p>

                        <p>Wenn Ihnen rechtswidrige Links auf unserer Website auffallen, bitte wir Sie uns zu kontaktieren. Sie finden die Kontaktdaten im Impressum.</p>

                        <h3>Urheberrechtshinweis</h3>
                        <p>Alle Inhalte dieser Webseite (Bilder, Fotos, Texte, Videos) unterliegen dem Urheberrecht der Bundesrepublik Deutschland. Bitte fragen Sie uns bevor Sie die Inhalte dieser Website verbreiten, vervielfältigen oder verwerten wie zum Beispiel auf anderen Websites erneut veröffentlichen. Falls notwendig, werden wir die unerlaubte Nutzung von Teilen der Inhalte unserer Seite rechtlich verfolgen.</p>

                        <p>Sollten Sie auf dieser Webseite Inhalte finden, die das Urheberrecht verletzen, bitten wir Sie uns zu kontaktieren.</p>

                        <div style="display: none;">
                            <h3>Bildernachweis</h3>
                            <p>Die Bilder, Fotos und Grafiken auf dieser Webseite sind urheberrechtlich geschützt.</p>

                            <p>Die Bilderrechte liegen bei den folgenden Fotografen und Unternehmen:</p>

                            <ul>
                                <li>Fotograf Mustermann</li>
                            </ul>
                        </div>
                        <p><strong>Quelle:</strong> Erstellt mit dem Datenschutz Generator von AdSimple in Kooperation mit <a href="//www.123familie.de">123familie.de</a> </p>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
