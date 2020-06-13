@extends('backend.layouts.main')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="none" />
@endsection

@section('titel', 'User Übersicht ')

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">Bearbeite Benutzer {{ $user->vorname.' '.$user->name }}</div>

                        <div class="card-body">
                            <form action="{{ route('backend.users.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="roles" class="col-md-2 col-form-label text-md-right">Rolle</label>

                                    <div class="col-md-6">
                                        @foreach($roles as $role)
                                            <div class="custom-control custom-checkbox mx-1">
                                                <input type="checkbox" class="custom-control-input" name="roles[]"
                                                       id="{{ $role->name }}" value="{{ $role->id }}"
                                                       @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                       for="{{ $role->name }}">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-orange mt-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
