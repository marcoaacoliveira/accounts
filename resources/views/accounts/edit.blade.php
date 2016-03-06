@extends('app')

@section('content')

    {!! Form::model($account,['method'=>'PATCH','action'=>['AccountsController@update', 'account'=>$account->id]]) !!}
        @include('accounts._form',["submitText"=>"Editar"])
    {!! Form::close() !!}
    @include('errors.list')
@stop
