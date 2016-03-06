@extends('app')

@section('content')
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
                Valor total
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
                    <a href="" onclick='confirmDelete("/accounts/{{$charge->id}}")'>Remover</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
