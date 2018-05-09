<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{URL::asset('/img/montessori-homeNB.png')}}" />

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


<body class="@yield('body-class', '')" id="page">
  <div class="container">
    <div class="row">
      <div class="col-sm-offset-0 col-sm-12 col-md-offset-3 col-md-6 text-center">
        <a href="/"><img src="{{URL::asset('/img/montessori-homeNB.png')}}" alt="Montessori home logo" class="logo"/></a>
      </div>
  </div>
  <div class="row">
    <nav class="nav--smallscreen">
        <input type="checkbox" class="menu--toggler" id="menu--toggler">
        <label for="menu--toggler" class="menu--toggler__label" >
            <span class="menu--toggler__label__text">Menu</span>
            <span class="menu--toggler__label__burger">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </label>

        <ul class="menu--mobile">
          <li><a href="/">Accueil</a></li>
          <li><a href="{{ route('shop.index') }}">Boutique</a></li>
          <li><a href="{{ route('cart.index') }}">Panier</a></li>
          <!--<span class="cart-count">{{ Cart::instance('default')->count() }}</span> -->
          @guest
          <li><a href="{{ route('register') }}">Inscription</a></li>
          <li><a href="{{ route('login') }}">Connexion</a></li>
          @else
          <li>
            <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Se déconnecter
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
          @endguest
        </ul>

    </nav>

    <nav class="nav-bar">
      <ul class="col-sm-12">
        <li><a href="/">Accueil</a></li>
        <li><a href="{{ route('shop.index') }}">Boutique</a></li>
        <li><a href="{{ route('cart.index') }}">Panier</a></li>
        <!--<span class="cart-count">{{ Cart::instance('default')->count() }}</span> -->
        @guest
        <li><a href="{{ route('register') }}">Inscription</a></li>
        <li><a href="{{ route('login') }}">Connexion</a></li>
        @else
        <li>
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Se déconnecter
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
        @endguest
      </ul>
    </nav>
  </div>
</div>

    @yield('content')

    <footer class="footer">
      <div class="container">
        <div class="col-sm-offset-3 col-sm-6 text-center footer-txt">Montessori Home - 2018</div>
      </div>
    </footer>
  @yield('extra-js')
</body>
</html>
