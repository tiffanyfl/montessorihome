@extends('template')
@section('formnewletter')
  {!! Form::open(['url' => '/']) !!}
    <div class="form-group form-inline text-center{!! $errors->has('email') ? 'has-error' : '' !!}">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
            {!! Form::submit('Envoyer !', ['class' => 'btn btn-montessori pull-center']) !!}
    </div>
    {!! Form::close() !!}
@endsection
