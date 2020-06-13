@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

@section('titel', 'Fahrzeug Übersicht ')

@push('css')

@endpush

{{--@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ihre Fahrzeug Übersicht</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            {{ Breadcrumbs::render('verkauf') }}
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection--}}

@section('content')
    <section class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body table-responsive">
                            @if(count($verkauf) > 0)
                            <div class="card-text text-center font-weight-bold mb-3"><h4 class="m-0">Aktive Fahrzeuge</h4></div>
                            <table class="table table-bordered table-striped table-hover table-sm">
                                <thead class="bg-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Bild</th>
                                    <th>Marke / Modell</th>
                                    <th>Kilometerstand / Leistung</th>
                                    <th>Erstzulassung</th>
                                    <th>Kraftstoff</th>
                                    <th>Preis</th>
                                    <th>Erstellt</th>
                                    <th>Geändert</th>
                                    <th>Aktion</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($verkauf as $key=>$item)
                                    @if($item->aktiv == true)
                                    <tr>
                                        <td class="align-middle">{{ $item->id }}</td>
                                        <td class="align-middle text-center">
                                            @if($item->images == false)
                                                <img src="{{ url('/images/default.png') }}"
                                                     alt="{{ $item->marke.'-'.$item->modell.'-'.$item->id }}"
                                                     style="height: 50px; width: 50px !important; object-fit: cover; object-position: center;"
                                                     class="img-fluid m-1">
                                            @else
                                                <img
                                                    src="{{ Storage::disk('public')->url('fahrzeuge/'.$item->images) }}"
                                                    alt="{{ $item->marke.'-'.$item->modell.'-'.$item->id }}"
                                                    style="height: 50px; width: 50px !important; object-fit: cover; object-position: center;"
                                                    class="img-fluid m-1">
                                            @endif
                                        </td>
                                        <td class="align-middle text-left"><a href="{{ route('verkauf.show', $item->slug )}}">{{ $item->marke.' '.$item->modell }}</a></td>
                                        <td class="align-middle text-left">{{ number_format($item->km, 3, '.', ',').' / '.$item->kw.' kW ('.$item->ps.' PS)' }}</td>
                                        <td class="align-middle text-center">{{ $item->ez }}</td>
                                        <td class="align-middle text-center">{{ $item->kraftstoff }}</td>
                                        <td class="align-middle text-right">@if ($item->preisx === 'Verhandlungsbasis') VB @endif{{ number_format($item->preis, 2, ',', '.').' €' }}</td>
                                        <td class="align-middle text-right">{{ \Carbon\Carbon::parse($item->created_at)->fromNow() }}</td>
                                        <td class="align-middle text-right">@if($item->updated_at != $item->created_at){{ \Carbon\Carbon::parse($item->updated_at)->fromNow() }}@else keine Änderungen @endif</td>
                                        <td class="align-middle text-right" style="width: 200px">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('backend.verkauf.edit', $item->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('backend.verkauf.images', $item->id) }}" class="btn btn-sm btn-success"><i class="fas fa-images"></i></a>
                                                <a href="{{ route('pdf.pdf', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-tag"></i></a>
                                                <a href="{{ route('pdf.kaufvertrag.index', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-file-signature"></i></a>
                                                @if($item->aktiv == true)
                                                    <form action="{{ route('backend.verkauf.aktivupdate', $item->id) }}" method="post" style="display: inline-block;" >
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="aktiv" value="0">
                                                        <button type="submit" class="btn btn-secondary btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;">Verkauft?</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('backend.verkauf.aktivupdate', $item->id) }}" method="post" style="display: inline-block;" >
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="aktiv" value="1">
                                                        <button type="submit" class="btn btn-info btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;">Verkauft</button>
                                                    </form>
                                                @endif
                                            </div>
                                            {{--                                <button type="submit" class="btn btn-sm btn-danger mx-1" onclick="deleteFahrzeuge({{ $item->id }})"><i class="fas fa-trash"></i></button>--}}

                                            {{--                                <form id="delete-fahrzeuge-{{ $item->id }}" action="{{ route('admin.verkauf.softdelete', $item->id) }}" method="post" style="display: none;">--}}
                                            {{--                                    @csrf--}}
                                            {{--                                    @method('DELETE')--}}
                                            {{--                                </form>--}}
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td colspan="10" class="text-center"><h4 class="m-2">Verkaufte Fahrzeuge</h4></td>
                                </tr>
                                @if($item->aktiv == false)
                                @foreach($verkauf as $key=>$item)
                                    @if($item->aktiv == false)
                                    <tr style="background-color: #90ee90;">
                                        <td class="align-middle">{{ $item->id }}</td>
                                        <td class="align-middle text-center">
                                            @if($item->images == false)
                                                <img src="{{ url('/images/default.png') }}"
                                                     alt="{{ $item->marke.'-'.$item->modell.'-'.$item->id }}"
                                                     style="height: 50px; width: 50px !important; object-fit: cover; object-position: center;"
                                                     class="img-fluid m-1">
                                            @else
                                                <img
                                                    src="{{ Storage::disk('public')->url('fahrzeuge/'.$item->images) }}"
                                                    alt="{{ $item->marke.'-'.$item->modell.'-'.$item->id }}"
                                                    style="height: 50px; width: 50px !important; object-fit: cover; object-position: center;"
                                                    class="img-fluid m-1">
                                            @endif
                                        </td>
                                        <td class="align-middle text-left">{{ $item->marke.' '.$item->modell }}</td>
                                        <td class="align-middle text-left">{{ number_format($item->km, 3, '.', ',').' / '.$item->kw.' kW ('.$item->ps.' PS)' }}</td>
                                        <td class="align-middle text-center">{{ $item->ez }}</td>
                                        <td class="align-middle text-center">{{ $item->kraftstoff }}</td>
                                        <td class="align-middle text-right">@if ($item->preisx === 'Verhandlungsbasis') VB @endif{{ number_format($item->preis, 2, ',', '.').' €' }}</td>
                                        <td class="align-middle text-right">{{ \Carbon\Carbon::parse($item->created_at)->fromNow() }}</td>
                                        <td class="align-middle text-right">@if($item->updated_at != $item->created_at){{ \Carbon\Carbon::parse($item->updated_at)->fromNow() }}@else keine Änderungen @endif</td>
                                        <td class="align-middle text-right" style="width: 200px;">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('pdf.pdf', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-tag"></i></a>
                                                <a href="{{ route('pdf.kaufvertrag.index', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-file-signature"></i></a>
                                                <form action="{{ route('backend.verkauf.aktivupdate', $item->id) }}" method="post" style="display: inline-block;" >
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="aktiv" value="1">
                                                    @if($item->aktiv == 1)
                                                        <button type="submit" class="btn btn-warning btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;">Verkauft?</button>
                                                    @else
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;">Aktiv?</button>
                                                    @endif
                                                </form>
                                                @if (Auth::user()->hasRole('admin'))
                                                    <form action="{{ route('backend.verkauf.destroy', $item->id) }}" method="post" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                @else
                                    <tr>
                                        <td class="align-middle" colspan="10">
                                            <h3 class="text-center">Es wurden bisher keine Fahrzeuge Verkauft!</h3>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="card-text float-right my-2">Legende: <i class="fas fa-edit"></i> = Fahrzeug bearbeiten, <i class="fas fa-images"></i> Bilder ändern/bearbeiten/löschen, <i class="btn btn-secondary btn-sm">Verkauft?</i> = Aktive Anzeige, <i class="btn btn-danger btn-sm">Aktiv?</i> = Fahrzeug verkauft oder Deaktiviert  </div>
                            @else
                                <div class="card-text text-center font-weight-bold"><h4 class="m-0">Aktuell stehen keine Fahrzeuge zum Verkauf.</h4></div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
@endsection

@push('js')

@endpush
