<!-- Facebook -->
<meta property="og:url" content="@yield('url', '//www.mietwerkstatt-rossleben.de')">
<meta property="og:type" content="website">
<meta property="og:title" content="@yield('titel') | {{ config('app.name'), ' Mietwerkstatt Roßleben KFZ Service, Teile & Verkauf' }}">
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:description" content="@yield('description', Str::limit('Auf unserer Seite können sie ihr Auto zum Verkauf stellen, oder ein Termin in unserer Mietwerkstatt vereinbaren. Des Weiteren können sie bei uns ihre Service-Arbeiten am Fahrzeug durchführen lassen.', 154))">
<meta property="og:image" content="@yield('image', '/images/logoWerkstatt.png')">
