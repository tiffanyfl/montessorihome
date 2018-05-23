@extends('layout')

@section('title', 'La boutique')

@section('extra-css')

@endsection

@section('content')

<section class="container container-shop">

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

  @component('components.breadcrumbs')
  <a href="/">Accueil</a>
  <i class="fa fa-chevron-right breadcrumb-separator"></i>
  <span>Boutique</span>
  @endcomponent

    <!-- categories -->
    <div class="col-sm-3 category-product">
        <h2>Par Catégorie</h2>
        <ul>
            @foreach($groups as $group)
            <li><a href="{{ route('shop.index', ['group' => $group->slug]) }}">{{ $group->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <!-- list order -->
    <div class="order col-xs-12 col-sm-8">
        <div class="order-product">
            <h3>{{ $groupName }}</h3>
            <div class="price">
              <div class="bar-search">@include('partials.search')</div>
                <strong>Prix : </strong>
                <a href="{{ route('shop.index', ['group' => request()->group, 'sort' => 'low_high']) }}">Croissant</a>
                <a href="{{ route('shop.index', ['group' => request()->group, 'sort' => 'high_low']) }}">Décroissant</a>
            </div>
        </div>

        <!-- list products -->
        <div class="list-product text-center">
        @forelse($products as $product)
        <figure>
            <a href="{{ route('shop.show', $product->slug) }}">
<!--                <img src="{{ asset('storage/'.$product->image) }}" width="150" height="100" alt="{{ $product->name }}">-->
                <img src="{{ productImage($product->image) }}" width="150" height="100" alt="{{ $product->name }}">
            </a>
            <figcaption>
                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a><br>
                <p>{!! $product->description !!} <br> {{ $product->presentPrice() }}</p>
            </figcaption>
        </figure>
        @empty
        <span>Aucun produits de cette catégorie n'a été trouvé.</span>
        @endforelse
        </div>

    </div>


    <!-- pagination -->
    <div class="text-center">
        {{ $products->appends(request()->input())->links() }}
    </div>
  </section>


@endsection
