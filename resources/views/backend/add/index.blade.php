@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

@section('titel', 'Variablen')

@push('css')

@endpush

{{--@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fahrzeugmarken</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            {{ Breadcrumbs::render('add') }}
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

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body p-2">

                                            <!-- Marke -->
                                            <div class="col-md-12">
                                                <form action="{{ route('backend.add.storeMarke') }}" method="post">
                                                    @csrf
                                                    <label for="inputMarke">Marke</label>
                                                    <div class="input-group">
                                                        <input type="text" name="marke" id="inputMarke" class="form-control form-control-sm" placeholder="Hersteller anlegen">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-orange btn-sm"><i class="fas fa-save"></i>&nbsp; Speichern</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                        <div class="card-body p-2">

                                            <!-- Modell -->
                                            <div class="col-md-12">
                                                <form action="{{ route('backend.add.storeModell') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="inputModell">Modell</label>
                                                        <select class="form-control form-control-sm" name="marke_id">
                                                            @foreach($marke as $markes)
                                                                <option value="{{ $markes->id }}">{{ $markes->marke}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" name="modell" id="inputModell" class="form-control form-control-sm" placeholder="Modell anlegen">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-orange btn-sm"><i class="fas fa-save"></i>&nbsp; Speichern</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover table-inverse table-sm">
                                                <thead class="thead-inverse">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Marke</th>
                                                </tr>
                                                </thead>
                                                @foreach($marke as $markes)
                                                    <tbody>
                                                    <tr data-toggle="collapse" data-target="#modell-{{ $markes->id }}" class="clickable collapse-row collapsed">
                                                        <td class="align-middle">{{ $markes->id }}</td>
                                                        <td class="align-middle">{{ $markes->marke }}</td>
                                                    </tr>
                                                    @foreach($markes->items_modell as $modell)
                                                        <tr class="bg-dark">
                                                            <td class="collapse" id="modell-{{ $markes->id }}">{{ $modell->id }}</td>
                                                            <td class="collapse" id="modell-{{ $markes->id }}">{{ $modell->modell }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
