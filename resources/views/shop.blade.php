@extends('common')

@section('contenu')

<div class="">
    <div class="container">
        <a href="#">Accueil</a>
        <i class="fa fa-chevron-right"></i>
        <span>Shop</span>
    </div>
</div>

<div class="">
    <div class="">
        <h3>Par Catégorie</h3>
        <ul>
            @foreach($groups as $group)
            <li><a href="{{ route('shop.index', ['group' => $group->slug]) }}">{{ $group->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="">
        <div class="">
            <h1>{{ $groupName }}</h1>
            <strong>Price</strong>
            <a href="{{ route('shop.index', ['group' => request()->group, 'sort' => 'low_high']) }}">Croissant</a>
            <a href="{{ route('shop.index', ['group' => request()->group, 'sort' => 'high_low']) }}">Décroissant</a>
        </div>
        <div class="">
        @forelse($products as $product)
        <div class="">
            <a href="{{ route('shop.show', $product->slug) }}"><img src="" alt="product"></a>
            <a href="{{ route('shop.show', $product->slug) }}"><div class="">{{ $product->name }}</div></a>
            <div class="">{{ $product->presentPrice() }}</div>
        </div>
        @empty
        <span>Aucun produits de cette catégorie n'a été trouvé.</span>
        @endforelse

        </div>

        <!-- {{ $products->links() }} -->
        {{ $products->appends(request()->input())->links() }}

    </div>
</div>

@endsection