@extends('common')

@section('contenu')

<nav>
	<ul class="fil">
		<li><a href="/">Accueil</a></li>
		<li><a href="{{ route('shop.index') }}">Shop</a></li>
		<li>{{ $product->name }}</li>
	</ul>
</nav>

<div class="view-product text-center">
	<h2>{{ $product->name }}</h2>
    <div class="product-view">
        <img src="{{ productImage($product->image) }}" width="250" height="200" alt="{{ $product->name }}">

        @if ($product->images)
        @foreach (json_decode($product->images, true) as $image)
            <div class="product-view-image">
                <img src="{{ productImage($image) }}" width="50" height="50" alt="product">
            </div>
            @endforeach
        @endif
       
    </div>
	<div class="">
        <p>{!! $product->details !!}</p>
        <p>{!! $product->presentPrice() !!}</p>
        <p>{!! $product->description !!}</p>
    </div>

</div>

@include('might-like')

@endsection