@extends('layouts.base')

@section('body')
    <h2>Most recent jobs</h2>
    @foreach ($recents as $job)
        @include('partials/job_row')
    @endforeach

    <br/>
    <h2>Most applied to jobs</h2>
    @foreach ($popular as $job)
        @include('partials/job_row', array('apply_count' => true))
    @endforeach
@stop
