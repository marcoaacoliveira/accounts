@extends('app')

@section('content')
    {!! Form::open(['url'=>'charges/'.$account, 'method'=>'post']) !!}
        @include('charges._form',["submitText"=>"Salvar"])
    {!! Form::close() !!}
    @include('errors.list')
@stop