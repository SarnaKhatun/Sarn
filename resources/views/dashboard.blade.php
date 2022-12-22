@extends('layout.app')
@section('title')
   Dashboard
@endsection
@section('body')
    @include('navigation')
    <h1>{{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
@endsection
