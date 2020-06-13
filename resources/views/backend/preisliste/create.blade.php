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
                    <form action="{{ route('backend.preisliste.store') }}" method="POST">
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
                            <div class="form-group col-6">
                                <label for="inputPreis">Preis</label>
                                <input type="text" class="form-control" name="preis" id="inputPreis" placeholder="Preis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
