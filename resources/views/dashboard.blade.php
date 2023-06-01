@extends('layouts.master')

@section('content')
    <div class="col-md-6 offset-md-4">
        <a href="{{ route('account.withdraw') }}" class="btn btn-link">
            I need Cash
        </a>
         <a href="{{ route('account.deposit') }}" class="btn btn-link">
            Fatten my account
        </a>
    </div>

@endsection

