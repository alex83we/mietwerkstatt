@extends('layouts.auth')

@section('meta')
    <meta name=“robots“ content=“noindex, nofollow“ />
@endsection

@section('titel', 'Login ')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('content')
    <div class="hold-transition login-page" style="background: none;">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logoWerkstatt.png') }}" style="height: 100px;"></a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Melden Sie sich an, um Ihre Sitzung zu starten</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input id="email" type="text" class="form-control border-right-0 bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail Adresse') }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-left-0 bg-transparent">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            @error ('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control border-right-0 bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Passwort') }}">
                            <div class="input-group-append">
                                <div class="input-group-text border-left-0 bg-transparent">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">
                                <div class="icheck-orange">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-orange btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                    </form>

                    <p class="mb-1 text-center">
                        <a href="{{ route('password.request') }}">Ich habe mein Passwort vergessen?</a>
                    </p>
                    {{--<p class="mb-0 text-center">
                        <a href="{{ route('register') }}" class="text-center">Registrieren sie sich!</a>
                    </p>--}}
                    <p class="mb-0 text-center">
                        <a href="{{ route('verkauf.index') }}" class="text-center">Doch nicht anmelden und zurück zur Startseite!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
