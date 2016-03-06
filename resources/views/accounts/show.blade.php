@extends('app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Successo!</strong> {{session('success')}}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{session('error')}}
        </div>
    @endif
    <h1>ID: {{$account->id}}</h1>
    <h2>Total: {{$account->total}}</h2>
    <hr>
    <h2>Lançamentos</h2>
    <a class="btn btn-primary" href="/charges/{{$account->id}}">Adicionar novo lançamento</a>
    <table class="table">
        <thead>
        <tr>
            <td>
                Descrição
            </td>
            <td>
                Valor restante
            </td>
            <td>
                Controles
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($charges as $charge)
            <tr>
                <td>
                    {{$charge->description}}
                </td>
                <td>
                    R$ {{$charge->getTotal()}}
                </td>
                <td>
                    <a href='/charges/{{$account->id}}/show/{{$charge->id}}'>Ver</a>
                    <a href="" onclick='confirmDelete("/charges/{{$charge->id}}")'>Remover</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
