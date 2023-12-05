<h2>Items</h2>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@foreach($items as $item)
    <p>
        {{ $item->title }}
        <br>
        Description: {{ $item->description }}
        <br>
        Price: {{ $item->price }}
        <br>
        Quantity: {{ $item->quantity }}
        <br>
        SKU: {{ $item->SKU }}
        <br>
        Category: {{ $item->category->name }}
        <br>
        Picture: {{ $item->picture ?? 'N/A' }}
        <br>
        Created At: {{ $item->created_at }}
        <br>
        Updated At: {{ $item->updated_at }}
        <br>
        <a href="{{ url("/items/$item->id") }}">View</a>
        <a href="{{ url("/items/$item->id/edit") }}">Edit</a>
        <a href="{{ url("/items/$item->id/destroy") }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">Delete</a>

        <form id="delete-form-{{ $item->id }}" action="{{ url("/items/$item->id") }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </p>
@endforeach