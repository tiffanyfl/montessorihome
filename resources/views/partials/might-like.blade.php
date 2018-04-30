<div class="also-like text-center">
	<h3>Vous aimerez aussi</h3>
	<div class="also-like-product">
		@foreach($mightAlsoLike as $product)
		<figure>
			<a href="{{ route('shop.show', $product->slug) }}">
				<img src="{{ productImage($product->image) }}" width="50%" alt="{{ $product->name }}">
			</a>
			<figcaption class="text-center">
				{{ $product->name }}<br>
				{{ $product->presentPrice() }}
			</figcaption>
		</figure>
		@endforeach
	</div>
</div>
