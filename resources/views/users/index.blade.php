@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{lcfirst(auth()->user()->name)}} transactions</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->transactions->sum('amount')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(auth()->user()->permissions)
            <a href="{{route('users.create')}}" class="btn btn-primary stretched-link">Create user</a>
        @endif
    </div>
@endsection
