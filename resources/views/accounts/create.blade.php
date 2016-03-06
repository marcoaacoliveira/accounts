@extends('app')

@section('content')
    <h1>Adicionar nova conta</h1>
    <hr/>

    {!! Form::open(['url'=>'accounts', 'method'=>'post']) !!}
        @include('accounts._form',["submitText"=>"Salvar"])
    {!! Form::close() !!}
    @include('errors.list')
@stop
