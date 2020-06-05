@extends('layouts.auth')

@section('meta')
    <meta name=“robots“ content=“noindex, nofollow“ />
@endsection

@section('titel', 'Password zurücksetzen ')

@section('content')
    <div class="hold-transition login-page" style="background: none;">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logoWerkstatt.png') }}" style="height: 100px;"></a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sie sind nur einen Schritt von Ihrem neuen Passwort entfernt. Stellen Sie Ihr Passwort jetzt wieder her.</p>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control border-right-0 bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Adresse') }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-left-0 bg-transparent">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control border-right-0 bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" aria-describedby="passwordHelpBlock" placeholder="{{ __('Passwort') }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-left-0 bg-transparent">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            {{--<p id="passwordHelpBlock" class="form-text text-muted">
                                Ihr Passwort muss länger als 8 Zeichen sein und sollte mindestens 1 Großbuchstaben, 1 Kleinbuchstaben, 1 Ziffer und 1 Sonderzeichen enthalten.
                            </p>--}}

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" class="form-control border-right-0 bg-transparent" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Passwort wiederholen') }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-left-0 bg-transparent">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-orange btn-block">Passwort ändern</button>
                            </div>
                            <!-- /.col -->
                        </div>

                    </form>
                    <p class="mb-0 text-center">
                        <a href="{{ route('login') }}" class="text-center">Ich habe bereits einen Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
