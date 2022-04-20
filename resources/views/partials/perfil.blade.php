<div class="container">
    <div class="row">
        <div class="col-3">
            <img style="width:10em; height:10em" src="{{ asset('images/perfil/' . $user->imgPerfil) }}"
                alt="userImg" />
        </div>
        <div class="col">
            <div class="feed">
                <div class="feed__header">
                    <h2>Perfil</h2>
                </div>
                <div class="feed__header" style="display:flex">
                    <div>
                        <h2>{{ $user->name }}</h2>
                    </div>
                    @if (auth()->user()->id == $user->id)
                        <div style="margin-left: 20vw">
                            <a href="/edit" class="btn btn-primary">Editar</a>
                        </div>
                    @else

                        @if (!auth()->user()->seguido()->where('user_id', $user->id)->first())
                            <div style="margin-left: 20vw">
                                <a href="/follow/{{ $user->id }}" class="btn btn-primary">Seguir</a>
                            </div>
                        @else
                            <div style="margin-left: 20vw">
                                <a href="/unfollow/{{ auth()->user()->seguido()->where('user_id', $user->id)->first()->id }}" class="btn btn-danger">Dejar de seguir</a>
                            </div>
                        @endif

                    @endif
                </div>

                <div class="feed__header" style="display:flex">
                    <div class="col">
                        <h2>Publicaciones: {{ $user->tweets()->count() }}</h2>
                    </div>
                    <div class="col">
                        <h2>Segidores: {{ $user->Sigue()->count() }}</h2>
                    </div>
                    <div class="col">
                        <h2>Sigue: {{ $user->seguido()->count() }}</h2>
                    </div>
                </div>
                @foreach ($tweets = $user->tweets()->orderBy('created_at', 'desc')->get()
    as $tweet)
                    <div class="post">
                        <div class="post__avatar">
                            <img src="{{ asset('images/perfil/' . $user->imgPerfil) }}" alt="img de usuario" />
                        </div>
                        <div class="post__body">
                            <div class="post__header">
                                <div class="post__headerText">
                                    <h3>
                                        {{ $user->name }}
                                        <span class="post__headerSpecial">
                                            <span class="material-icons post__badge"> verified</span>
                                            {{ '@' . $user->nick }}</span>
                                    </h3>
                                </div>
                                <div class="post__headerDescription">
                                    <p>{!! $tweet->tweet !!}</p>
                                </div>
                            </div>
                            {{-- <img src="https://www.focus2move.com/wp-content/uploads/2020/01/Tesla-Roadster-2020-1024-03.jpg" alt="" /> --}}
                            <div class="post__footer">
                                <div class="row">
                                    <div class="d-flex justify-content-around">
                                        <div class="p-2"><span class="material-icons"> chat_bubble_outline </span></div>
        
                                        <?php
                                        $likes = auth()
                                            ->user()
                                            ->like()
                                            ->where('tweet_id', $tweet->id)
                                            ->where('user_id', auth()->user()->id)
                                            ->get();?>
                                        @if ($likes->count() > 0)
                                            <div class="p-2">
                                                <a href="/disLike/{{ $tweet->id }}">
                                                    <div class="p-2">
                                                        <span class="material-icons"> favorite</span>
                                                    </div>
                                                </a>
                                            </div>
                                        @else
                                            <div class="p-2">
                                                <a href="/like/{{ $tweet->id }}">
                                                    <div class="p-2">
                                                        <span class="material-icons"> favorite_border</span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
        
        
        
                                        <div class="p-2">
                                            @if ($tweet->user_id == auth()->user()->id)
                                                <div class="dropdown">
                                                    <button type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false" style="border: 0; background-color: transparent">
                                                        <span class="material-icons"> settings </span>
                                                    </button>
        
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item"
                                                                href="deleteTweet/{{ $tweet->id }}">borrar</a></li>
                                                        {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                                                        {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
