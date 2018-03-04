<div class="">
	<div class="container">
		<h2>Tu aimeras aussi</h2>
		<div class="">
			@foreach($mightAlsoLike as $product)
			<a href=""><img src=""></a>
			<div class="">{{ $product->name }}</div>
			<div class="">{{ $product->presentPrice() }}</div>
			@endforeach
		</div>
	</div>
</div>