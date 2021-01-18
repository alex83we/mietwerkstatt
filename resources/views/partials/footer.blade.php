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
                        <li>{{ 'E-Mail: '.str_replace("@", "[at]", $firma->email) }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h5>Links</h5>
                <ul class="list-unstyled kontakt">
                    <li class="py-sm-2 py-md-0"><a href="{{ url('datenschutz') }}">Datenschutzerklärung</a></li>
                    <li class="py-sm-2 py-md-0"><a href="{{ url('impressum') }}">Impressum</a></li>
                    <li class="py-sm-2 py-md-0"><a href="{{ url('agb') }}">AGB</a></li>
                    <li class="py-sm-2 py-md-0"><a href="{{ url('hausordnung') }}">Hausordnung</a></li>
                    <li class="py-sm-2 py-md-0"><a href="{{ url('cookie') }}">Cookie Einstellungen</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h5>Öffnungszeiten & Bürozeiten</h5>
                @foreach(\Illuminate\Support\Facades\DB::table('backend_firmendaten')->get()->toArray() as $firma)
                <table class="text-light kontakt w-100">
                    <tr>
                        <td class="text-left">Montag:</td>
                        <td>{{ $firma->montag }} @if($firma->bmontag == true) </td>
                        <td class="float-right">{{ $firma->bmontag }} @endif</td>
                    </tr>
                    <tr>
                        <td class="text-left">Dienstag:
                        <td>{{ $firma->dienstag }} @if($firma->bdienstag == true)</td>
                        <td class="float-right"> {{ $firma->bdienstag }} @endif</td>
                    </tr>
                    <tr>
                        <td class="text-left">Mittwoch:
                        <td>{{ $firma->mittwoch }} @if($firma->bmittwoch == true)</td>
                        <td class="float-right"> {{ $firma->bmittwoch }} @endif</td>
                    </tr>
                    <tr>
                        <td class="text-left">Donnerstag:
                        <td>{{ $firma->donnerstag }} @if($firma->bdonnerstag == true)</td>
                        <td class="float-right"> {{ $firma->bdonnerstag }} @endif</td>
                    </tr>
                    <tr>
                        <td class="text-left">Freitag:
                        <td>{{ $firma->freitag }} @if($firma->bfreitag == true)</td>
                        <td class="float-right"> {{ $firma->bfreitag }} @endif</td>
                    </tr>
                    <tr>
                        <td class="text-left">Samstag:
                        <td>{{ $firma->samstag }} @if($firma->bsamstag == true)</td>
                        <td class="float-right"> {{ $firma->bsamstag }} @endif</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>Samstags sind wir nur an geraden KW vor Ort.<br>
                                Außerhalb der Öffnungszeiten & Bürozeiten sind Termine nach Vereinbarung möglich.</p>
                        </td>
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
