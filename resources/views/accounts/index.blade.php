@extends('app')

@section('content')
    <h1>Contas</h1>
    <a href="/accounts/create">Criar nova conta</a>
    @foreach($accounts as $account)
        <h1><a href="{{ url('/accounts', [$account->id]) }}">Conta #{{ $account->id }}</a></h1>
        <h2>Total: R$ {{$account->total}}</h2>
        <a href="" onclick='confirmDelete("/accounts/{{$account->id}}")'>Remover</a>
        <br/>
        <br/>
    @endforeach
@stop
