<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($categorias as $category)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ $category->image }}">
                            <h5><a href="shop/{{ $category->slug }}">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
