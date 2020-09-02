@extends('master')

@section('content')
@include('message-block')
    <section class="row new-post">
        <div class="col-md-6  col-md-offset-3">
            <header><h3>what's new?</h3></header>
            <form action="{{ route('post.create')}}" method ="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" cols="30" rows="10" placeholder="your post here"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">share post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    <section class="row-posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>what others say</h3></header>
            @foreach ($posts as $post)
            <article class="post" data-postid='{{$post->id}}'>
                <p>{{ $post->body }}</p>
                <div class="info">
                    @if(Auth::user() == $post->user)
                    Posted by Me on {{ $post->created_at}}
                    @else 
                    Posted by {{ $post->user->name }} on {{ $post->created_at}}
                    @endif

                </div>
                <div class="interaction">
                    <a href="">Like</a> |
                    <a href="">dislike</a> 
                    @if(Auth::user() == $post->user)
                    |
                    <a href="" class="edit">edit</a> |
                    <a href="{{route('post.delete', ['post_id' => $post->id])}}">delete</a>
                    @endif()
                </div>
            </article>
            @endforeach
            
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';
    </script>
@endsection