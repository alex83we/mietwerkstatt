@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection


@section('titel', 'Fahrzeugsuche')

@push('css')
    <style>
        #overlay {
            background: #111111;
            color: white;
            position: fixed;
            height: 100vh;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 99;
            opacity: 0.75;
        }
        @keyframes load {
            0% {
                opacity: 0.08;
                /*font-size: 10px;*/
                /*font-weight: 400;*/
                filter: blur(5px);
                letter-spacing: 3px;
            }
            100% {
                /*opacity: 1;*/
                /*font-size: 12px;*/
                /*font-weight: 600;*/
                /*filter: blur(0);*/
            }
        }
        #loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: auto;
            /*width: 350px;*/
            font-size: 26px;
            font-family: Helvetica, sans-serif, Arial;
            animation: load 1.2s infinite 0s ease-in-out;
            animation-direction: alternate;
            text-shadow: 0 0 1px white;
        }
        .card .card-title {
            font-size: 16px !important;
        }
        label {
            margin-bottom: 0;
        }
        .form-group {
            margin-bottom: 0.5rem;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div id="overlay" style="display: none;">
            <div id="loading"> Loading...</div>
        </div>
        <div class="row mt-4">

            <div class="col-md-12 col-lg-4">
                    @include('partials.search.search')
            </div>


            <div class="col-md-12 col-lg-8">
                {{--<div id="overlay" class="align-items-center" style="display: none !important;" role="status">
                    <strong>Loading...</strong>
                    <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                </div>--}}
                <div id="searchergebniss">
                    <div class="row">
                        <div class="col-md-12 col-lg-12" style="font-size: 16px; font-weight: bold; color: #ff4600;">
                            {{ $fahrzeuges->count(). ' Fahrzeuge entsprechen Ihren Suchkriterien' }}
                        </div>
                        <div class="col-md-12">
                            <div style="border-bottom: 1px solid; margin-top: 0.5rem; margin-bottom: 0.5rem; color: #3E3F3A !important;"></div>
                        </div>
                        @foreach($fahrzeuges as $item)
                            @foreach($item->fahrzeuges_ausstattung as $ausstattung)
                                <div class="col-12 col-md-6 col-xl-4 mt-3 mb-3">
                                    <div class="card shadow">
                                        <div class="fahrzeug-section-image">
                                            @if ($item->images == false)
                                                <a href="{{ route('verkauf.show', $item->slug) }}"><img src="{{ url('images/default.png') }}"
                                                     class="card-img-top p-3 img-fluid active mx-auto d-block" alt=""
                                                     style="width: 480px; height: 320px; object-fit: cover; object-position: center;">
                                                </a>
                                            @else
                                                <a href="{{ route('verkauf.show', $item->slug) }}"><img src="{{ Storage::disk('public')->url('fahrzeuge/'.$item->images) }}"
                                                 class="card-img-top p-3 img-fluid active mx-auto d-block" alt=""
                                                 style="width: 480px; height: 320px; object-fit: cover; object-position: center;">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="card-body pt-0">
                                            <span class="preis">
                                                <span class="preis-value">@if ($item->preisx == 'Festpreis'){{ number_format($item->preis, 2, ',', '.'). ' €' }}@else {{ 'VB '.number_format($item->preis, 2, ',', '.'). ' €' }} @endif</span>
                                            </span>
                                            @if (\Carbon\Carbon::parse($item->created_at)->isoFormat('DD.MM.YYYY') >= \Carbon\Carbon::parse($item->created_at)->addDays(7)->isoFormat('DD.MM.YYYY'))
                                            <span class="new">
                                                <span class="new-value">Neu</span>
                                            </span>
                                            @endif
                                            <h5 class="card-title">
                                                @if ($item->marke == true)
                                                    {{ $item->marke.' '.$item->modell.','  }}
                                                @endif
                                                @if ($item->allrad == true)
                                                    {{ $item->allrad.',' }}
                                                @endif
                                                @if ($item->getriebe == true)
                                                    {{ $item->getriebe.',' }}
                                                @endif
                                                @if ($item->hu == true)
                                                    {{ 'HU.'.$item->hu.',' }}
                                                @endif
                                                @if ($item->kraftstoff == true)
                                                    {{ $item->kraftstoff }}
                                                @endif
                                            </h5>
                                            <div class="detail">
                                                <div class="row">
                                                    <div class="col">
                                                        Erstzulassung:
                                                    </div>
                                                    <div class="col">
                                                        {{ $item->ez_monat.'/'.$item->ez }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        Kilometerstand:
                                                    </div>
                                                    <div class="col">
                                                        {{ number_format($item->km, '3', '.', ',').' km' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        Hubraum:
                                                    </div>
                                                    <div class="col">
                                                        {{ number_format($item->ccm, '0', ',', '.').' ccm' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        Leistung:
                                                    </div>
                                                    <div class="col">
                                                        {{ $item->kw.' kW ( '.$item->ps. ' PS)' }}
                                                    </div>
                                                </div>
                                                @if($item->getriebe == true)
                                                <div class="row">
                                                    <div class="col">
                                                        Getriebe:
                                                    </div>
                                                    <div class="col">
                                                        {{ $item->getriebe }}
                                                    </div>
                                                </div>
                                                @endif
                                                @if($ausstattung->aussenfarbe == true)
                                                <div class="row">
                                                    <div class="col">
                                                        Lakierung:
                                                    </div>
                                                    <div class="col">
                                                        {{ $ausstattung->aussenfarbe }}
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col">
                                                        Kraftstoff:
                                                    </div>
                                                    <div class="col">
                                                        {{ $item->kraftstoff }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button_detail">
                                            <a href="{{ route('verkauf.show', $item->slug) }}">
                                                <div class="button_unten">
                                                    Fahrzeug ansehen
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#marke').on('change', function () {
                var selected = $(this).find(":selected").attr('value');
                $.ajax({
                    url:  'suche/' + selected + '/marke',
                    type: 'GET',
                    dataType: 'json',
                }).done(function (data) {
                    $('#selectModell').removeAttr('disabled');
                    var select = $('#selectModell');
                    select.empty();
                    select.append('<option value="">Bitte Modell wählen</option>');
                    $.each(data, function (key, value) {
                        select.append('<option value="' + value.modell + '">' + value.modell + '</option>')
                    });
                });
                console.log("success");
            });
        });

        $('body').change( function () {
            $('#overlay').fadeIn().delay(1000).fadeOut();
        });

        $('body').on('change', function () {
            // $value = $(this).val();
            $kategorie = $('#kategorie').val();
            $modell = $('#selectModell').val();
            $marke = $('#marke').val();
            $zustand = $('#zustand').val();
            $preis_min = $('#preis_min').val();
            $preis_max = $('#preis_max').val();
            $km_min = $('#km_min').val();
            $km_max = $('#km_max').val();
            $getriebe = $('#getriebe').val();
            $kraftstoff = $('#kraftstoff').val();
            $erstzulassung_min = $('#erstzulassung_min').val();
            $erstzulassung_max = $('#erstzulassung_max').val();
            $leistung_min = $('#leistung_min').val();
            $leistung_max = $('#leistung_max').val();
            $lackierung = $('#lackierung').val();
            $polsterung = $('#polsterung').val();
            // $sorting = $('#sorting').val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to('suche/search')}}',
                data: {
                    'kategorie':$kategorie,
                    'marke':$marke,
                    'modell':$modell,
                    'zustand':$zustand,
                    'preis_min':$preis_min,
                    'preis_max':$preis_max,
                    'km_min':$km_min,
                    'km_max':$km_max,
                    'getriebe':$getriebe,
                    'kraftstoff':$kraftstoff,
                    'erstzulassung_min':$erstzulassung_min,
                    'erstzulassung_max':$erstzulassung_max,
                    'leistung_min':$leistung_min,
                    'leistung_max':$leistung_max,
                    'lackierung':$lackierung,
                    'polsterung':$polsterung,
                    // 'sorting':$sorting
                },
                success: function (data) {
                    $('#searchergebniss').html(data);
                    console.log(data);
                }
            });
        });

        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endpush
