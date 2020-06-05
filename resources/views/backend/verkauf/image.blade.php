@extends('backend.layouts.main')

@section('titel')
    {{ 'Bilder bearbeiten' }}
@endsection

@push('css')

@endpush

{{--@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bild ändern</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            {{ Breadcrumbs::render('image', $images) }}
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection--}}

@section('content')
    <section class="content">

        <div class="container-fluid">
            <form action="{{ route('backend.verkauf.updateImages', $images->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="verkauf_id" value="{{ $images->verkauf_id }}">
                <input type="hidden" name="vorschau" value="{{ $images->images }}">
                <input type="hidden" name="imagesvorschau" value="@foreach($vorschau as $imagevorschau){{ $imagevorschau->images }}@endforeach">
                <img src="{{ Storage::disk('public')->url('fahrzeuge/').$images->images }}" style="height: 250px; width: 250px; object-fit: cover; object-position: center;" class="img-thumbnail img-fluid">
                <div class="form-group">
                    <label for="image"></label>
                    <input type="file" class="form-control-file" id="image" name="images">
                </div>
                <button type="submit" class="btn btn-success">Abschicken</button>
                <a href="{{ route('backend.verkauf.index') }}" class="btn btn-info">Zurück</a>
            </form>
        </div>

    </section>
@endsection

@push('js')

@endpush
