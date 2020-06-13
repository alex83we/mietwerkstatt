<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('canonical')
    @yield('meta')
    @include('partials.meta')
    @include('partials.og')
    @include('partials.twitter')
    @include('partials.fav')

    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

    <! - Dadurch wird die ID des aktuellen Benutzers in Javascript verfügbar ->
    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titel') | {{ config('app.name'), ' Mietwerkstatt Roßleben KFZ Service, Teile & Verkauf' }}</title>


    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TTG7CXS');</script>
    <!-- End Google Tag Manager -->

    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed" onload="display_ct();">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTG7CXS"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="app">
    {{--    @include('admin.layout.partials.messages')--}}
    <div class="wrapper">
        @include('backend.layouts.partials.navbar')
        @include('backend.layouts.partials.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('breadcrumb')
                </div>
            </div>
            @yield('content')
        </div>
        @include('backend.layouts.partials.footer')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/backend.js') }}" defer></script>
@jquery
@toastr_js
@toastr_render
<!-- jQuery UI 1.11.4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);

    function display_c() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh);
    }

    function display_ct() {
        var x = new Date();

        // date part ///
        var month = x.getMonth() + 1;
        var day = x.getDate();
        var year = x.getFullYear();
        if (month < 10) {
            month = '0' + month;
        }
        if (day < 10) {
            day = '0' + day;
        }
        var x3 = day + '.' + month + '.' + year;

        // time part //
        var hour = x.getHours();
        var minute = x.getMinutes();
        var second = x.getSeconds();
        if (hour < 10) {
            hour = '0' + hour;
        }
        if (minute < 10) {
            minute = '0' + minute;
        }
        if (second < 10) {
            second = '0' + second;
        }
        var x3 = x3 + ' ' + hour + ':' + minute + ':' + second;
        document.getElementById('ct').innerHTML = x3;
        display_c();
    }
</script>
@auth
    <script>
        window.user = @json(auth()->user())
    </script>
@endauth
@stack('js')
</body>
</html>
