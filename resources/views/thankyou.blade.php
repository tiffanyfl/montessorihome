@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="container thank-you-section">
       <h1>Merci pour votre commande !</h1>
       <div class="spacer"></div><br>
       <div>
           <a href="{{ url('/') }}" class="btn btn-montessori">Retour à l'accueil</a>
       </div>
   </div>




@endsection
