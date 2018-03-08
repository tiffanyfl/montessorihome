@extends('layout')

@section('title', 'Erreur')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Accueil</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Erreur 404</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="container container-404">
      <h2>Erreur 404</h2>
      <p>La page demandée n'existe pas ! :(</p>
    </div>

@section('extra-js')
@endsection


@endsection
