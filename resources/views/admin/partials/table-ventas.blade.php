<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Earnings By Items</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>date</th>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th class="text-right">contenido</th>
                        <th class="text-right">price</th>
                        <th class="text-right">quantity</th>
                        <th class="text-right">total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartDetails as $detalle)
                        {{-- @dd($detalle) --}}
                        <tr>
                            <td>{{ $detalle->created_at }}</td>
                            <td>{{ $detalle->id }}</td>
                            <td>{{ $detalle->cart_id }}</td>
                            <td class="text-right">{{ $detalle->Product->name }}</td>
                            <td class="text-right">{{ $detalle->price }} €</td>
                            <td class="text-right">{{ $detalle->quantity }}</td>
                            <td class="text-right">{{ $detalle->price * $detalle->quantity }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
