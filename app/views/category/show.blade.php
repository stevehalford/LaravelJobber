@extends('layouts.base')

@section('title', $category->title)
@section('description', $category->description)
@section('keywords', $category->keywords)

@section('body')
    <div class="job-listings">
        <div id="sort-by-type">
            Only display
            @foreach ($types as $type)
                <a href="{{Config::get('app.url')}}/jobs/web-design/{{$type->var_name}}/" title="{{$category->name}} {{$type->name}}">
                    <img src="{{Config::get('app.url')}}/img/icon-{{$type->var_name}}.png" alt="{{$type->name}}">
                </a>
            @endforeach
        </div>
        <h2>Jobs for {{ $category->name }}</h2>

        @foreach ($jobs as $job)
            @include('partials/job_row')
        @endforeach

        {{ $jobs->links() }}
    </div>
@stop
