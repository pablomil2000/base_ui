<div id="portfolio"></div>
<div class="container">
    <div class="row centered mt grid">
        <h3>Nuestros coches</h3>
        <div class="mt"></div>
        @foreach ($coches as $car)
            <div class="col-lg-4">
                <a href="/car/{{ $car->id }}"><img height="300px" src="/img/cars/{{ $car->image }}" alt="">
                    <h4>{{ $car->marca }} {{ $car->modelo }}</>
                    </h4>
            </div>
        @endforeach
    </div>
</div>
