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
    
    <!-- main image -->
    <div class="product-image">
        <h2>{{ $product->name }}</h2>
        <img src="{{ productImage($product->image) }}" width="250" height="200" alt="{{ $product->name }}" class="active" id="currentImage">

        <!-- others images -->
        <div class="product-multiple-images">
        @if ($product->images)
        @foreach (json_decode($product->images, true) as $image)
            <div class="product-section-thumbnail selected">
                <img src="{{ productImage($image) }}" width="50" height="50" alt="{{ $product->name }}">
            </div>
            @endforeach
        @endif
        </div>
       
    </div>
    
    <!-- details -->
	<div class="product-detail">
        <p>{!! $product->details !!}</p>
        <p>{!! $product->presentPrice() !!}</p>
        <p>{!! $product->description !!}</p>
    </div>

</div>


@include('might-like')

@endsection

@section('extra-js')
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');
            
            images.forEach((element) => element.addEventListener('click', thumbnailClick));
            
            function thumbnailClick(e) {
                currentImage.classList.remove('active');
                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })
                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }
        })();
    </script>
@endsection