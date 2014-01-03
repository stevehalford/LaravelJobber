@extends('layouts.base')

@section('body')
    <h2>Jobs for {{ $category->name }}</h2>

    @foreach ($category->jobs()->paginate(20) as $job)
        @include('partials/job_row')
    @endforeach

    {{ $category->jobs()->paginate(20)->links() }}
@stop
