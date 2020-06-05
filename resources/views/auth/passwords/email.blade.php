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
                    <p class="login-box-msg">Du hast dein Passwort vergessen? Hier können Sie ganz einfach ein neues Passwort abrufen.</p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control border-right-0 bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Adresse') }}">
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

                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-orange btn-block">Fordere ein neues Passwort an</button>
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
