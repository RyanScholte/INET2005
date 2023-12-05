<h2>{{ $item->title }}</h2>
<p>Description: {{ $item->description }}</p>
<p>Price: {{ $item->price }}</p>
<p>Quantity: {{ $item->quantity }}</p>
<p>SKU: {{ $item->SKU }}</p>
<p>Category: {{ $item->category->name }}</p>
<p>Picture: {{ $item->picture ?? 'N/A' }}</p>
<p>Created At: {{ $item->created_at }}</p>
<p>Updated At: {{ $item->updated_at }}</p>