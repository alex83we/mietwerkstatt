@extends('layouts.main')

@section('meta')
    <meta name=“robots“ content=“noindex, nofollow“ />
@endsection

@section('titel', 'Profil')

@section('content')
    <div class="container">
        <div class="row my-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="e-profile">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                                <div class="mx-auto" style="width: 140px;">
                                    <div class="d-flex justify-content-center align-items-center"
                                         style="height: 140px;">
                                        @if($profil->images == false)
                                            <img src="{{ asset('images/defaultProfil.png') }}"
                                                 alt="User Profilbild {{ $profil->vorname.' '.$profil->name }}"
                                                 style="background-color: #fff; width: 140px; height: 140px; border-radius: 50%;">
                                        @else
                                            <img
                                                src="{{ Storage::disk('public')->url('profil/'.$profil->id.'/'.$profil->images) }}"
                                                alt="User Profilbild {{ $profil->vorname.' '.$profil->name }}"
                                                style="width: 140px; height: 140px; border-radius: 50%;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $profil->vorname.' '.$profil->name }}</h4>
                                    <p class="mb-0">{{ $profil->username }}</p>
                                    <div class="text-muted"><small>
                                            @if($profil->last_login_at == null)
                                                Der Nutzer war noch nicht eingeloggt!
                                            @else
                                                Zuletzt
                                                gesehen {{ \Carbon\Carbon::parse($profil->last_login_at)->fromNow() }}
                                            @endif</small></div>
                                    @if($profil->id == Auth::user()->id)
                                        <div class="mt-2">
                                            <button class="btn btn-sm btn-orange" type="button" data-toggle="modal"
                                                    data-target="#ProfilBild">
                                                <i class="fa fa-fw fa-camera"></i>
                                                <span>Foto ändern</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center text-sm-right">
                                    <span class="badge badge-secondary">{{ $role }}</span>
                                    <div class="text-muted"><small>Beigetreten
                                            am {{ \Carbon\Carbon::parse($profil->created_at)->isoFormat('DD.MMM.YYYY') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->id == $profil->id)
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#profil" class="active nav-link"
                                                        data-toggle="tab">Profil</a></li>
                                <li class="nav-item"><a href="#settings" class="nav-link" data-toggle="tab">Settings</a>
                                </li>
                                @can('manage-users')
                                    <li class="nav-item"><a href="#rollen" class="nav-link" data-toggle="tab">Rollenverwalten</a>
                                    </li>
                                @endcan
                            </ul>
                        @else
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#profil" class="active nav-link"
                                                        data-toggle="tab">Profil</a></li>
                                @can('manage-users')
                                    <li class="nav-item"><a href="#rollen" class="nav-link" data-toggle="tab">Rollenverwalten</a>
                                    </li>
                                @endcan
                            </ul>
                        @endif
                        <div class="tab-content pr-0 pb-0 pl-0 pt-3">
                            {{-- Profil --}}
                            <div class="tab-pane p-0 active" id="profil">



                            </div>
                            {{-- Einstellungen --}}
                            <div class="tab-pane p-0" id="settings">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form"
                                              action="{{ route('profil.index', Auth::user()->id) }}"
                                              method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="images" value="{{ $profil->images }}">
                                            <div class="form-row">
                                                <div class="form-group col-lg-2">
                                                    <label>Anrede</label>
                                                    <select class="custom-select custom-select-sm"
                                                            name="anrede">
                                                        <option value="Firma">Firma</option>
                                                        <option value="Herr" selected>Herr</option>
                                                        <option value="Frau">Frau</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-5">
                                                    <label>Vorname</label>
                                                    <input
                                                        class="form-control form-control-sm @error('vorname') is-invalid @enderror"
                                                        type="text" name="vorname" placeholder="Vorname"
                                                        value="{{ $profil->vorname }}">

                                                    @error('vorname')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-5">
                                                    <label>Nachname</label>
                                                    <input
                                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                        type="text" name="name" placeholder="Nachname"
                                                        value="{{ $profil->name }}">

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label>Straße</label>
                                                    <input
                                                        class="form-control form-control-sm @error('straße') is-invalid @enderror"
                                                        type="text" name="straße" placeholder="Straße"
                                                        value="{{ $profil->straße }}">

                                                    @error('straße')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label>Postleitzahl</label>
                                                    <input
                                                        class="form-control form-control-sm @error('plz') is-invalid @enderror"
                                                        type="text" name="plz" placeholder="Postleitzahl"
                                                        value="{{ $profil->plz }}">

                                                    @error('plz')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label>Wohnort</label>
                                                    <input
                                                        class="form-control form-control-sm @error('ort') is-invalid @enderror"
                                                        type="text" name="ort" placeholder="Wohnort"
                                                        value="{{ $profil->ort }}">

                                                    @error('ort')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label>Username</label>
                                                    <input
                                                        class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                        type="text" name="username" placeholder="Username"
                                                        value="{{ $profil->username }}">

                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Telefon</label>
                                                    <input
                                                        class="form-control form-control-sm @error('telefon') is-invalid @enderror"
                                                        type="tel" name="telefon" placeholder="Telefon"
                                                        value="{{ $profil->telefon }}">

                                                    @error('telefon')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label>E-Mail-Adresse</label>
                                                    <input
                                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                        type="email" name="email" placeholder="E-Mail-Adresse"
                                                        value="{{ $profil->email }}">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Firma</label>
                                                    <input
                                                        class="form-control form-control-sm @error('firma') is-invalid @enderror"
                                                        type="text" name="firma" placeholder="Firma"
                                                        value="{{ $profil->firma }}">

                                                    @error('firma')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-lg-6"></div>
                                                <div class="col-lg-6 d-flex justify-content-end">
                                                    <button class="btn btn-sm btn-orange btn-block"
                                                            type="submit">Ändern
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="form-group col-lg-12">
                                                            <span class="form-text text-muted">Wenn Sie das Passwort ändern möchten, klicken Sie bitte
                                                                <a href="/passwort-aendern">hier</a>.
                                                            </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            {{-- Rollenverwaltung --}}
                            <div class="tab-pane p-0" id="rollen">

                                <form action="{{ route('backend.users.update', $profil->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="roles" class="col-md-2 col-form-label text-md-right">Rolle</label>

                                        <div class="col-md-6">
                                            @foreach($roles as $role)
                                                <div class="custom-control custom-checkbox mx-1">
                                                    <input type="checkbox" class="custom-control-input" name="roles[]"
                                                           id="{{ $role->name }}" value="{{ $role->id }}"
                                                           @if ($profil->roles->pluck('id')->contains($role->id)) checked @endif>
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
                    @can('manage-users')
                        <div class="row mt-3">
                            <div class="col-lg-12 text-right">
                                <small>Zuletzt eingeloggt
                                    am {{ Carbon\Carbon::parse($profil->last_login_at)->isoFormat('DD.MM.YYYY') }}
                                    um {{ Carbon\Carbon::parse($profil->last_login_at)->isoFormat('HH:mm') }} mit der
                                    IP-Adresse:
                                    {{ $profil->last_login_ip }}</small>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="{{ route('profil.updateImage', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal fade" id="ProfilBild" tabindex="-1" role="dialog" aria-labelledby="ProfilBildLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ProfilBildLabel">Profilbild ändern</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="images" value="{{ $profil->images }}">
                            <label class="custom-file-label" for="customFile">Bild Hochladen</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                        <button type="submit" class="btn btn-orange">Bild ändern</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
