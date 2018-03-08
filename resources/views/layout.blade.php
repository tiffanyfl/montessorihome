<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{URL::asset('/storage/montessori-homeNB.png')}}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', '')</title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Muli|Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">



        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">
  <div id="page">
  <div class="container">
    <div class="row">
      <div class="col-sm-offset-3 col-md-6 text-center">
        <a href="/"><img src="{{URL::asset('/storage/montessori-homeNB.png')}}" alt="Montessori home logo" class="logo"/></a>
      </div>
  </div>
  <div class="row">
    <nav class="nav-bar">
      <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="{{ route('shop.index') }}">Boutique</a></li>
        <li><a href="{{ route('cart.index') }}">Panier</a></li>
        <li><a href="#">Inscription | Connexion</a></li>
      </ul>
    </nav>
  </div>
</div>

    @yield('content')


    @yield('extra-js')

    <footer class="footer">
      <div class="container">
        <div class="col-sm-offset-3 col-sm-6 text-center footer-txt">Montessori Home - 2018</div>
      </div>
    </footer>
  </div>
</body>
</html>
