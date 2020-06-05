@extends('layouts.main')

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Cookie ')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="container-content border-0">
                    <div class="container-inner" id="impressum">
                        <script id="CookieDeclaration" src="https://consent.cookiebot.com/128725df-59ff-4052-8e9a-14b16a997f90/cd.js" type="text/javascript" async></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
