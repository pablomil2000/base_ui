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
            <td>{{ $table->cuenta }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
