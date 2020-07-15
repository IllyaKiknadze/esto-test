@extends('layouts.app')

@section('content')
    <latest
        :users="{{json_encode($users)}}"
        :auth-user="{{auth()->user()}}"
        :route-create-user="'{{route('users.create')}}'"></latest>
@endsection
