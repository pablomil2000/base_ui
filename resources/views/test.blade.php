@extends('layout')

@section('menu')
    @include('partials.menu')
@endsection

@section('lastTwet')
    {{-- @include('partials.lastTwet') --}}
@endsection

@section('content')
    <!-- feed starts -->
    <div class="container">
        <div class="feed__header">
            <h2>Inicio</h2>
        </div>

        <!-- tweetbox starts -->
        @include('partials.tweetbox')
        <!-- tweetbox ends -->

        <!-- post starts -->
        {{-- @dd($tweets) --}}



        @foreach ($tweets as $tweet)
            <div class="post">
                <div class="post__avatar">
                    <img src="images/perfil/{{ $tweet->user->imgPerfil }}" alt="" />
                </div>
                <div class="post__body">
                    <div class="post__header">
                        <div class="post__headerText">
                            <h3>
                                <a href="{{ route('profile', $tweet->user->id) }}">
                                    {{ $tweet->user->name }}
                                </a>
                                <span class="post__headerSpecial"><span class="material-icons post__badge"> verified
                                    </span>{{ '@' . $tweet->user->nick }}</span>
                            </h3>
                        </div>
                        <div class="post__headerDescription">
                            {{-- interpretar html --}}

                            <p>{!! $tweet->tweet !!}</p>
                        </div>
                    </div>
                    {{-- <img src="https://www.focus2move.com/wp-content/uploads/2020/01/Tesla-Roadster-2020-1024-03.jpg" alt="" /> --}}
                    <div class="post__footer">
                        <div class="row">
                            <div class="d-flex justify-content-around">
                                <div class="p-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="material-icons"> chat_bubble_outline </span></button></div>
                                @include('partials.cajonComentario')


                                <?php
                                $likes = auth()
                                    ->user()
                                    ->like()
                                    ->where('tweet_id', $tweet->id)
                                    ->where('user_id', auth()->user()->id)
                                    ->get(); ?>
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
        <!-- post ends -->

    </div>
    <!-- feed ends -->
@endsection
