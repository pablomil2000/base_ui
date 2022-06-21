<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @empty($cart)
                                <tr>
                                    <td colspan="5">No items in cart</td>
                                </tr>
                            @else
                                @foreach ($cart->CartDetails as $detalle)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            @if ($detalle->product->UrlImages)
                                                <img alt="" src="{{ $detalle->product->image }}">
                                            @else
                                                <img alt="" src="/images/{{ $detalle->product->image }}">
                                            @endif
                                            <h5>{{ $detalle->product->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $detalle->price }} €
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            {{ $detalle->quantity }}
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ $detalle->product->price * $detalle->quantity }} €
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $detalle->id }}">


                                                <button style="border: 0; background: transparent"
                                                    class="icon_close"></button>


                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endempty
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="shoping__cart__btns">
                    <a href="{{ route('shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        {{-- @dd($cart) --}}
                        @if ($cart)
                        <li>Total <span>{{ $cart->TotalCarrito }} €</span></li>
                            @if ($cart->is_active == 1)
                                <a href="{{ route('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                            @endif
                        @else
                            <li>Total <span>0 €</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
