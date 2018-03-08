@extends('layout')

@section('title', 'La boutique')

@section('extra-css')

@endsection

@section('content')

<div class="breadcrumbs">
		<div class="container">
				<a href="/">Accueil</a>
				<i class="fa fa-chevron-right breadcrumb-separator"></i>
				<span>Boutique</span>
		</div>
</div> <!-- end breadcrumbs -->

<section class="container container-shop">

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
    <div class="col-sm-8">
        <div class="order-product">
            <h3>{{ $groupName }}</h3>
            <div class="price">
                <strong>Prix : </strong>
                <a href="{{ route('shop.index', ['group' => request()->group, 'sort' => 'low_high']) }}">Croissant</a>
                <a href="{{ route('shop.index', ['group' => request()->group, 'sort' => 'high_low']) }}">Décroissant</a>
            </div>
        </div>

        <!-- list products -->
        <div class="list-product">
        @forelse($products as $product)
        <figure>
            <a href="{{ route('shop.show', $product->slug) }}">
<!--                <img src="{{ asset('storage/'.$product->image) }}" width="150" height="100" alt="{{ $product->name }}">-->
                <img src="{{ productImage($product->image) }}" width="150" height="100" alt="{{ $product->name }}">
            </a>
            <figcaption>
                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                {!! $product->description !!} {{ $product->presentPrice() }}
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
