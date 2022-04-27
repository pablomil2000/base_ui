<!-- DATA TABLE-->
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">Post</h3>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>titulo</th>
                                <th>Contenido</th>
                                <th>Nº de visitas</th>
                                <th>fecha de publicacion</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr class="tr-shadow">
                                <td>{{ $post->titulo }}</td>
                                <td>
                                    <span>{{ $post->post }}</span>
                                </td>
                                <td class="desc">{{ $post->visitas }}</td>
                                <td>
                                    <span class="status--process">{{ $post->fechaPublicacion }}</span>
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="/admin/post/{{ $post->id }}" class="item" data-toggle="tooltip"
                                            data-placement="top" title="Ver">
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </a>
                                        <a href="/admin/edit/{{ $post->id }}" class="item" data-toggle="tooltip"
                                            data-placement="top" title="Editar">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="/admin/delete/{{ $post->id }}" class="item" data-toggle="tooltip"
                                            data-placement="top" title="Borrar">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END DATA TABLE-->