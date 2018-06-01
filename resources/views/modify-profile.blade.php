@extends('layout')

@section('title', 'Modifier votre profil')

@section('extra-css')

@endsection

@section('content')

<section class="container container-modify-profile">
  
  <!-- if there's a error -->
  @include('partials.alert')

<h2>Modifier votre profil</h2>
  <div class="modify-profile-form">
<!-- <form action="{{ route('users.update') }}" method="PUT" id="payment-form"> -->
  {{ Form::open(['action' => ['UsersController@update', auth()->user()->id], 'method' => 'POST']) }}
<!--
-->
    {{ csrf_field() }}
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
</div>
<!-- </form> -->
</section>


@endsection
