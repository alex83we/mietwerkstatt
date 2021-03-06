<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    @include('partials.meta')
    @include('partials.og')
    @include('partials.twitter')
    @include('partials.fav')

    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

    <!-- Dadurch wird die ID des aktuellen Benutzers in Javascript verfügbar -->
    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titel') | {{ config('app.name', 'Mietwerkstatt Roßleben KFZ Service, Teile & Verkauf') }}</title>

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @toastr_css

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TTG7CXS');</script>
    <!-- End Google Tag Manager -->
    @stack('css')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTG7CXS"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- <div id="app"> -->
    <div id="page-container">
{{--        @include('partials.header')--}}

{{--        <section class="body-section">--}}
            @yield('content')
{{--        </section>--}}

        {{--<footer id="footer">
            @include('partials.footer')
        </footer>--}}
    </div>
<!-- </div> -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
{{--@jquery--}}
@toastr_js
@toastr_render
@stack('js')
</body>
</html>
