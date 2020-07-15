@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="list-group">
                        <a class="list-group-item" href="{{ route('users.latest') }}">
                            {{ __('users.latest') }}
                        </a>
                        @if(auth()->user() && auth()->user()->permissions)
                            <a class="list-group-item" href="{{ route('users.create') }}">
                                {{ __('users.create') }}
                            </a>
                        @endif
                        <a class="list-group-item" href="{{ route('transactions.index') }}">
                            {{ __('transactions.list') }}
                        </a>

                        <a class="list-group-item" href="{{ route('transactions.create') }}">
                            {{ __('transactions.create') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
@endsection
