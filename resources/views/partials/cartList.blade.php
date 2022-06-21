<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th class="shoping__product">Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @empty($carts)
                                <tr>
                                    <td colspan="5">No items in cart</td>
                                </tr>
                            @else
                                @foreach ($carts as $detalle)
                                <tr>
                                    <td>
                                        {{ $detalle->id }}
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ $detalle->created_at }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        {{ $detalle->is_active ? 'Pedido en proceso' : 'Pedido Realizado' }}
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
        </div>
    </div>
</section>
