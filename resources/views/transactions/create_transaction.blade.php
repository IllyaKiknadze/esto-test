@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/users/transactions" method="POST" role="form" class="form-horizontal">
            @csrf

            @if($errors->any())
                @foreach($errors->getMessages() as $this_error)
                    <p style="color: red;">{{$this_error[0]}}</p>
                @endforeach
            @endif

            <div class="form-group">
                <label for="type">{{__('transactions.fields.type')}}</label>
                <select name="type_id" id="type" class="form-control">
                    @foreach($types as $typeId => $typeTitle)
                        <option value="{{$typeId}}">{{$typeTitle}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
