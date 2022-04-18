<img style="width:10em; height:10em" src="{{ asset('images/perfil/'.$user->imgPerfil) }}" alt="userImg" />
<div class="feed">
    <div class="feed__header">
        <h2>Perfil</h2>
    </div>
    <div class="feed__header" style="display:flex">
        <div>
            <h2>{{ $user->name }}</h2>
        </div>
        <div style="margin-left: 20vw">
            <a href="/users/{{ auth()->user()->id }}" class="btn btn-primary">volver</a>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="post">
            <label>nick: </label>
            <input type="text" class="form-control" name="nick" value="{{ $user->nick }}">
        </div>
        
        <div class="post">
            <label>Cambiar img de perfil</label>
            <input type="file" name="image" id="">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
    

</div>