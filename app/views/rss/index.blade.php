@extends('layouts.base')

@section('title', 'RSS Feeds - Design Jobs Wales')

@section('body')
    <p>Choose one of the following feeds:</p>
    <ul>
        <li><a href="{{ URL::action('RssController@feed', 'all') }}">Feed for all job categories</a></li>
        @foreach ($categories as $category)
            <li><a href="{{ URL::action('RssController@feed', $category->var_name) }}">Feed for {{$category->name}}</a></li>
        @endforeach
    </ul>    
@stop
