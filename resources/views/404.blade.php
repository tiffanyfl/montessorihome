@extends('layout')

@section('title', 'Erreur')

@section('extra-css')

@endsection

@section('content')

  <div class="container container-404">

    <!-- page doesn't exit -->
      @component('components.breadcrumbs')
      <a href="/">Accueil</a>
      <i class="fa fa-chevron-right breadcrumb-separator"></i>
      <span>Erreur 404</span>
      @endcomponent<!-- end breadcrumbs -->
      
    <h2>Erreur 404</h2>
    <p>La page demandée n'existe pas ! :(</p>
  </div>

@section('extra-js')
@endsection


@endsection
