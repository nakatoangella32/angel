@extends('layouts.master')

@section('content')
<form action="{{ route('deposit') }}" method="POST">
    @csrf
    <div class="form-group row">
        <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
        <div class="col-md-6">
            <input type="number" min="1" id="amount" class="form-control" 
            name="amount" required autocomplete="off" >
        </div>
    </div>

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Deposit
        </button>
        <a href="{{ route('account.withdraw') }}" class="btn btn-link">
            Withdraw from my account instead
        </a>
    </div>
</form>


@endsection

