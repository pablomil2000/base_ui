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
            </div>
        </div>


        <div class="row featured__filter">
            @foreach ($productos as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        @if ($product->UrlImages)
                            <div class="featured__item__pic set-bg" data-setbg="{{ $product->image }}">
                            @else
                                <div class="featured__item__pic set-bg" data-setbg="images/{{ $product->image }}">
                        @endif
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
