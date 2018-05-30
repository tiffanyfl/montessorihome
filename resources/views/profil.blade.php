@extends('layout')

@section('title', 'Profil')

@section('extra-css')

@endsection

@section('content')

<section class="container container-profil">

<h1>Bonjour {{ auth()->user()->name }}</h1>

<p><strong>Nom</strong> : {{ auth()->user()->name }}</p>
<p><strong>Adresse mail</strong> : {{ auth()->user()->email }}</p>
<p><strong>Adresse</strong> : @if (auth()->user()->address == null) Non indiquée @else {{ auth()->user()->address }} @endif</p>
<p><strong>Code postal</strong> : @if (auth()->user()->postalcode == null) Non indiqué @else {{ auth()->user()->postalcode }} @endif</p>
<p><strong>Vile</strong> : @if (auth()->user()->city == null) Non indiquée @else {{ auth()->user()->city }} @endif</p>
<p><strong>Numéro de téléphone</strong> : @if (auth()->user()->phone == null) Non indiqué @else {{ auth()->user()->phone }} @endif</p>

<a href="{{ route('users.modify-profile') }}" class="btn btn-montessori">Modifier mon profil</a>
</section>


@endsection
