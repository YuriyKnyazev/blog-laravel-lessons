<x-layouts.main>
    <section>
        <div class="container">
            <div class="section-title">
                <h3>Edit Post</h3>
            </div>
            <div class="text-container fl-wrap">
                <!-- contact form -->
                <div class="contact-form-holder fl-wrap">
                    <div id="contact-form">
                        <div id="message"></div>
                        <form method="post"
                              action="{{route('posts.update', compact('post'))}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <x-category-select :id="$post->category_id"/>
                            <x-tag-select :current="$post->tags"/>

                            @csrf
                            <input name="id" type="hidden" id="id"
                                   value="{{$post->id}}">
                            <input name="slug" type="text" id="slug"
                                   value="{{old('slug', $post->slug ?? '')}}" placeholder="SLUG">
                            @error('slug')
                            <p style="color: #a90707">{{$message}}</p>
                            @enderror

                            <x-blog.inputs :post="$post"/>
                            <input type="file" name="cover">
                            <img src="{{asset($post->cover)}}" alt="" height="400">
                            <button type="submit" id="submit" data-top-bottom="transform: translateY(-50px);"
                                    data-bottom-top="transform: translateY(50px);"><span>Save </span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
