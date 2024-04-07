<x-layouts.main>
    <section>
        <div class="container">
            <div class="section-title">
                <h3>Create Post</h3>
            </div>

            <div class="text-container fl-wrap">
                <!-- contact form -->
                <div class="contact-form-holder fl-wrap">
                    <div id="contact-form">
                        <div id="message"></div>
                        <form method="post"
                              action="{{route('posts.store')}}"
                              enctype="multipart/form-data">
                            @error('slug')
                            <p style="color: #a90707">{{$message}}</p>
                            @enderror
                            <x-category-select/>
                            <x-tag-select/>
                            <x-blog.inputs/>
                            <input type="file" name="cover" required>
                            <button type="submit" id="submit" data-top-bottom="transform: translateY(-50px);"
                                    data-bottom-top="transform: translateY(50px);"><span>Create </span></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
