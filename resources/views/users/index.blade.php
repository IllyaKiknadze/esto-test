@extends('layouts.app')

@section('content')
    <user-latest
        :users="{{json_encode($users)}}"
        :auth-user="{{auth()->user()}}"
        :route-create-user="'{{route('users.create')}}'"></user-latest>
@endsection
