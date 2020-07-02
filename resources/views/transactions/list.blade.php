@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{lcfirst(auth()->user()->name)}} transactions</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('transactions.fields.type')}}</th>
                <th scope="col">{{__('transactions.fields.amount')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <div></div>
                <tr>
                    <th scope="row">{{$transaction->id}}</th>
                    <td>{{$transaction->type->title}}</td>
                    <td>{{$transaction->amount}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{route('transactions.create')}}" class="btn btn-primary stretched-link">Create transaction</a>
    </div>
@endsection
