@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/users" method="POST" role="form" class="form-horizontal">
            @csrf

            @if($errors->any())
                @foreach($errors->getMessages() as $this_error)
                    <p style="color: red;">{{$this_error[0]}}</p>
                @endforeach
            @endif

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required
                       value="{{\Request::old('email')}}">
            </div>
            <div class="form-group">
                <label for="amount">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required
                       value="{{\Request::old('name')}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required minlength="8"
                       placeholder="********">
            </div>
            <div class="form-group custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="permissions" name="permissions" value="true">
                <label class="custom-control-label" for="permissions">Is admin user</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
