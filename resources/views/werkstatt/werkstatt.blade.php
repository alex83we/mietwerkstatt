@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Service & Werkstattanfrage ')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="container-content" style="border: none;">
                    <div class="container-inner mb-4">
                        <h2 class="dp-title-h2 prime-color">Service & Werkstatt</h2>
                        <b>Bühnen:</b>
                        <p>Für die Hobbyschrauber unter Ihnen stehen 2 Hebebühnen und eine große Anzahl an unterschiedlichen Werkzeugen zur Verfügung.<br>
                           Für eine Mietgebühr von nur 12,- €/Std. exkl. Werkzeugleihgebühr und Material können Sie die Instandsetzung Ihres Fahrzeuges schnell und unkompliziert selbst vornehmen.<br>
                           Bei Fragen oder Schwierigkeiten steht Ihnen selbstverständlich das Personal des Mietwerkstatt Roßleben kompetent zur Seite.<br>
                           Je nach Aufwand können in diesem Fall jedoch zusätzliche Kosten auf Sie zukommen.</p>
                        <b>Wichtiger Hinweis:</b>
                        <p>Eine Gewährleistung ist lediglich für die in der Mietwerkstatt Roßleben erworbene Ersatzteile möglich.<br>
                           Für von Ihnen selbst erbrachte Leistungen an Ihrem Fahrzeug können wir ebenfalls keine Gewährleistung übernehmen.</p>
                        <form action="{{ route('werkstatt.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input class="form-control" type="text" name="firma" placeholder="Firma" value="{{ old('firma') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <select class="form-control @error('anrede') is-invalid @enderror" name="anrede" value="{{ old('anrede') }}">
                                        <option selected>Herr</option>
                                        <option>Frau</option>
                                        <option>Firma</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('vorname') is-invalid @enderror" type="text" name="vorname" placeholder="Vorname" value="{{ old('vorname') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('nachname') is-invalid @enderror" type="text" name="nachname" placeholder="Nachname" value="{{ old('nachname') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('strasse') is-invalid @enderror" type="text" name="strasse" placeholder="Straße" value="{{ old('strasse') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('plz') is-invalid @enderror" type="text" name="plz" placeholder="Postleitzahl" value="{{ old('plz') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('ort') is-invalid @enderror" type="text" name="ort" placeholder="Wohnort" value="{{ old('ort') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="E-Mail-Adresse" value="{{ old('email') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('tel') is-invalid @enderror" type="tel" name="tel" placeholder="Telefon" value="{{ old('tel') }}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Mein Wunschtermin</label>
                                    <input class="form-control @error('wtermin') is-invalid @enderror" type="date" name="wtermin" value="{{ old('wtermin') }}">
                                </div>
                                <div class="form-group col-lg-1">
                                    <label>Uhrzeit</label>
                                    <select class="form-control @error('wterminuhrzeit') is-invalid @enderror" name="wterminuhrzeit" value="{{ old('wterminuhrzeit') }}">
                                        <option @if(old('wterminuhrzeit') == "") selected @endif></option>
                                        <option @if(old('wterminuhrzeit') == "10") selected @endif>10</option>
                                        <option @if(old('wterminuhrzeit') == "11") selected @endif>11</option>
                                        <option @if(old('wterminuhrzeit') == "12") selected @endif>12</option>
                                        <option @if(old('wterminuhrzeit') == "13") selected @endif>13</option>
                                        <option @if(old('wterminuhrzeit') == "14") selected @endif>14</option>
                                        <option @if(old('wterminuhrzeit') == "15") selected @endif>15</option>
                                        <option @if(old('wterminuhrzeit') == "16") selected @endif>16</option>
                                        <option @if(old('wterminuhrzeit') == "17") selected @endif>17</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-1">
                                    <label>&nbsp;</label><select class="form-control @error('wterminuhrzeit1') is-invalid @enderror" name="wterminuhrzeit1">
                                        <option @if(old('wterminuhrzeit1') == "") selected @endif></option>
                                        <option @if(old('wterminuhrzeit1') == "00") selected @endif>00</option>
                                        <option @if(old('wterminuhrzeit1') == "30") selected @endif>30</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Alternativtermin</label>
                                    <input class="form-control" type="date" name="atermin" value="{{ old('atermin') }}">
                                </div>
                                <div class="form-group col-lg-1">
                                    <label>Uhrzeit</label>
                                    <select class="form-control" name="aterminuhrzeit" value="{{ old('aterminuhrzeit') }}">
                                        <option @if(old('aterminuhrzeit') == "") selected @endif></option>
                                        <option @if(old('aterminuhrzeit') == "10") selected @endif>10</option>
                                        <option @if(old('aterminuhrzeit') == "11") selected @endif>11</option>
                                        <option @if(old('aterminuhrzeit') == "12") selected @endif>12</option>
                                        <option @if(old('aterminuhrzeit') == "13") selected @endif>13</option>
                                        <option @if(old('aterminuhrzeit') == "14") selected @endif>14</option>
                                        <option @if(old('aterminuhrzeit') == "15") selected @endif>15</option>
                                        <option @if(old('aterminuhrzeit') == "16") selected @endif>16</option>
                                        <option @if(old('aterminuhrzeit') == "17") selected @endif>17</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-1">
                                    <label>&nbsp;</label><select class="form-control" name="aterminuhrzeit1"  value="{{ old('aterminuhrzeit1') }}">
                                        <option @if(old('aterminuhrzeit1') == "") selected @endif></option>
                                        <option @if(old('aterminuhrzeit1') == "00") selected @endif>00</option>
                                        <option @if(old('aterminuhrzeit1') == "30") selected @endif>30</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('fahrzeug') is-invalid @enderror" type="text" name="fahrzeug" placeholder="Mein Fahrzeug: Hersteller / Model" value="{{ old('fahrzeug') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('kennzeichen') is-invalid @enderror" type="text" name="kennzeichen" placeholder="Kennzeichen" value="{{ old('kennzeichen') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control" type="text" name="fahrgestell" placeholder="Fahrgestellnummer" value="{{ old('fahrgestell') }}">
                                </div>
                                <div class="form-group col-lg-3">
                                    <input class="form-control @error('km') is-invalid @enderror" type="text" name="km" placeholder="Kilometerstand" value="{{ old('km') }}">
                                </div>
                                <div class="form-group col-lg-3">
                                    <input class="form-control" type="text" name="bj" placeholder="Baujahr" value="{{ old('bj') }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <textarea class="form-control @error('text') is-invalid @enderror" style="height: 176px;" name="text" placeholder="Ihre Nachricht">{{{ old('text') }}}</textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Servicewünsche</label><br>
                                    <div class="form-check form-check-inline" style="width: 45%">
                                        <input class="form-check-input" type="checkbox" id="Hebebuehne" name="hebebuehne"  value="Hebebuehne mieten" @if(old('hebebuehne')) checked @endif>
                                        <label class="form-check-label" for="Hebebuehne">Hebebühne mieten</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="width: 45%">
                                        <input class="form-check-input" type="checkbox" id="Reifenwechsel" name="reifenwechsel" value="Reifenwechsel" @if(old('reifenwechsel')) checked @endif>
                                        <label class="form-check-label" for="Reifenwechsel">Reifenwechsel</label>
                                    </div><br>
                                    <div class="form-check form-check-inline" style="width: 45%">
                                        <input class="form-check-input" type="checkbox" id="HuAu" name="huau"  value="HU / AU" @if(old('huau')) checked @endif>
                                        <label class="form-check-label" for="HuAu">HU / AU</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="width: 45%">
                                        <input class="form-check-input" type="checkbox" id="Service" name="service" value="Service" @if(old('service')) checked @endif>
                                        <label class="form-check-label" for="Service">Service</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="width: 45%">
                                        <input class="form-check-input" type="checkbox" id="Inspektion" name="inspektion" value="Inspektion" @if(old('inspektion')) checked @endif>
                                        <label class="form-check-label" for="Inspektion">Inspektion</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="width: 45%">
                                        <input class="form-check-input" type="checkbox" id="Sonstiges" name="sonstiges" value="Sonstiges" @if(old('sonstiges')) checked @endif>
                                        <label class="form-check-label" for="Sonstiges">Sonstiges</label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('datenschutz') is-invalid @enderror" type="checkbox" name="datenschutz" id="datenschutz" @if(old('datenschutz')) checked @endif>
                                        <label class="form-check-label" for="datenschutz">
                                            Ich bin damit einverstanden, das meine persönlichen Daten entsprechend der deutschen
                                            <a href="/datenschutz">Datenschutzbestimmungen</a> gespeichert und verarbeitet werden.
                                        </label>
                                        @error('datenschutz')
                                        <small style="color: red;">Bitte bestätigen Sie das sie unseren Datenschutz kennen.</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <button type="submit" class="btn btn-outline-secondary btn-block">Absenden</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
