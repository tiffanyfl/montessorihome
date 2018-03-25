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

@component('components.breadcrumbs')
    <a href="/">Accueil</a>
    <i class="fa fa-chevron-right breadcrumb-separator"></i>
    <span>Recherche</span>
@endcomponent

<div class="search-product container">
    <h1>Résultats de la recherche</h1>
    <p>{{ $products->total() }} résultat(s) pour "{{ request()->input('query') }}"</p>

    <table class="table table-bordered table-striped">
      <thead>
          <tr>
              <th>Nom</th>
              <th>Details</th>
              <th>Description</th>
              <th>Prix</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($products as $product)
              <tr>
                  <th><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></th>
                  <td>{{ $product->details }}</td>
                  <td>{{ str_limit($product->description, 80) }}</td>
                  <td>{{ $product->presentPrice() }}</td>
              </tr>
          @endforeach
      </tbody>
    </table>

    <!-- pagination -->
    <div class="text-center">
        {{ $products->appends(request()->input())->links() }}
    </div>
</div>

@endsection

@section('extra-js')
@endsection
