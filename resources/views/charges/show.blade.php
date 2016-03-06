@extends('app')

@section('content')
    <h1>Lançamento {{$charge->id}}</h1>
    <p>Referente a: {{$charge->description}}</p>
    <table class="table">
        <thead>
            <tr>
                <td>Valor</td>
                <td>Paga?</td>
                <td>Controle</td>
            </tr>
        </thead>
        <tbody>
            @foreach($installments as $installment)
                <tr>
                    <td>R$ {{$installment['value']}}</td>
                    @if($installment['paid']==0)
                        <td>Não</td>
                    @else
                        <td>Sim</td>
                    @endif
                    @if($installment['paid']==0 && $charge->type==0) <td><a href="/installments/{{$installment['id']}}/pay">Marcar como recebida</a></td> @endif
                    @if($installment['paid']==0 && $charge->type==1) <td><a href="/installments/{{$installment['id']}}/pay">Marcar como paga</a></td> @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@stop