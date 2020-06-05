<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
        {{--<li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Kontakt</a>
        </li>--}}
    </ul>

    {{--<!-- SEARCH FORM -->
    <div class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search" placeholder="Suche..." aria-label="Suche...">
            <div class="input-group-append">
                <button class="btn btn-navbar" @click="searchit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>--}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="nav-link d-none d-xl-inline-block"> Aktuelle Zeit & Datum: <span id="ct"></span></div>
        <!-- Messages Dropdown Menu -->
        {{--<li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                --}}{{--@if(Auth::user()->unreadNotifications->count())
                        <span class="badge badge-danger navbar-badge">{{ Auth::user()->unreadNotifications->count() }}</span>
                @endif--}}{{--
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                --}}{{--@if(Auth::user()->unreadNotifications->count())
                <a class="dropdown-item" href="{{ route('markAsRead') }}" style="color: green;">Alle als gelesen Markieren</a>
                @foreach(auth()->user()->unreadNotifications as $notification)
                <a href="{{ route('anfrage.show', $notification->data["anfrage"]["id"] ) }}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ url('adminlte/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ $notification->data['anfrage']['name'] }}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">{{ Str::limit($notification->data['anfrage']['text'], 25) }}</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"> {{ \Carbon\Carbon::parse($notification->data['anfrage']['created_at'])->fromNow() }}</i></p>
                        </div>
                    </div>--}}{{--
                    <!-- Message End -->
--}}{{--                </a>--}}{{--
                <div class="dropdown-divider"></div>
                --}}{{--@endforeach
                @else--}}{{--
                    <div class="media-body">
                        <p class="text-sm">Keine Benachrichtigung vorhanden</p>
                    </div>
                --}}{{--@endif
                <a href="{{ route('anfrage.index') }}" class="dropdown-item dropdown-footer">See All Messages</a>--}}{{--
            </div>
        </li>--}}
        <!-- Notifications Dropdown Menu -->
        {{--<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            @if($user->unread() == true)
                <span class="badge badge-warning navbar-badge">{{ $user>unread() }}</span>
            @else

            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">@if($user->unread() == '1'){{ $unread }} Benachrichtigung @else {{ $user->unread() }} Benachrichtigungen @endif</span>
            <div class="dropdown-divider"></div>
            --}}{{--<a href="{{ route('anfrage.index') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{ Auth::user()->unreadNotifications->count() }} neue Nachrichten
            </a>--}}{{--
            --}}{{--<div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>--}}{{--
            <ul class="list-unstyled p-3" id="notificationsMenu">
                <li>Keine Benachrichtigungen</li>
            </ul>
            --}}{{--<div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}{{--
        </div>
        </li>--}}
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">{{ __('Abmelden') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
