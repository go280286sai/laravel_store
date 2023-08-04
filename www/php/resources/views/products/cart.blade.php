@extends('layouts.layout')

@section('content')
    @if(!\Illuminate\Support\Facades\Auth::check())
        @include('auth.login_form')
    @else
        <p>Все норм</p>
    @endif
@endsection
