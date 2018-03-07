<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel Ecommerce | @yield('title', '')</title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Muli|Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        <style>

        textarea { resize: none; }
        body{
          font-family: 'Muli', sans-serif;
          margin: 0 auto;
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

        .concept-img {
          width: 90%;
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

        .footer {
          background-color: #93D3D2;
          position: absolute;
          width: 100%;
          height: 60px;
        }

        .footer-txt {
          padding-top: 15px;
          color: #fff;
        }

        @media screen and (min-width: 769px) {
        .footer {
          /*bottom: 0;*/
        }
      }

      @media screen and (min-width: 769px) and (max-width: 991px) {
      .concept-h2{
        margin-top: 0;
      }
    }

        </style>

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">

    @yield('content')


    @yield('extra-js')

    <footer class="footer">
      <div class="container">
        <div class="col-sm-offset-3 col-sm-6 text-center footer-txt">Montessori Home - 2018</div>
      </div>
    </footer>
</body>
</html>
