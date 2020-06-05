@extends('layouts.main')

@section('meta')
    <meta name=“robots“ content=“noindex, nofollow“ />
@endsection

@section('titel', 'Passwort ändern')

@section('content')
    <div class="container">
        <div class="row my-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profil.change-password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Aktuelles Passwort</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Neues Passwort</label>

                            <div class="col-md-10">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Passwort bestätigen</label>

                            <div class="col-md-10">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-orange">
                                    Neues Passwort speichern
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
