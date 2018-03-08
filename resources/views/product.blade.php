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
	<img src="{{ asset('storage/'.$product->image) }}" alt="product">
	<div class="">{{ $product->details }}
	{{ $product->presentPrice() }}</div>
	<p>{!! $product->description !!}</p>

</div>

@include('might-like')

@endsection