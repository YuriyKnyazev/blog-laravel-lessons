<div>
    <label for="">Category</label>
    <select name="category_id">
        @foreach($categories as $category)
            <option
            @selected(($currentId === $category->id))
            value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
