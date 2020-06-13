@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Kontaktanfrage ')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="container-content border-0">
                    <div class="container-inner mb-4">
                        <h2 class="dp-title-h2 prime-color">Kontaktformular</h2>
                        <p>Für Ihre Anfragen und Wünsche haben wir immer ein offenes Ohr.<br>
                            Bitte füllen Sie unser Kontaktformular aus. Wir werden uns dann umgehend mit Ihnen in Verbindung setzen.</p>
                        <form action="{{ route('kontakt.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input class="form-control" type="text" name="firma" placeholder="Firma">
                                </div>
                                <div class="form-group col-lg-6">
                                    <select class="form-control @error('anrede') is-invalid @enderror" name="anrede">
                                        <option selected>Herr</option>
                                        <option>Frau</option>
                                        <option>Firma</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control  @error('vorname') is-invalid @enderror" type="text" name="vorname" placeholder="Vorname" value="{{ old('vorname') }}">
                                    @error('vorname')
                                    <small style="color: red;">Bitte geben sie ihren Vornamen an</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control  @error('nachname') is-invalid @enderror" type="text" name="nachname" placeholder="Nachname" value="{{ old('nachname') }}">
                                    @error('nachname')
                                    <small style="color: red;">Bitte geben sie ihren Nachnamen an</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control  @error('strasse') is-invalid @enderror" type="text" name="strasse" placeholder="Straße" value="{{ old('strasse') }}">
                                    @error('strasse')
                                    <small style="color: red;">Bitte geben sie ihre Straße an</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control  @error('plz') is-invalid @enderror" type="number" name="plz" placeholder="Postleitzahl" value="{{ old('plz') }}" maxlength="5">
                                    @error('plz')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('ort') is-invalid @enderror" type="text" name="ort" placeholder="Wohnort" value="{{ old('ort') }}">
                                    @error('ort')
                                    <small style="color: red;">Bitte geben sie ihren Wohnort an</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="E-Mail-Adresse" value="{{ old('email') }}">
                                    @error('email')
                                    <small style="color: red;">Bitte geben sie ihre E-Mail Adresse an</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input class="form-control @error('tel') is-invalid @enderror" type="tel" name="tel" placeholder="Telefon" value="{{ old('tel') }}">
                                    @error('tel')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea class="form-control @error('text') is-invalid @enderror" style="height: 176px;" name="text" placeholder="Ihre Nachricht">{{{ old('text') }}}</textarea>
                                    @error('text')
                                    <small style="color: red;">Bitte beschreiben sie uns ihr Anliegen</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('datenschutz') is-invalid @enderror" type="checkbox" name="datenschutz" id="datenschutz" @if(old('datenschutz')) checked @endif value="Datenschutz bestätigt">
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
                                    <button class="btn btn-outline-secondary btn-block">Absenden</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
