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

        /*SHOP, PRODUCT AND ALSO-LIKE*/
        .fil, .also-like-product{
          display: flex;
          flex-direction: row;
        }
        .fil a{
          color: #93D3D2;
        }
        ul li{
          list-style: none;
        }
        ul li a{
          color: #000;
        }
            
        /*shop page*/
        .category-product{
          border-right: 1px solid gray;
        }
        .list-product, .order-product{
          display: flex;
          flex-direction: row;
          justify-content: space-between;
        }
        
        /*product page*/
        .view-product {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 50px;
        }
        .selected {
            border: 1px solid #93D3D2;
        }
        .product-multiple-images{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            margin-top: 20px;
        }
            
        .product-section-thumbnail {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid lightgray;
            min-height: 60px;
            cursor: pointer;
        }
            
        .product-section-thumbnail:hover {
            border: 1px solid gray;
        }
            
        .view-product .selected {
            border: 1px solid gray;
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
    </head>
    <body>
        <div class="container">
            
            @yield('contenu')
            
            @yield('extra-js')
            
        </div>
  <footer class="footer">
    <div class="container">
      <div class="col-sm-offset-3 col-sm-6 text-center footer-txt">Montessori Home - 2018</div>
    </div>
  </footer>
</body>
</html>