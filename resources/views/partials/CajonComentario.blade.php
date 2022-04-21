<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="tweetBox">
    <form method="post" action="{{ route('tweets.new') }}">
        @csrf
        <div class="tweetbox__input">
            <img src="images/perfil/{{ auth()->user()->imgPerfil }}" alt="userImg" />
            <textarea id="summernote" type="text" name="tweet" placeholder="Que esta pasando?" value="{{ old('tweet') }}"
                autofocus /></textarea>
            {{ $errors->first('tweet') }}
        </div>
        <button class="tweetBox__tweetButton">Tweet</button>
        <script>
            $('#summernote').summernote({
                placeholder: '<h1>¿Que esta pasando?</h1>',
                name: 'tweet',
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
