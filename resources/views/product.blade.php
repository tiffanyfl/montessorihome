@extends('layout')

@section('title', $product->name)

@section('extra-css')

@endsection

@section('content')

<div class="breadcrumbs">
		<div class="container">
				<a href="/">Accueil</a>
				<i class="fa fa-chevron-right breadcrumb-separator"></i>
				<a href="{{ route('shop.index') }}">Boutique</a>
				<i class="fa fa-chevron-right breadcrumb-separator"></i>
				<span>{{ $product->name }}</span>
		</div>
</div> <!-- end breadcrumbs -->

<div class="view-product container">

    <!-- main image -->
    <div class="product-image">
        <div class="">
            <h2>{{ $product->name }}</h2>
            <img src="{{ productImage($product->image) }}" width="250" height="200" alt="{{ $product->name }}" class="active" id="currentImage">
        </div>

        <!-- others images -->
        <div class="product-multiple-images">
            <div class="product-section-thumbnail selected">
                <img src="{{ productImage($product->image) }}" width="50" height="50" alt="{{ $product->name }}">
            </div>

            @if ($product->images)
            @foreach (json_decode($product->images, true) as $image)
                <div class="product-section-thumbnail">
                    <img src="{{ productImage($image) }}" width="50" height="50" alt="{{ $product->name }}">
                </div>
                @endforeach
            @endif
        </div>

    </div>

    <!-- details -->
	<div class="product-detail">
				<p>{!! $product->presentPrice() !!}</p>
        <p>{!! $product->details !!}</p>
        <p>{!! $product->description !!}</p>

				<form action="{{ route('cart.store') }}" method="POST">
		      {{ csrf_field() }}
		      <input type="hidden" name="id" value="{{ $product->id }}">
		      <input type="hidden" name="name" value="{{ $product->name }}">
		      <input type="hidden" name="price" value="{{ $product->price }}">
		      <button type="submit" class="button button-plain">Ajouter au panier</button>
		    </form>
    </div>

</div>


@include('partials.might-like')

@endsection

@section('extra-js')
    <script>
        //move and images selection
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');

            images.forEach((element) => element.addEventListener('click', thumbnailClick));

            function thumbnailClick(e) {
                currentImage.classList.remove('active');
                // currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                // })
                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }
        })();
    </script>
@endsection
