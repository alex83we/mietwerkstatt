<form id="suche">
<!-- Kategorie search -->
<div class="form-group" id="kat">
    <label for="kategorie">Kategorie</label>
    <select class="form-control" name="kategorie" id="kategorie">
        <option value="" selected>Beliebig</option>
        @foreach($kategorie as $item)
            <option value="{{ $item->kategorie }}">{{ $item->kategorie }}</option>
        @endforeach
    </select>
</div>

<!-- Marke search -->
<div class="form-group">
    <label for="marke">Marke</label>
    <select class="form-control" name="marke" id="marke">
        <option value="" selected>Beliebig</option>
        @foreach($fahrzeuge as $fahrzeug)
            <option value="{{ $fahrzeug->marke }}">{{ $fahrzeug->marke }}</option>
        @endforeach
    </select>
</div>

<!-- Modell search -->
<div class="form-group">
    <label for="selectModell">Modell</label>
    <select class="form-control" name="modell" id="selectModell" disabled>
        <option value="" @if (old('modell') == false){{'selected=selected'}}@endif>Bitte erst Marke wählen</option>
                    {{--@foreach($modell as $item)

                        <option value="{{ $item->modell }}" @if (old('modell') == $item->modell){{'selected=selected'}}@endif>{{ $item->modell }}</option>

                    @endforeach--}}

    </select>
</div>

<!-- Zustand search -->
<div class="form-group">
    <label for="zustand">Zustand</label>
    <select class="form-control" name="zustand" id="zustand">
        <option value="" selected>Beliebig</option>
        @foreach($fahrzeugart as $item)
            <option value="{{ $item->fahrzeugart }}">{{ $item->fahrzeugart }}</option>
        @endforeach
    </select>
</div>

<!-- Preis search -->
<div class="row">
    <div class="col-12">
        <label for="preis">Preis</label>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="preis_min" id="preis_min">
                        <option value="" selected>Beliebig</option>
                        <option value="500.00">500,00 €</option>
                        <option value="1000.00">1000,00 €</option>
                        <option value="2500.00">2500,00 €</option>
                        <option value="5000.00">5000,00 €</option>
                        <option value="7500.00">7500,00 €</option>
                        <option value="10000.00">10000,00 €</option>
                        <option value="20000.00">20000,00 €</option>
                        <option value="30000.00">30000,00 €</option>
                        <option value="40000.00">40000,00 €</option>
                        <option value="50000.00">50000,00 €</option>
                    </select>
                </div>
            </div>
            <div class="col-2 align-self-center">
                <p class="text-center mb-2">bis</p>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="preis_max" id="preis_max">
                        <option value="999999.99" selected>Beliebig</option>
                        <option value="1000.00">1000,00 €</option>
                        <option value="2500.00">2500,00 €</option>
                        <option value="5000.00">5000,00 €</option>
                        <option value="7500.00">7500,00 €</option>
                        <option value="10000.00">10000,00 €</option>
                        <option value="20000.00">20000,00 €</option>
                        <option value="30000.00">30000,00 €</option>
                        <option value="40000.00">40000,00 €</option>
                        <option value="50000.00">50000,00 €</option>
                        <option value="100000.00">100000,00 €</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kilometerstand search -->
<div class="row">
    <div class="col-12">
        <label for="km">Kilometerstand</label>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="km_min" id="km_min">
                        <option value="" selected>Beliebig</option>
                        <option value="0">0 km</option>
                        <option value="10.000">10.000 km</option>
                        <option value="50.000">50.000 km</option>
                        <option value="100.000">100.000 km</option>
                        <option value="150.000">150.000 km</option>
                        <option value="200.000">200.000 km</option>
                        <option value="250.000">250.000 km</option>
                        <option value="300.000">300.000 km</option>
                    </select>
                </div>
            </div>
            <div class="col-2 align-self-center">
                <p class="text-center mb-2">bis</p>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="km_max" id="km_max">
                        <option value="999.999" selected>Beliebig</option>
                        <option value="25.000">25.000 km</option>
                        <option value="50.000">50.000 km</option>
                        <option value="100.000">100.000 km</option>
                        <option value="150.000">150.000 km</option>
                        <option value="200.000">200.000 km</option>
                        <option value="250.000">250.000 km</option>
                        <option value="300.000">300.000 km</option>
                        <option value="350.000">350.000 km</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Getriebe search -->
