<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-preview">
                    <h2 class="post-title">{{ $post->titulo }}</h2>
                    <h3 class="post-subtitle">{!! $post->post !!}</h3>
                    <p class="post-meta">
                        Posted by <a href="#!">{{ $post->user_id }}</a> on {{ $post->fechaPublicacion }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</article>
