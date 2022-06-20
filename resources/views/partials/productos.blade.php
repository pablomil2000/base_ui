<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    @isset($texto)
                        <h2>{!! $texto !!}</h2>
                    @else
                        <h2>Todos los productos</h2>
                    @endisset
                </div>
                {{-- <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div> --}}
            </div>
        </div>


        <div class="row featured__filter">
            @foreach ($productos as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ $product->image }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/product/{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $product->name }}</a></h6>
                            <h5>{{ $product->price }} €</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
