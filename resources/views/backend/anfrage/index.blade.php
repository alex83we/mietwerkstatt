@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

@section('titel', 'Anfragen')

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style type="text/css">
        .link-black:focus, .link-black:hover {
            color: #1f1f1f;
        }
        .link-black {
            color: #000;
        }
    </style>
@endpush

{{--@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Anfragen</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            {{ Breadcrumbs::render('add') }}
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection--}}

@section('content')
    <section class="content">

        <div class="container-fluid">

            <div class="card">
                <div class="card-body table-responsive">
                    @if(count($anfragen) > 0)
                    <table class="table table-sm table-bordered table-striped table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Betreff</th>
                            <th>Eingang</th>
                            <th rowspan="2" class="align-top">Aktion</th>
                        </tr>
                        <tr>
                            {{--                            <th>Datenschutz</th>--}}
                            <th colspan="2">Nachricht</th>
                            <th>Telefon</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="5"></td>
                        </tr>
                        @foreach($anfragen as $key=>$anfrage)
                            <tr>
                                <td>{{ $anfrage->id }}</td>
                                <td>{{ $anfrage->anrede.' '.$anfrage->name }}</td>
                                <td>{{ $anfrage->betreff }}</td>
                                <td>{{ Carbon\Carbon::parse($anfrage->created_at)->fromNow() }}</td>
                                <td rowspan="2" class="text-center align-middle">
                                    <form action="{{ route('backend.anfrage.destroy', $anfrage->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash mr-1"></i> Löschen
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                {{--                                <td>@if($anfrage->datenschutz == true){{ __('Datenschutz akzeptiert') }}@endif</td>--}}
                                <td colspan="2" class="py-2">{!! $anfrage->text !!}</td>
                                <td class="py-2"><a href="tel:{{$anfrage->telefon}}" class="link-black">{{ $anfrage->telefon }}</a></td>
                                @if($anfrage->anrede == 'Herr')
                                    <td class="py-2"><a href="mailto:{!! $anfrage->email.'?subject=Re: '.$anfrage->betreff.'&body=Sehr geehrter '.$anfrage->anrede.' '.$anfrage->name.',%0D%0A%0D%0A%0D%0AIhre Anfrage vom '.\Carbon\Carbon::parse($anfrage->created_at)->format('d.m.Y').':%0D%0A'.$anfrage->text.'%0D%0A%0D%0AMit freundlichen Grüßen%0D%0A%0D%0A'.Auth::user()->vorname.' '.Auth::user()->name!!}" class="link-black">{{ $anfrage->email }}</a></td>
                                @elseif($anfrage->anrede == 'Frau')
                                    <td class="py-2"><a href="mailto:{!! $anfrage->email.'?subject=Re: '.$anfrage->betreff.'&body=Sehr geehrte '.$anfrage->anrede.' '.$anfrage->name.',%0D%0A%0D%0A%0D%0AIhre Anfrage vom '.\Carbon\Carbon::parse($anfrage->created_at)->format('d.m.Y').':%0D%0A'.$anfrage->text.'%0D%0A%0D%0AMit freundlichen Grüßen%0D%0A%0D%0A'.Auth::user()->vorname.' '.Auth::user()->name!!}" class="link-black">{{ $anfrage->email }}</a></td>
                                @else
                                    <td class="py-2"><a href="mailto:{!!$anfrage->email!!}" class="link-black">{{ $anfrage->email }}</a> </td>
                                @endif
                                {{--                                <td class="py-2"></td>--}}
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="card-text text-center font-weight-bold"><h4 class="m-0">Keine Anfragen zu einem Fahrzeug vorhanden.</h4></div>
                    @endif
                </div>
            </div>

        </div>

    </section>
@endsection

@push('js')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
