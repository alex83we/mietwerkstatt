@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

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
                <div class="col-lg-12">
                    @if(count($pdf) > 0)
                    <table class="table table-striped table-bordered table-hover table-sm w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fahrzeug</th>
                            <th>Verkauft am</th>
                            <th>PDF Datei</th>
                        </tr>
                        </thead>
                        @foreach($pdf as $pdffile)
                            <tbody>
                            <tr>
                                <td>{{ $pdffile->id }}</td>
                                <td>{{ $pdffile->anzeigetext }}</td>
                                <td>
                                    @if($pdffile->create == $pdffile->update)
                                        {{ $pdffile->create }}
                                    @else
                                        {{ $pdffile->update }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ asset('storage/kaufvertrag/'.$pdffile->path) }}" target="_blank"><i
                                            class="fa fa-file-pdf"></i> Kaufvertrag ansehen</a>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                    @else
                        <div class="text-center">Keine Kaufverträge vorhanden.</div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection

@push('js')

@endpush
