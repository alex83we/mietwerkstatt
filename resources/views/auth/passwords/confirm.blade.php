@extends('layouts.auth')

@section('meta')
    <meta name=“robots“ content=“noindex, nofollow“ />
@endsection

@section('titel', 'Password bestätigen ')

@section('content')
    <div class="hold-transition login-page" style="background: none;">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logoWerkstatt.png') }}" style="height: 100px;"></a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Bitte bestätigen Sie Ihr Passwort, bevor Sie fortfahren.</p>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

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
                            <div class="col-12">
                                <button type="submit" class="btn btn-orange btn-block">Passwort bestätigen</button>
                            </div>
                            <!-- /.col -->
                        </div>

                    </form>
                    @if (Route::has('password.request'))
                        <p class="mb-0 text-center">
                            <a href="{{ route('password.request') }}" class="text-center">Haben Sie Ihr Passwort vergessen?</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
