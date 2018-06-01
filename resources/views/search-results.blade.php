@extends('layout')

@section('title', 'Recherche')

@section('extra-css')

@endsection

@section('content')


<div class="search-product container">

  <!-- if there's a error -->
  @include('partials.alert')

  @component('components.breadcrumbs')
      <a href="/">Accueil</a>
      <i class="fa fa-chevron-right breadcrumb-separator"></i>
      <span>Recherche</span>
  @endcomponent


    <h1>Résultats de la recherche</h1>
    <p>{{ $products->total() }} résultat(s) pour "{{ request()->input('query') }}"</p>

    <section class="search-product-result text-center">
      @foreach ($products as $product)
        <figure>
            <a href="{{ route('shop.show', $product->slug) }}">
              <img src="{{ productImage($product->image) }}" width="150" height="100" alt="{{ $product->name }}">
            </a>
            <figcaption>
              <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a><br>
              <p>{{ str_limit($product->description, 80) }} <br> {{ $product->presentPrice() }}</p>
            </figcaption>
        </figure>
      @endforeach
    </section>

    <!-- pagination -->
    <div class="text-center">
        {{ $products->appends(request()->input())->links() }}
    </div>
</div>

@endsection

@section('extra-js')
@endsection
