@extends('layouts.auth')

@section('meta')
    <meta name=“robots“ content=“noindex, nofollow“ />
@endsection

@section('content')
    <div class="hold-transition login-page" style="background: none; height: 84vh;">
        <div class="register-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logoWerkstatt.png') }}" style="height: 100px;"></a>
            </div>
            <div class="card shadow-lg">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Registrieren sie sich</p>
                    <form method="POST" action="{{ route('register') }}">
                    @csrf

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus
                                           placeholder="{{ __('Username') }}">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input id="firma" type="text" class="form-control @error('firma') is-invalid @enderror" name="firma" value="{{ old('firma') }}" autocomplete="firma" autofocus placeholder="{{ __('Firma') }}">

                                    @error('firma')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <select class="form-control @error('anrede') {{ $message }} is-invalid @enderror" id="kontaktAnrede" name="anrede">
                                    <option @if (old('anrede') == 'Herr') selected @endif>Herr</option>
                                    <option @if (old('anrede') == 'Frau') selected @endif>Frau</option>
                                    <option @if (old('anrede') == 'Firma') selected @endif>Firma</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <input id="vorname" type="text" class="form-control @error('vorname') is-invalid @enderror" name="vorname" value="{{ old('vorname') }}" required autocomplete="vorname" autofocus placeholder="{{ __('Vorname') }}">

                                    @error('vorname')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input id="straße" type="text" class="form-control @error('straße') is-invalid @enderror" name="straße" value="{{ old('straße') }}" required autocomplete="straße" autofocus placeholder="{{ __('Straße') }}">

                                    @error('straße')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <input id="plz" type="text" class="form-control @error('plz') is-invalid @enderror" name="plz" value="{{ old('plz') }}" required autocomplete="plz" autofocus placeholder="{{ __('Postleitzahl') }}">

                                    @error('plz')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <input id="ort" type="text" class="form-control @error('ort') is-invalid @enderror" name="ort" value="{{ old('ort') }}" required autocomplete="ort" autofocus placeholder="{{ __('Ort') }}">

                                    @error('ort')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input id="telefon" type="text" class="form-control @error('telefon') is-invalid @enderror" name="telefon" value="{{ old('telefon') }}" required autocomplete="telefon" autofocus placeholder="{{ __('Telefon') }}">

                                    @error('telefon')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Adresse') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" aria-describedby="passwordHelpBlock" placeholder="{{__('Passwort')}}">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ 'Passwort wiederholen' }}">
                                </div>
                            </div>
                            {{--<div class="col-md-12">
                                <p id="passwordHelpBlock" class="form-text text-muted">
                                    Ihr Passwort muss länger als 8 Zeichen sein und sollte mindestens 1 Großbuchstaben, 1 Kleinbuchstaben, 1 Ziffer und 1 Sonderzeichen enthalten.
                                </p>
                            </div>--}}
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="icheck-orange">
                                    <input type="checkbox" name="terms" id="agreeTerms" {{ old('terms') ? 'checked' : '' }} value="1">

                                    <label for="agreeTerms">
                                        Ich stimme den <a href="#">Datenschutzbedingungen</a> zu
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-orange btn-block">
                                    {{ __('Registrieren') }}
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class="row my-2">
                        <div class="col-md-12">
                            <p class="mb-0 text-center">
                                <a href="{{ route('login') }}" class="text-center">Ich habe bereits einen Account</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vorname') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('vorname') is-invalid @enderror" name="vorname" value="{{ old('vorname') }}" required autocomplete="name" autofocus>

                                @error('vorname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
