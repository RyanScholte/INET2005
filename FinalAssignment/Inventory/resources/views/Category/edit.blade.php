<h2>Edit Category</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url("/categories/$category->id") }}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
    <br>
    <button type="submit">Update</button>
</form>