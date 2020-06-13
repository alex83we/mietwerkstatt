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
                        <div class="card-body">
                            <button type="button" data-toggle="modal" data-target="#preislisteCreate" class="btn btn-orange btn-block"><i class="fas fa-plus mr-1"></i> Erstellen</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Bezeichnung</th>
                                        <th>Kategorie</th>
                                        <th>Preis</th>
                                        <th>Letzte Änderung</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($preisliste as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->kategorie }}</td>
                                        <td class="text-right">
                                            @if($item->preis != 0.00)
                                                {{ $item->preiszusatz }}
                                            @endif
                                            @if($item->preis != 0.00)
                                                {{ number_format($item->preis, 2, ',', '.').' €' }}
                                            @endif
                                            @if($item->preis == 0.00)
                                                {{ $item->preiszusatz }}
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('DD.MM.YYYY HH:mm:ss') }}</td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#preislisteUpdate-{{$item->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></button>
                                            @if (Auth::user()->hasRole('admin'))
                                                <form action="{{ route('backend.preisliste.destroy', $item->id) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="preislisteCreate" tabindex="-1" role="dialog" aria-labelledby="preislisteCreateLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('backend.preisliste.store') }}" method="POST">
                        <div class="modal-body">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="selectKategorie">Kategorie</label>
                                        <select class="form-control" name="kategorie" id="selectKategorie">
                                            <option>Arbeitsplatz ohne Hebebühne</option>
                                            <option>Arbeitsplatz mit Hebebühne</option>
                                            <option>Flüssigkeiten & Schmierstoffe</option>
                                            <option>Werkzeuge und Werkzeugzubehör</option>
                                            <option>Reifenservice</option>
                                            <option>Entsorgung</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputBezeichnung">Bezeichnung</label>
                                        <input type="text" class="form-control" name="title" id="inputBezeichnung" placeholder="Bezeichnung">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="inputZusatztitel">Zusatztitel</label>
                                        <input type="text" class="form-control" name="zusatztitel" id="inputZusatztitel" placeholder="Zusatztitel">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="inputPreis">Preis</label>
                                        <input type="text" class="form-control" name="preis" id="inputPreis" placeholder="Preis">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="inputPreiszusatz">Preiszusatz</label>
                                        <input type="text" class="form-control" name="preiszusatz" id="inputPreiszusatz" placeholder="Preiszusatz">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Speichern</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            @foreach($preisliste as $item)
            <div class="modal fade" id="preislisteUpdate-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="preislisteUpdateLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('backend.preisliste.update', $item->id) }}" method="POST">
                        <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="selectKategorie">Kategorie</label>
                                        <select class="form-control" name="kategorie" id="selectKategorie">
                                            <option value="{{ $item->kategorie }}">{{ $item->kategorie }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputBezeichnung">Bezeichnung</label>
                                        <input type="text" class="form-control" name="title" id="inputBezeichnung" value="{{ $item->title }}" placeholder="Bezeichnung">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="inputZusatztitel">Zusatztitel</label>
                                        <input type="text" class="form-control" name="zusatztitel" id="inputZusatztitel" value="{{ $item->zusatztitle }}" placeholder="Zusatztitel">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="inputPreis">Preis</label>
                                        <input type="text" class="form-control" name="preis" id="inputPreis" value="{{ $item->preis }}" placeholder="Preis">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="inputPreiszusatz">Preiszusatz</label>
                                        <input type="text" class="form-control" name="preiszusatz" id="inputPreiszusatz" value="{{ $item->preiszusatz }}" placeholder="Preiszusatz">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Speichern</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection

@push('js')

@endpush