<div class="form-group">
    <label for="getriebe">Getriebe</label>
    <select class="form-control" name="getriebe" id="getriebe">
        <option value="" selected>Beliebig</option>
        @foreach($getriebe as $item)
            <option value="{{ $item->getriebe }}">{{ $item->getriebe }}</option>
        @endforeach
    </select>
</div>

<!-- Kraftstoff search -->
<div class="form-group">
    <label for="kraftstoff">Kraftstoff</label>
    <select class="form-control" name="kraftstoff" id="kraftstoff">
        <option value="" selected>Beliebig</option>
        @foreach($kraftstoff as $item)
            <option value="{{ $item->kraftstoff }}">{{ $item->kraftstoff }}</option>
        @endforeach
    </select>
</div>

<!-- Erstzulassung search -->
<div class="row">
    <div class="col-12">
        <label for="erstzulassung">Erstzulassung</label>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="erstzulassung_min" id="erstzulassung_min">
                        <option value="1975" selected>Beliebig</option>
                        @for($i = date('Y'); $i >= 1975; $i--)
                        <option value="{{ (int)$i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-2 align-self-center">
                <p class="text-center mb-2">bis</p>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="erstzulassung_max" id="erstzulassung_max">
                        <option value="{{ date('Y') }}" selected>Beliebig</option>
                        @for($i = date('Y'); $i >= 1975; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leistung search -->
<div class="row">
    <div class="col-12">
        <label for="leistung">leistung</label>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="leistung_min" id="leistung_min">
                        <option value="0" selected>Beliebig</option>
                        <option value="50">50 kw (68 PS)</option>
                        <option value="80">80 kw (109 PS)</option>
                        <option value="100">100 kw (136 PS)</option>
                        <option value="120">120 kw (163 PS)</option>
                        <option value="140">140 kw (190 PS)</option>
                        <option value="180">180 kw (245 PS)</option>
                        <option value="200">200 kw (272 PS)</option>
                        <option value="300">300 kw (408 PS)</option>
                    </select>
                </div>
            </div>
            <div class="col-2 align-self-center">
                <p class="text-center mb-2">bis</p>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <select class="form-control" name="leistung_max" id="leistung_max">
                        <option value="2000" selected>Beliebig</option>
                        <option value="50">50 kw (68 PS)</option>
                        <option value="80">80 kw (109 PS)</option>
                        <option value="100">100 kw (136 PS)</option>
                        <option value="120">120 kw (163 PS)</option>
                        <option value="140">140 kw (190 PS)</option>
                        <option value="180">180 kw (245 PS)</option>
                        <option value="200">200 kw (272 PS)</option>
                        <option value="300">300 kw (408 PS)</option>
                        <option value="400">400 kw (544 PS)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lakierung search -->
<div class="form-group">
    <label for="lackierung">Lackierung</label>
    <select class="form-control" name="lackierung" id="lackierung">
        <option value="" selected>Beliebig</option>
        @foreach($aussenfarbe as $item)
            <option value="{{ $item->aussenfarbe }}">{{ $item->aussenfarbe }}</option>
        @endforeach
    </select>
</div>

<!-- Polsterung search -->
<div class="form-group">
    <label for="polsterung">Polsterung</label>
    <select class="form-control" name="polsterung" id="polsterung">
        <option value="" selected>Beliebig</option>
        @foreach($polsterung as $item)
            <option value="{{ $item->innenmaterial }}">{{ $item->innenmaterial }}</option>
        @endforeach
    </select>
</div>

</form>
<div class="form-group">
    <button type="submit" form="suche" class="btn btn-outline-danger btn-block mt-4">Formular zurücksetzen</button>
</div>
{{--Sortieren nach: <br>
<a href="/suche/?sort=asc" class="link-muted">Preis aufsteigend</a> |
<a href="/suche/?sort=desc" class="link-muted">Preis absteigend</a> <br>
<a href="/suche/?km=asc" class="link-muted">Kilometer aufsteigend</a> |
<a href="/suche/?km=desc" class="link-muted">Kilometer absteigend</a>--}}
