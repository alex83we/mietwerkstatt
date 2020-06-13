@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

@section('titel')
    {{ 'Bilder bearbeiten '.$verkauf->marke.' '.$verkauf->modell.' Erstzulassung '.$verkauf->ez }}
@endsection

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/css/fileinput.min.css"/>
@endpush

{{--@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fahrzeugbilder</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            {{ Breadcrumbs::render('images', $verkauf) }}
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection--}}

@section('content')
    <section class="content">

        <div class="container-fluid">

            <table class="table table-striped table-inverse table-sm table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Fahrzeug</th>
                    <th>Aktion</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="align-middle text-uppercase font-weight-bold">{{ $verkauf->id }}</td>
                    <td class="align-middle font-weight-bold"><a href="{{ route('verkauf.show', $verkauf->slug )}}"><div class="text-uppercase float-left">{{ $verkauf->marke.' '.$verkauf->modell.' Erstzulassung '.$verkauf->ez }} </div></a> <div class="float-right">Letztes Update {{ \Carbon\Carbon::parse($verkauf->updated_at)->fromNow() }}</div> </td>
                    <td class="align-middle text-uppercase font-weight-bold text-center" style="width: 180px;">
                        <a href="{{ route('backend.verkauf.index') }}" class="btn btn-sm btn-success"> Zurück zur Übersicht</a>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center" colspan="3">
                        <div class="row m-0 text-center">
                            @foreach($verkauf->fahrzeuges_image as $key=>$image)
                                <div class="card box m-1" style="width: 160px;">
                                        @if($image->images == false)
                                        <a href="/images/default.png" target="_blank">
                                            <img src="{{ url('/images/default.png') }}" alt="{{ $verkauf->marke.'-'.$verkauf->modell.'-'.$image->id }}"
                                                 style="height: 150px; width: 150px !important; object-fit: cover; object-position: center;" class="img-fluid m-1">
                                        </a>
                                        @else
                                        <a href="{{ Storage::disk('public')->url('fahrzeuge/'.$image->images) }}" target="_blank">
                                            <img src="{{ Storage::disk('public')->url('fahrzeuge/'.$image->images) }}" alt="{{ $verkauf->marke.'-'.$verkauf->modell.'-'.$image->id }}"
                                             style="height: 150px; width: 150px !important; object-fit: cover; object-position: center;" class="img-fluid m-1">
                                        </a>
                                        @endif

                                    <div class="card-body" style="padding: 0.50rem !important;">
                                        <a href="{{ route('backend.verkauf.image', $image->id) }}" class="btn btn-sm btn-info btn-block mb-1"><i class="fa fa-edit"></i> Ändern </a>

                                        @if($verkauf->images != $image->images)

                                            <form method="post" action="{{ route('backend.verkauf.images.destroy', $image->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn-block mb-1"><i class="fas fa-trash"></i> Löschen</button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="p-2">
                                        @if($verkauf->images != $image->images)
                                            <form action="{{ route('backend.verkauf.previewupdateImages', $image->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="verkauf_id" value="{{ $verkauf->id }}">
                                                <input type="hidden" name="id" value="{{ $image->id }}">
                                                <input type="hidden" name="images" value="{{ $image->images }}">
                                                <button href="submit" class="btn btn-sm btn-secondary"><i class="fas fa-image"></i>&nbsp; Vorschaubild &nbsp;<i class="fa fa-times text-danger"></i></button>
                                            </form>
                                        @else
                                            <div class="font-weight-bold text-center btn btn-sm btn-success"><i class="fas fa-image"></i>&nbsp; Vorschaubild &nbsp;<i class="fa fa-check"></i></div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="align-middle"><div class="text-center my-1 font-weight-bold ">Bilder hinzufügen</div></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form action="{{ route('backend.verkauf.adds') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="verkauf_id" value="{{ $verkauf->id }}">
                            <div class="file-loading">
                                <input id="input-b7" name="images[]" multiple type="file" class="file" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]'>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success mt-2 float-right"><i class="fa fa-images"></i> Bilder hinzufügen</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>

    </section>
@endsection

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/locales/de.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/themes/fas/theme.min.js"></script>
    <script>
        $("#input-b7").fileinput({
            language: "de",
            theme: "fas",
        });
        function deleteImage(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Bist du sicher?',
                text: "Sie können dies nicht rückgängig machen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ja, lösche es!',
                cancelButtonText: 'Nein, abbrechen!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    event.preventDefault();
                    document.getElementById('delete-image-'+id).submit();

                } else if (
                    /* Weitere Informationen zum Umgang mit Entlassungen finden Sie weiter unten */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Abgebrochen',
                        'Ihre imaginäre Datei ist sicher:)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
