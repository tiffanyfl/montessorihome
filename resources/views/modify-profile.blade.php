@extends('layout')

@section('title', 'Modifier votre profil')

@section('extra-css')

@endsection

@section('content')

<section class="container container-modify-profile">
  @if (session()->has('success_message'))
      <div class="spacer"></div>
      <div class="alert alert-success">
          {{ session()->get('success_message') }}
      </div>
  @endif

  @if(count($errors) > 0)
      <div class="spacer"></div>
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{!! $error !!}</li>
              @endforeach
          </ul>
      </div>
  @endif

<h2>Modifier votre profil</h2>

{{ Form::model($profile, array('route' => array('users.edit', $profile->id), 'method' => 'PUT')) }}
<!--<form action="{{ route('users.store') }}" method="PUT" id="payment-form">-->
    {{ csrf_field() }}
    <h2>Détails de la facture</h2>

    <div class="form-group">
        <label for="name">Nom</label>
        @if (auth()->user()->name == null)
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        @else
            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
        @endif
    </div>
    <div class="form-group">
        <label for="email">Adresse mail</label>
        @if (auth()->user()->email == null)
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        @else
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
        @endif
    </div>
    <div class="form-group">
        <label for="address">Adresse</label>
        @if (auth()->user()->address == null)
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
        @else
        <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}">
        @endif
    </div>

    <div class="half-form">
        <div class="form-group">
            <label for="city">Ville</label>
            @if (auth()->user()->city == null)
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            @else
            <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city }}">
            @endif
        </div>
    </div>

    <div class="half-form">
        <div class="form-group">
            <label for="postalcode">Code postal</label>
            @if (auth()->user()->postalcode == null)
            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}">
            @else
            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ auth()->user()->postalcode }}">
            @endif
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            @if (auth()->user()->phone == null)
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            @else
            <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}">
            @endif
        </div>
    </div>

    <button type="submit" class="btn btn-montessori">Enregistrer</button>

{{ Form::close() }}
<!--</form>-->

<p><strong>Nom</strong> : {{ auth()->user()->name }}</p>
<p><strong>Adresse mail</strong> : {{ auth()->user()->email }}</p>
<p><strong>Adresse</strong> : @if (auth()->user()->address == null) Non indiquée @else {{ auth()->user()->address }} @endif</p>
<p><strong>Code postal</strong> : @if (auth()->user()->postalcode == null) Non indiqué @else {{ auth()->user()->postalcode }} @endif</p>
<p><strong>Vile</strong> : @if (auth()->user()->city == null) Non indiquée @else {{ auth()->user()->city }} @endif</p>
<p><strong>Numéro de téléphone</strong> : @if (auth()->user()->phone == null) Non indiqué @else {{ auth()->user()->phone }} @endif</p>

<a href="{{ route('users.modify') }}" class="btn btn-montessori">Modifier mon profil</a>
</section>


@endsection
