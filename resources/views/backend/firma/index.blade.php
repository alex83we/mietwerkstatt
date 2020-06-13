@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

@section('titel', 'Service & Werkstattanfrage ')

@push('css')

@endpush

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form action="{{ route('backend.firma.store') }}" method="post">
                        <input type="hidden" name="id" value="{{ $firma->id }}">
                        <div class="card">
                            <div class="card-header bg-dark">
                                Firmenadresse
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <label for="firmenname" class="col-form-label col-sm-1 pt-0">Firmenname</label>
                                        <div class="col-sm-5">
                                        <input type="text"
                                               class="form-control form-control-sm @error('firmenname') is-invalid @enderror" name="firmenname" id="firmenname"
                                               placeholder="" value="{{ $firma->firmenname }}">

                                                @error('firmenname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        <label for="firmenzusatz" class="col-form-label col-sm-1 pt-0">Firmenzusatz</label>
                                        <div class="col-sm-5">
                                        <input type="text"
                                               class="form-control form-control-sm @error('firmenzusatz') is-invalid @enderror" name="firmenzusatz" id="firmenzusatz"
                                               placeholder="" value="{{ $firma->firmenzusatz }}">

                                            @error('firmenzusatz')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="straße" class="col-form-label col-sm-1 pt-0">Straße</label>
                                        <div class="col-sm-5">
                                        <input type="text"
                                               class="form-control form-control-sm @error('straße') is-invalid @enderror" name="straße" id="straße"
                                               placeholder="" value="{{ $firma->straße }}">

                                            @error('straße')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="plz" class="col-form-label col-sm-1 pt-0">PLZ</label>
                                        <div class="col-sm-1">
                                        <input type="text"
                                               class="form-control form-control-sm @error('plz') is-invalid @enderror" name="plz" id="plz"
                                               placeholder="" value="{{ $firma->plz }}">

                                            @error('plz')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="ort" class="col-form-label col-sm-1 pt-0">Ort</label>
                                        <div class="col-sm-3">
                                        <input type="text"
                                               class="form-control form-control-sm @error('ort') is-invalid @enderror" name="ort" id="ort"
                                               placeholder="" value="{{ $firma->ort }}">

                                            @error('ort')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="telefon" class="col-form-label col-sm-1 pt-0">Telefon</label>
                                        <div class="col-sm-5">
                                        <input type="tel"
                                               class="form-control form-control-sm @error('telefon') is-invalid @enderror" name="telefon" id="telefon"
                                               placeholder="" value="{{ $firma->telefon }}">

                                            @error('telefon')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="www" class="col-form-label col-sm-1 pt-0">Internetseite</label>
                                        <div class="col-sm-5">
                                        <input type="text"
                                               class="form-control form-control-sm @error('www') is-invalid @enderror" name="www" id="www"
                                               placeholder="" value="{{ $firma->www }}">

                                            @error('www')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="mobil" class="col-form-label col-sm-1 pt-0">Mobiltelefon</label>
                                        <div class="col-sm-5">
                                        <input type="tel"
                                               class="form-control form-control-sm @error('mobil') is-invalid @enderror" name="mobil" id="mobil"
                                               placeholder="" value="{{ $firma->mobil }}">

                                            @error('mobil')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="email" class="col-form-label col-sm-1 pt-0">E-Mail-Adresse</label>
                                        <div class="col-sm-5">
                                        <input type="email"
                                               class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email"
                                               placeholder="" value="{{ $firma->email }}">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="fax" class="col-form-label col-sm-1 pt-0">Fax</label>
                                        <div class="col-sm-5">
                                        <input type="tel"
                                               class="form-control form-control-sm @error('fax') is-invalid @enderror" name="fax" id="fax"
                                               placeholder="" value="{{ $firma->fax }}">

                                            @error('fax')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="ustid" class="col-form-label col-sm-1 pt-0">Ust.-Id.-Nr.</label>
                                        <div class="col-sm-5">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('ustid') is-invalid @enderror" name="ustid" id="ustid"
                                                   placeholder="" value="{{ $firma->ustid }}">

                                            @error('ustid')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="row">
                                        <label for="steuernr" class="col-form-label col-sm-1 pt-0">Steuernummer</label>
                                        <div class="col-sm-5">
                                        <input type="text"
                                               class="form-control form-control-sm @error('steuernr') is-invalid @enderror" name="steuernr" id="steuernr"
                                               placeholder="" value="{{ $firma->steuernr }}">

                                            @error('steuernr')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-dark rounded-0">Social-Media</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="facebook" class="col-form-label col-sm-1 pt-0">Facebook</label>
                                        <div class="col-sm-3">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('facebook') is-invalid @enderror" name="facebook" id="facebook"
                                                   placeholder="" value="{{ $firma->facebook }}">

                                            @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="instagram" class="col-form-label col-sm-1 pt-0">Instagram</label>
                                        <div class="col-sm-3">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('instagram') is-invalid @enderror" name="instagram" id="instagram"
                                                   placeholder="" value="{{ $firma->instagram }}">

                                            @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="twitter" class="col-form-label col-sm-1 pt-0">Twitter</label>
                                        <div class="col-sm-3">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('twitter') is-invalid @enderror" name="twitter" id="twitter"
                                                   placeholder="" value="{{ $firma->twitter }}">

                                            @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-dark rounded-0">Öffnungszeiten</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="montag" class="col-form-label col-sm-1 pt-0">Montag</label>
                                        <div class="col-sm-2">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('montag') is-invalid @enderror" name="montag" id="montag"
                                                   placeholder="" value="{{ $firma->montag }}">

                                            @error('montag')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="dienstag" class="col-form-label col-sm-1 pt-0">Dienstag</label>
                                        <div class="col-sm-2">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('dienstag') is-invalid @enderror" name="dienstag" id="dienstag"
                                                   placeholder="" value="{{ $firma->dienstag }}">

                                            @error('dienstag')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="mittwoch" class="col-form-label col-sm-1 pt-0">Mittwoch</label>
                                        <div class="col-sm-2">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('mittwoch') is-invalid @enderror" name="mittwoch" id="mittwoch"
                                                   placeholder="" value="{{ $firma->mittwoch }}">

                                            @error('mittwoch')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="donnerstag" class="col-form-label col-sm-1 pt-0">Donnerstag</label>
                                        <div class="col-sm-2">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('donnerstag') is-invalid @enderror" name="donnerstag" id="donnerstag"
                                                   placeholder="" value="{{ $firma->donnerstag }}">

                                            @error('donnerstag')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="freitag" class="col-form-label col-sm-1 pt-0">Freitag</label>
                                        <div class="col-sm-2">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('freitag') is-invalid @enderror" name="freitag" id="freitag"
                                                   placeholder="" value="{{ $firma->freitag }}">

                                            @error('freitag')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="samstag" class="col-form-label col-sm-1 pt-0">Samstag</label>
                                        <div class="col-sm-2">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('samstag') is-invalid @enderror" name="samstag" id="samstag"
                                                   placeholder="" value="{{ $firma->samstag }}">

                                            @error('samstag')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <button type="submit" class="btn btn-sm btn-block btn-outline-orange">
                                                Speichern
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')

@endpush

