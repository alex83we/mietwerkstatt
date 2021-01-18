<nav class="navbar navbar-expand-lg navbar-dark bg-dark ttf-border-bottom">
{{--    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>--}}
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="/images/logo.svg" type="image/svg+xml" style="width:auto; height: 30px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            {{--@can('manage-users')
            <li class="nav-item {{ Request::is('verkauf*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('verkauf/create') }}">Verkaufen</a>
            </li>
            @endcan
            <li class="nav-item {{ Request::is('suche*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('suche') }}">Fahrzeugsuche</a>
            </li>
            <li class="nav-item {{ Request::is('ankauf*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('ankauf') }}">Fahrzeugankauf</a>
            </li>--}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('werkstatt*') ? 'active' : '' }}" href="{{ url('werkstatt') }}">Mietwerkstatt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('tyres') ? 'active' : '' }}" href="{{ url('tyres') }}">Reifen</a>
            </li>
            <li class="nav-item dropdown {{ Request::is('preise*') ? 'active' : '' }}">
                <a id="navbarPreise" class="nav-link" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Preise</a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarPreise">
                    <a class="dropdown-item {{ Request::is('preise/hebebuehnen') ? 'active' : '' }}" href="{{ url('preise/hebebuehnen') }}">Hebebühnen</a>
                    <a class="dropdown-item {{ Request::is('preise/werkzeuge') ? 'active' : '' }}" href="{{ url('preise/werkzeuge') }}">Werkzeuge</a>
                    <a class="dropdown-item {{ Request::is('preise/reifendienst') ? 'active' : '' }}" href="{{ url('preise/reifendienst') }}">Reifendienst</a>
                </div>
            </li>
            <li class="nav-item {{ Request::is('kontakt*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('kontakt') }}">Kontakt</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                {{--@if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrieren') }}</a>
                    </li>
                @endif--}}
            @else
                {{--<li class="dropdown">
                    <a class="nav-link dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-user"></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                        <li class="dropdown-header">Keine Benachrichtigungen</li>
                    </ul>
                </li>--}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->vorname.' '.Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @can('manage-users')
                            <a class="dropdown-item" href="{{ route('backend.dashboard') }}">Backend</a>
                            <a class="dropdown-item" href="{{ url('profil', Auth::user()->id) }}">Profil</a>
{{--                            <a class="dropdown-item" href="{{ route('backend.dashboard') }}">Backend</a>--}}
                            <a class="dropdown-item" href="{{ route('profil.change-password') }}">Passwort ändern</a>
                        @else
                            <a class="dropdown-item" href="{{ url('profil', Auth::user()->id) }}">Profil</a>
                            <a class="dropdown-item" href="{{ route('profil.change-password') }}">Passwort ändern</a>
                        @endcan

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
