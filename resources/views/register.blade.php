@extends('layouts.master')

@section('content')
    <form action="{{ route('account.store') }}" method="POST">
        @csrf
        @include('layouts.partials.forms.registration_form')
    </form>
@endsection
