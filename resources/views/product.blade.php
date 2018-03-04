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

    <form action="{{ route('cart.store') }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $product->id }}">
      <input type="hidden" name="name" value="{{ $product->name }}">
      <input type="hidden" name="price" value="{{ $product->price }}">
      <button type="submit" class="button button-plain">Add to Cart</button>
    </form>

	</div>
</div>

@include('might-like')

@endsection
