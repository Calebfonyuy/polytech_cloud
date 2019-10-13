@extends('layouts.default')

@if (Auth::check())
    @section('header')
        @include('partials.inside_header')
    @endsection
@else
    @section('header')
        @include('partials.default_header',['state'=>0])
    @endsection
@endif