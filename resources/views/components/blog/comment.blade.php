<li class="comment" style="float: none; margin-left: {{$margin  }}px">
    <div class="comment-body">
        <div class="comment-author">
            <img alt='' src='{{asset('images/blog/users/1.jpg')}}' width="50" height="50">
        </div>
        <cite class="fn"><a href="#">{{$comment->user->name}}</a></cite>
        <div class="comment-meta">
            @auth
            <h6><a href="#">{{$comment->created_at->diffForHumans()}}</a> /
                <span class='comment-reply-link' style="cursor: pointer"
                     onclick="showReplyForm('{{$comment->id}}')">Reply</span>@can('commentOwner', $comment) /
                <span class='comment-reply-link' style="cursor: pointer"
                      onclick="showEditForm('{{$comment->id}}')">Edit</span> /
                <span class='comment-reply-link' style="cursor: pointer"
                      onclick="document.querySelector('#deleteComment-{{$comment->id}}').submit()"
                >Delete</span>@endcan
            </h6>
            @endauth
        </div>
        <p>{{$comment->text}}</p>
    </div>
    @auth
    <form action="{{ route ('comments.destroy', compact('comment')) }}"
          id="deleteComment-{{$comment->id}}"
          method="post">
        @csrf
        @method('delete')
    </form>
    <div id="editForm-{{$comment->id}}" class="clearafix responseForm" hidden>
        <div class="comment-reply-form clearfix">
            <form action="{{ route('comments.update', compact('comment')) }}"
                  method="post" class="form-horizontal">
                @csrf
                @method('put')
                <div class="comment-form-author control-group">
                    <div class="controls">
                        <input type="hidden" name="comment_id" value="{{$comment ->id}}">
                        <textarea id="comment" name="text" cols="50" rows="4" required
                                  aria-required="true"
                        >{{$comment->text}}</textarea>
                    </div>
                </div>
                <div class="form-submit">
                    <div class="controls">
                        <button class="transition button" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="responseForm-{{$comment->id}}" class="clearafix responseForm" hidden>
        <div class="comment-reply-form clearfix">
            <form action="{{route('comments.store')}}"
                  method="post" class="form-horizontal">
                @csrf
                <div class="comment-form-author control-group">
                    <div class="controls">
                        <input type="hidden" name="post_id" value="{{$post ->id}}">
                        <input type="hidden" name="comment_id" value="{{$comment ->id}}">
                        <textarea id="comment" name="text" cols="50" rows="4" required
                                  aria-required="true" placeholder="Your comment here.."
                        ></textarea>
                    </div>
                </div>
                <div class="form-submit">
                    <div class="controls">
                        <button class="transition button" type="submit">Post Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endauth
</li>
@foreach($comment->comments as $comment)
    <x-blog.comment :$comment :$post :margin="$margin + 60"/>
@endforeach

