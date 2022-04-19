<div class="tweetBox">
    <form method="post" action="{{ route('tweets.new') }}">
        @csrf
        <div class="tweetbox__input">
            <img src="images/perfil/{{ auth()->user()->imgPerfil }}" alt="userImg" />
            <textarea id="summernote" type="text" name="tweet" placeholder="Que esta pasando?" value="{{ old('tweet') }}" autofocus/></textarea>
            {{ $errors->first('tweet') }}
        </div>
        

        <button class="tweetBox__tweetButton">Tweet</button>
        <script>
            $('#summernote').summernote({
                placeholder: '<h1>¿Que esta pasando?</h1>',
                name:'tweet',
                height: 120,
                width: '100%',
                shortcuts: false,
                tabDisable: false,
                disableDragAndDrop: true,
                toolbar: [
                    // ['style', ['style']],
                    // ['font', ['bold', 'underline', 'clear']],
                    // ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['table', ['table']],
                    ['insert', ['link', 'table', 'video']],
                    // ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        </script>
    </form>
</div>
