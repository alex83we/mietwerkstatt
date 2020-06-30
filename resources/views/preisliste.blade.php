@extends('layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('titel', 'Preisliste')

@push('css')
    <style>
        page {
            background: white;
            display: block;
            margin: 0 auto;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            padding: 0.5cm;
        }
        page[size="A4"] {
            width: 21cm;
            height: 100%;
        }
        page[size="A3"] {
            width: 29.7cm;
            height: 42cm;
        }
    </style>
@endpush

@section('content')
    <div style="background-color: #d3d3d3;">
        <div class="container">
            <div class="row">

                <div class="col-12 mb-3" style="padding-top: 20px;">
                    <page size="A4">
                        <div class="w-50 mx-auto">
                            <img src="{{ asset('images/logoWerkstatt.png') }}" alt="{{ url()->full() }}">
                        </div>
                        <div class="row my-3">
                            <div class="col-3"></div>
                            <div class="col-6 font-weight-bold text-center">
                                <h1>Preisliste</h1>
                            </div>
                            <div class="col-3"></div>
                        </div>
                        @if($ohneBühne == true)
                        <div class="col-12 text-center mb-2"><h3>Arbeitsplatz ohne Hebebühne</h3></div>
                            @foreach($ohneBühne as $item)
                            <div class="row my-1">
                                <div class="col-9 font-weight-bold">
                                    {{ $item->title }}
                                    @if ($item->zusatztitle)
                                        <br>{{ $item->zusatztitle }}
                                    @endif
                                </div>
                                <div class="col-3 text-right font-weight-bold">
                                        @if($item->preis != 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                        @if($item->preis != 0.00)
                                            @if(date('2021.01.01') <= date('Y.m.d'))
                                                    {{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}
                                            @endif
                                            @if(date('2020.06.31') < date('Y.m.d'))
                                                    <del>{{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}</del>
                                                {{ ' / '.number_format(round($item->preis * $prozent16, 2), 2, ',', '.').' €' }}
                                            @endif
                                        @endif
                                        @if($item->preis == 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                    </div>
                            </div>
                            @endforeach
                        @endif
                        @if($mitBühne == true)
                        <div class="col-12 text-center my-2"><h3>Arbeitsplatz mit Hebebühne</h3></div>
                            @foreach($mitBühne as $item)
                                <div class="row my-1">
                                    <div class="col-9 font-weight-bold">
                                        {{ $item->title }}
                                        @if ($item->zusatztitle)
                                            <br>{{ $item->zusatztitle }}
                                        @endif
                                    </div>
                                    <div class="col-3 text-right font-weight-bold">
                                        @if($item->preis != 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                        @if($item->preis != 0.00)

                                            @if(date('2021.01.01') <= date('Y.m.d'))
                                                    {{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}
                                            @endif
                                            @if(date('2020.06.31') < date('Y.m.d'))
                                                    <del>{{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}</del>
                                                {{ ' / '.number_format(round($item->preis * $prozent16, 2), 2, ',', '.').' €' }}
                                            @endif
                                        @endif
                                        @if($item->preis == 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if($fluessigkeiten == true)
                        <div class="col-12 text-center my-2"><h3>Flüssigkeiten & Schmierstoffe</h3></div>
                            @foreach($fluessigkeiten as $item)
                                <div class="row my-1">
                                    <div class="col-9 font-weight-bold">
                                        {{ $item->title }}
                                        @if ($item->zusatztitle)
                                            <br>{{ $item->zusatztitle }}
                                        @endif
                                    </div>
                                    <div class="col-3 text-right font-weight-bold">
                                        @if($item->preis != 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                        @if($item->preis != 0.00)

                                            @if(date('2021.01.01') <= date('Y.m.d'))
                                                    {{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}
                                            @endif
                                            @if(date('2020.06.31') < date('Y.m.d'))
                                                    <del>{{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}</del>
                                                {{ ' / '.number_format(round($item->preis * $prozent16, 2), 2, ',', '.').' €' }}
                                            @endif
                                        @endif
                                        @if($item->preis == 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if($werkzeug == true)
                        <div class="col-12 text-center my-2"><h3>Werkzeuge & Werkzeugzubehör</h3></div>
                            @foreach($werkzeug as $item)
                                <div class="row my-1">
                                    <div class="col-9 font-weight-bold">
                                        {{ $item->title }}
                                        @if ($item->zusatztitle)
                                            <br>{{ $item->zusatztitle }}
                                        @endif
                                    </div>
                                    <div class="col-3 text-right font-weight-bold">
                                        @if($item->preis != 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                        @if($item->preis != 0.00)

                                            @if(date('2021.01.01') <= date('Y.m.d'))
                                                    {{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}
                                            @endif
                                            @if(date('2020.06.31') < date('Y.m.d'))
                                                    <del>{{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}</del>
                                                {{ ' / '.number_format(round($item->preis * $prozent16, 2), 2, ',', '.').' €' }}
                                            @endif
                                        @endif
                                        @if($item->preis == 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if($reifenservice == true)
                        <div class="col-12 text-center my-2"><h3>Reifenservice</h3></div>
                            @foreach($reifenservice as $item)
                                <div class="row my-1">
                                    <div class="col-9 font-weight-bold">
                                        {{ $item->title }}
                                        @if ($item->zusatztitle)
                                            <br>{{ $item->zusatztitle }}
                                        @endif
                                    </div>
                                    <div class="col-3 text-right font-weight-bold">
                                        @if($item->preis != 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                        @if($item->preis != 0.00)

                                            @if(date('2021.01.01') <= date('Y.m.d'))
                                                    {{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}
                                            @endif
                                            @if(date('2020.06.31') < date('Y.m.d'))
                                                    <del>{{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}</del>
                                                {{ ' / '.number_format(round($item->preis * $prozent16, 2), 2, ',', '.').' €' }}
                                            @endif
                                        @endif
                                        @if($item->preis == 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if($entsorgung == true)
                        <div class="col-12 text-center my-2"><h3>Entsorgung</h3></div>
                            @foreach($entsorgung as $item)
                                <div class="row my-1">
                                    <div class="col-9 font-weight-bold">
                                        {{ $item->title }}
                                        @if ($item->zusatztitle)
                                            <br>{{ $item->zusatztitle }}
                                        @endif
                                    </div>
                                    <div class="col-3 text-right font-weight-bold">
                                        @if($item->preis != 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                        @if($item->preis != 0.00)

                                            @if(date('2021.01.01') <= date('Y.m.d'))
                                                    {{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}
                                            @endif
                                            @if(date('2020.06.31') < date('Y.m.d'))
                                                    <del>{{ number_format(round($item->preis * $prozent19, 2), 2, ',', '.').' €' }}</del>
                                                {{ ' / '.number_format(round($item->preis * $prozent16, 2), 2, ',', '.').' €' }}
                                            @endif
                                        @endif
                                        @if($item->preis == 0.00)
                                            {{ $item->preiszusatz }}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="col-12 text-center my-2 font-weight-bold">
                            <div style="padding: 50px 0 0;">
                                <p>* DIE ABRECHNUNG ERFOLGT NACH DER ERSTEN STUNDE IM 15 MIN. TAKT
                                <br><br>
                                    <b class="text-danger">ACHTUNG:</b> Außerhalb unserer Öffnungszeiten erheben wir<br>einen AUFSCHLAG nach Vereinbarung.</p>
                            </div>
                        </div>
                    </page>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush
