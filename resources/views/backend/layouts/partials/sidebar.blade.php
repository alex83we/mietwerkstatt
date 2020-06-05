<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-orange elevation-4">
    <!-- Brand Logo -->
    <div class="text-center">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                @if(Auth::user()->images == false)
                    <a href="{{ route('profil.index', Auth::user()->id) }}"><img src="{{ asset('images/defaultProfil.png') }}" class="img-circle elevation-2" alt="User Image" style="background-color: #f8f9fa; padding: 1px"></a>
                @else
                    <a href="{{ route('profil.index', Auth::user()->id) }}"><img src="{{ Storage::disk('public')->url('profil/'.Auth::user()->id.'/'.Auth::user()->images) }}" class="img-circle elevation-2" alt="{{ Auth::user()->vorname.' '.Auth::user()->name }}"></a>
                @endif
            </div>
            <div class="info">
                @if(Cache::has('user-is-online-' . Auth::user()->id))
                    <a href="{{ route('profil.index', Auth::user()->id) }}"><div class="d-block text-success">{{ Auth::user()->vorname.' '.Auth::user()->name }}</div></a>
                @else
                    <a href="{{ route('profil.index', Auth::user()->id) }}"><div class="d-block text-muted">{{ Auth::user()->vorname.' '.Auth::user()->name }}</div></a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('backend.dashboard') }}" class="nav-link {{ Request::is('backend/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.verkauf.index') }}" class="nav-link {{ Request::is('backend/verkauf*') ? 'active' : '' }}">
                        <i class="fas fa-car-alt nav-icon"></i>
                        <p>Fahrzeuge</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.anfrage.show', Auth::user()->id) }}" class="nav-link {{ Request::is('backend/anfrage*') ? 'active' : '' }}">
                        <i class="fas fa-envelope-open-text nav-icon"></i>
                        <p>Anfrage</p>
                    </a>
                </li>

                @can('manage-users')
                    {{--<li class="nav-item">
                        <a href="#" class="nav-link {{ Request::is('backend/kontakt*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Kontaktanfragen
                            </p>
                        </a>
                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ route('backend.users.index') }}" class="nav-link {{ Request::is('backend/users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Benutzerverwaltung
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Items</li>
                    <li class="nav-item">
                        <a href="{{ route('backend.add.index') }}" class="nav-link {{ Request::is('backend/add*') ? 'active' : '' }}">
                            <i class="fas fa-car-side nav-icon"></i>
                            <p>Hersteller</p>
                        </a>
                    </li>
                    {{--<li class="nav-item">
                        <a href="#" class="nav-link {{ Request::is('backend/basisdaten*') ? 'active' : '' }}">
                            <i class="fas fa-folder nav-icon"></i>
                            <p>Basisdaten</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ Request::is('backend/antrieb-umwelt*') ? 'active' : '' }}">
                            <i class="fas fa-folder nav-icon text-danger"></i>
                            <p>Antrieb & Umwelt</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ Request::is('admin/items*') ? 'active' : '' }}">
                            <i class="fas fa-folder nav-icon text-danger"></i>
                            <p>Wiederkehrendes</p>
                        </a>
                    </li>--}}
    {{--                @if (!Auth::user()->hasRole('mitglied'))--}}
                    {{--<li class="nav-header">ADD</li>
                    <li class="nav-item has-treeview {{ Request::is('admin/add*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('admin/add*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-car-side"></i>
                            <p>
                                Fahrzeugauswahl
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::is('admin/add/marken*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hersteller</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::is('admin/add/typ*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fahrzeugtyp</p>
                                </a>
                            </li>
                        </ul>
                    </li>--}}
                    <li class="nav-header">Firma</li>
                    <li class="nav-item has-treeview  {{ Request::is('backend/firma*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('backend/firma*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Stammdaten
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.firma.index') }}" class="nav-link {{ Request::is('backend/firma*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>Firmendaten</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

