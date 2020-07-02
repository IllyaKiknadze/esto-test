@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{lcfirst(auth()->user()->name)}} transactions</h1>

    </div>
@endsection
