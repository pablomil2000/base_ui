<div class="container">


    {{-- mensaje flash --}}

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="newPost">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                        {{ $errors->first('titulo') }}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="title">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{ $errors->first('categoria') }}
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="title">Fecha de publicacion</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                    </div>
                    {{ $errors->first('fecha') }}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <textarea id="summernote" name="post" placeholder="Escribe aqui..." value="{{ old('post') }}" autofocus /></textarea>
                {{ $errors->first('post') }}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary form-control">Publicar</button>
            </div>
        </div>
</div>

<script>
    $('#summernote').summernote({
        placeholder: '<h1 style="color:grey">Escribe aqui...</h1>',
        name: 'post',
        height: '20em',
        width: '100%',
        shortcuts: false,
        tabDisable: false,
        disableDragAndDrop: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            // ['table', ['table']],
            ['insert', ['link', 'video', 'table']],
            ['view', ['fullscreen']]
        ]
    });
</script>
</form>
</div>
