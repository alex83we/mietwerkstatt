<div class="footer-gesamt">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h5>Kontakt</h5>
                <ul class="list-unstyled kontakt">
                    @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma)
                        <li>{{ $firma->firmenname }}</li>
                        <li>{{ $firma->firmenzusatz }}</li>
                        <li>{{ $firma->straße }}</li>
                        <li>{{ $firma->plz.' '.$firma->ort }}</li>
                        <li>&nbsp;</li>
                        <li>{{ 'Telefon: '.$firma->telefon }}</li>
                        <li>{{ 'Telefon: '.$firma->mobil }}</li>
                        <li>{{ 'Telefax: '.$firma->fax }}</li>
                        <li>&nbsp;</li>
                        <li>{{ 'E-Mail: '.$firma->email }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h5>Links</h5>
                <ul class="list-unstyled kontakt">
                    <li><a href="{{ url('datenschutz') }}">Datenschutzerklärung</a></li>
                    <li><a href="{{ url('impressum') }}">Impressum</a></li>
                    <li><a href="{{ url('cookie') }}">Cookie Einstellungen</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h5>Öffnungszeiten</h5>
                @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma)
                <table class="text-light kontakt d-inline-block">
                    <tr>
                        <td class="text-left">Montag:</td>
                        <td>{{ $firma->montag.' Uhr' }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Dienstag:
                        <td>{{ $firma->dienstag.' Uhr' }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Mittwoch:
                        <td>{{ $firma->mittwoch.' Uhr' }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Donnerstag:
                        <td>{{ $firma->donnerstag.' Uhr' }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Freitag:
                        <td>{{ $firma->freitag.' Uhr' }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Samstag:
                        <td>{{ $firma->samstag.' Uhr' }}</td>
                    </tr>
                </table>
                @endforeach
            </div>
        </div>
        @if($firma->facebook == true or $firma->twitter == true or $firma->instagram == true)
        <!-- Socialmedia -->
        @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma)
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                    @if($firma->facebook == true)
                    <li class="list-inline-item"><a href="{{ $firma->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if($firma->twitter == true)
                    <li class="list-inline-item"><a href="{{ $firma->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    @endif
                    @if($firma->instagram == true)
                    <li class="list-inline-item"><a href="{{ $firma->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <!-- Copyright -->
    <div class="col-xs-12 col-sm-12 col-md-12 footer-copyright text-center py-3">
        <p class="h5 m-0">
            © 2020 @if(now()->year != 2020) - {{ now()->year }}@endif Copyright: @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma){{ $firma->firmenname }} @endforeach
        </p>
    </div>
</div>
