<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">

        @foreach ($posts as $post)
            <div class="post-preview">
                <a href="post/{{ $post->id }}">
                    <h2 class="post-title">{{ $post->titulo }}</h2>
                    {{-- <h3 class="post-subtitle">{{ $post->Intro() }}</h3> --}}
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">{{ $post->user->name }}</a>
                    on {{ $post->fechaPublicacion }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
        @endforeach


        <div class="d-flex justify-content-end mb-4">
            {{ $posts->links() }}
            {{-- <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a> --}}
        </div>

    </div>
</div>
