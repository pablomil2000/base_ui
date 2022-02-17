<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Color</th>
            <th scope="col">Description</th>
            <th scope="col">Cuenta</th>
            <th scope="col">Propina</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tables as $table)
        <tr>
            <th scope="col">{{ $table->numMes }}</th>
            <td><input type="color" disabled value="{{ $table->color }}"></td>
            <td>{{ $table->description }}</td>
            <td>{{ $table->cuenta }} €</td>
            <td>{{ ($table->cuenta)*0.10 }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<button class="btn btn-primary">Total cuenta: {{ auth()->user()->getTotalCuentasAttribute() }}€</button>
<button class="btn btn-warning">Total cuenta: {{ auth()->user()->getTotalPropinasAttribute() }}€</button>
<button class="btn btn-success">Total cuenta: {{ auth()->user()->getTotalCobrarAttribute() }}€</button>
