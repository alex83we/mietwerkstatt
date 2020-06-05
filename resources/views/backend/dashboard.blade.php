@extends('backend.layouts.main')

@section('titel', 'Dashboard')

@section('description'){{ html_entity_decode('Hier ist dein persönlicher Bereich wo du Anpassungen am Profil vornehmen kannst, aber hier kannst du auch deine Fahrzeuge bearbeiten.', ENT_QUOTES, 'UTF-8') }}@endsection

@push('css')

@endpush

{{--@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            {{ Breadcrumbs::render('dashboard') }}
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection--}}

@section('content')
    <section class="content">

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $dashboard->fahrzeugcount() }}</h3>

                            <p>Fahrzeuge insgesamt</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-car"></i>
                        </div>
                        <a href="{{ route('backend.verkauf.index') }}" class="small-box-footer">Mehr Infos <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $dashboard->anfragen() }}</h3>

                            <p>Fahrzeuganfragen</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <a href="{{ route('backend.anfrage.show', Auth::user()->id) }}" class="small-box-footer">Mehr Infos <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- Hauptreihe -->
            <div class="row">
                <section class="col-lg-12" connectedSortable>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Deine Letzten 5 Anzeigen</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body shadow">
                            @if(count($dashboard->fahrzeuge()) > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-sm">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">Marke / Modell</th>
                                            <th class="align-middle">Kilometerstand / Leistung</th>
                                            <th class="align-middle">Erstzulassung</th>
                                            <th class="align-middle">Kraftstoff</th>
                                            <th class="align-middle">Preis</th>
                                            <th class="align-middle">Erstellt</th>
                                            <th class="align-middle">Geändert</th>
                                            <th class="align-middle">Aktion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dashboard->fahrzeuge() as $fahrzeuge)
                                            <tr>
                                                <td class="align-middle">{{ $fahrzeuge->id }}</td>
                                                <td class="align-middle">{{ $fahrzeuge->marke.' '.$fahrzeuge->modell }}</td>
                                                <td class="align-middle">{{ number_format($fahrzeuge->km, 0, ',', '.').' km / '.$fahrzeuge->kw.' kW ('.$fahrzeuge->ps.' PS)' }}</td>
                                                <td class="align-middle">{{ $fahrzeuge->ez_monat.'/'.$fahrzeuge->ez }}</td>
                                                <td class="align-middle">{{ $fahrzeuge->kraftstoff }}</td>
                                                <td class="align-middle">@if ($fahrzeuge->preisx === 'Verhandlungsbasis') VB @endif{{ number_format($fahrzeuge->preis, 2, ',', '.').' €' }}</td>
                                                <td class="align-middle">{{ \Carbon\Carbon::parse($fahrzeuge->created_at)->fromNow() }}</td>
                                                <td class="align-middle">@if($fahrzeuge->updated_at != $fahrzeuge->created_at){{ \Carbon\Carbon::parse($fahrzeuge->updated_at)->fromNow() }}@else keine Änderungen @endif</td>
                                                <td class="align-middle text-center"><a href="{{ route('backend.verkauf.edit', $fahrzeuge->id) }}" class="btn btn-orange btn-sm"><i class="fas fa-edit mr-1"></i> Bearbeiten</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h4>Zurzeit bieten sie keine Fahrzeuge auf unserer Plattform an.</h4>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.reihe -->
        </div><!-- /.container-fluid -->

    </section>
@endsection

@push('js')

@endpush
