<div class="also-like">
	<h3>Vous aimerez aussi</h3>
	<div class="also-like-product">
		@foreach($mightAlsoLike as $product)
		<figure>
			<a href="{{ route('shop.show', $product->slug) }}">
				<img src="{{ productImage($product->image) }}" width="40" height="40" alt="{{ $product->name }}">
			</a>
			<figcaption>
				{{ $product->name }}
				{{ $product->presentPrice() }}
			</figcaption>
		</figure>
		@endforeach
	</div>
</div>
