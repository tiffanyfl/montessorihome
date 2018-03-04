<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Montessori Home</title>
        <link href="https://fonts.googleapis.com/css?family=Muli|Quicksand" rel="stylesheet">

        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}

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
          bottom: 0;
        }
      }

      @media screen and (min-width: 769px) and (max-width: 991px) {
      .concept-h2{
        margin-top: 0;
      }
    }

        </style>
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-offset-3 col-md-6 text-center">
            <img src="{{URL::asset('/img/montessori-homeNB.png')}}" alt="Montessori home logo" class="logo"/>
          </div>
      </div>
        <div class="row row-concept">
          <div class="col-xs-12 col-sm-5 col-md-5 text-center">
            <img src="{{URL::asset('/storage/child.jpeg')}}" alt="" class="concept-img" />
          </div>
          <div class="col-xs-12 col-sm-7 col-md-7">
            <h2 class="concept-h2">Le concept</h2>
            <p class="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce purus mauris, luctus id elit at, vulputate vulputate magna. Sed vel pharetra velit. Phasellus quis velit sit amet augue aliquam sodales. Ut vitae ultrices lacus. Vivamus sit amet tincidunt sapien. Sed ac pulvinar ex. Aliquam in enim ipsum. Vivamus a malesuada massa. Nunc at iaculis massa, at accumsan mi. Donec feugiat dolor non mi maximus, in mollis lorem sodales. Nulla facilisi. Pellentesque ac eros ex. </p>
            <p class="text-center"><a href="#" class="btn btn-montessori">Lien Ulule</a></p>
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
    </div>
  </footer>
</body>
</html>