@extends('layouts.auth')

@section('meta')
    <meta name=“robots“ content=“noindex, nofollow“ />
@endsection

@section('content')
    <div class="hold-transition login-page" style="background: none; height: 84vh;">
        <div class="register-box">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">{{ __('Bestätige deine Email-Adresse') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Ein neuer Bestätigungslink wurde an Ihre E-Mail-Adresse gesendet.') }}
                                </div>
                            @endif

                            {{ __('Bevor Sie fortfahren, überprüfen Sie bitte Ihre E-Mails auf einen Bestätigungslink.') }}
                            {{ __('Wenn Sie die E-Mail nicht erhalten haben') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klicken Sie hier, um einen anderen anzufordern') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
