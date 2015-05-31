@extends('layouts.base')

@section('title', 'Page Not Found - Design Jobs Wales')

@section('body')
    <h2>Page Not Found</h2>
    <h3>It seems the page you're looking is no longer here. Try going to <a href="{{ Config::get('app.url') }}">{{ Config::get('app.url') }}</a> and using the Search function.</h3>
@stop
