<x-admin.layout title="Categories">
    <form action="{{route('admin.categories.update', compact('category'))}}"
          method="post"
          class="col-md-6">
        @csrf
        @method('put')
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
            </div>
        </div>
        <x-admin.buttons.save-delete />
    </form>
</x-admin.layout>

<x-admin.modals.delete :model="$category" />
