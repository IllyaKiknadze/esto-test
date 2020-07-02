@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Latest users</h1>
        @if($users)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->transactions->where('type.title','debit')->sum('amount')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        @if(auth()->user() && auth()->user()->permissions)
            <a href="{{route('users.create')}}" class="btn btn-primary stretched-link">Create user</a>
        @endif
    </div>
@endsection
