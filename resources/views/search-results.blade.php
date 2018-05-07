@extends('layout')

@section('title', 'Recherche')

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

<div class="search-product container">

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
