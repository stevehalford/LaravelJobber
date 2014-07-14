@extends('layouts.base')

@section('title', 'Search - Design Jobs Wales')

@section('body')
    Search results for <strong>{{ $keywords }}</strong>
    @foreach ($results as $job)
        @include('partials/job_row')
    @endforeach

    {{ $results->links() }}
@stop
