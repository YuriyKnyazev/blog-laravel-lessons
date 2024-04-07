<div id="comments" class="single-post-comm">
    <!--title-->
    <h6 id="comments-title">Comments<span>( 2 )</span></h6>
    <ul class="commentlist clearafix">
        @foreach($post->comments as $comment)
            <x-blog.comment :$comment :$post :margin="0"/>
        @endforeach
    </ul>
    <div class="clearfix"></div>
    @auth
    <div id="respond" class="clearafix">
        <h6 id="reply-title">Leave A Review</h6>
        <div class="comment-reply-form clearfix">
            <form action="{{route('comments.store')}}"
                  method="post" class="form-horizontal">
                @csrf
                <div class="comment-form-author control-group">
                    <div class="controls">
                        <input type="hidden" name="post_id" value="{{$post ->id}}">
                        <textarea id="comment" name="text" cols="50" rows="8" required
                                  aria-required="true" placeholder="Your comment here.."
                                  onclick="hideAllForms()"
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
    <!--end respond-->
</div>

<script>
    function showReplyForm(id) {
        hideAllForms()
        document.querySelector('#responseForm-' + id).hidden = false
    }
    function showEditForm(id) {
        hideAllForms()
        document.querySelector('#editForm-' + id).hidden = false
    }

    function hideAllForms() {
        let forms = document.querySelectorAll('.responseForm')
        console.log()
        forms.forEach(form => {
            form.hidden = true
        })
    }
</script>
