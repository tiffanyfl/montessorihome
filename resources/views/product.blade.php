@extends('layout')

@section('title', $product->name)

@section('extra-css')

@endsection

@section('content')

<!-- if there's a error -->
<div class="container">
@if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<div class="view-product container">

  @component('components.breadcrumbs')
  <a href="/">Accueil</a>
  <i class="fa fa-chevron-right breadcrumb-separator"></i>
  <a href="{{ route('shop.index') }}">Boutique</a>
  <i class="fa fa-chevron-right breadcrumb-separator"></i>
  <span>{{ $product->name }}</span>
  @endcomponent

    <!-- main image -->
    <div class="product-image">

      <div class="just-images">

        <div class="product-image-current">
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
        <div>
            <p>{!! $product->presentPrice() !!}</p>
            <p>{!! $product->details !!}</p>
            <p>{!! $product->description !!}</p>
        </div>

          <form action="{{ route('cart.store') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <button type="submit" class="button button-plain">Ajouter au panier</button>
          </form>
        </div>

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
