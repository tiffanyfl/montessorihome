<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{URL::asset('/img/montessori-homeNB.png')}}" />
        <title>Montessori Home</title>
        <link href="https://fonts.googleapis.com/css?family=Muli|Quicksand" rel="stylesheet">

        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!--[if lt IE 9]>
            {{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
            {{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
        <![endif]-->
        <style>

        textarea { resize: none; }
        body{
          font-family: 'Muli', sans-serif;
          }

        h1, h2, h3 {
          font-family: 'Quicksand', sans-serif;
          color: #93D3D2;
        }
        .logo {
          margin-top: 2vh;
          margin-bottom: 7vh;
          width: 22%;
        }

        .row-concept {
          margin-bottom: 5vh;
        }


        .btn-montessori {
          background-color: #93D3D2;
          color: #fff;
          font-family: 'Quicksand', sans-serif;
        }

        .row-newsletter {
          margin-bottom: 50px;
        }

        .confirm{
          margin-top: 30px;
        }

      @media screen and (min-width: 769px) and (max-width: 991px) {
      .concept-h2{
        margin-top: 0;
      }
    }

        </style>
    </head>
    <body id="page">

        <div class="container">
          <div class="row">
            <div class="col-sm-offset-3 col-md-6 text-center">
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
                <li><a href="{{ route('users.index') }}">Profil</a></li>
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
              <li><a href="{{ route('users.index') }}">Profil</a></li>
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
      <div class="container">
        <div class="row row-concept">
          <div class="col-xs-12 col-sm-5 col-md-5 text-center">
            <img src="{{URL::asset('/img/s-habiller-seul-06.jpg')}}" alt="" class="concept-img" />
          </div>
          <div class="col-xs-12 col-sm-7 col-md-7">
            <h2 class="concept-h2">Le concept</h2>
            <p class="justify">Montessori Home est une boutique française de matériel et de mobilier destinés à l’aménagement de l’environnement de l’enfant selon les principes de la pédagogie Montessori.
              <br>
              Tous nos produits sont de fabrication française conçus pour <strong>accroître l’autonomie de l’enfant</strong> au quotidien et, ce faisant, <strong>renforcer considérablement sa confiance en lui-même</strong>. </p>
            <p class="text-center"><a href="/404" class="btn btn-montessori">Lien Ulule</a></p>
          </div>
        </div>
        <div class="row row-newsletter">
        <div class="col-sm-offset-3 col-sm-6">
          <h2 class="text-center">Être tenu au courant</h2>
          @yield('formnewletter')
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="col-sm-offset-3 col-sm-6 text-center footer-txt">Montessori Home - 2018</div>
      <div class="col-sm-offset-3 col-sm-6 text-center footer-txt"><a href="{{ route('mentions-legales') }}">Mentions légales</a> - <a href="{{ route('cgv') }}">Conditions générales de vente</a></div>
    </div>
  </footer>

</body>
</html>
