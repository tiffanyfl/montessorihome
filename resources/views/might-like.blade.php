<div class="also-like">
	<h3>Tu aimeras aussi</h3>
	<div class="also-like-product">
		@foreach($mightAlsoLike as $product)
		<figure>
			<a href="{{ route('shop.show', $product->slug) }}">
				<img src="{{ asset('storage/'.$product->image) }}" width="" height="" alt="{{ $product->name }}">
			</a>
			<figcaption>
				{{ $product->name }}
				{{ $product->presentPrice() }}
			</figcaption>
		</figure>
		@endforeach
	</div>
</div>