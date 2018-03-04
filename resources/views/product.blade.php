@extends('common')

@section('contenu')

<div class="">
    <div class="container">
        <a href="/">Accueil</a>
        <i class="fa fa-chevron-right"></i>
        <a href="{{ route('shop.index') }}">Shop</a>
        <i class="fa fa-chevron-right"></i>
        <span>{{ $product->name }}</span>
    </div>
</div>

<div class="">
	<div class="">
		<img src="" alt="product">
	</div>
	<div class="">
		<h1>{{ $product->name }}</h1>
		<div class="">{{ $product->details }}</div>
		<div class="">{{ $product->presentPrice() }}</div>
		<p>{{ $product->description }}</p>

	</div>
</div>

@include('might-like')

@endsection