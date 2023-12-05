<h2>Delete Item</h2>

<p>Are you sure you want to delete the item "{{ $item->title }}"?</p>

<form action="{{ url("/items/$item->id") }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Yes, Delete</button>
</form>

<a href="{{ url('/items') }}">Cancel</a>