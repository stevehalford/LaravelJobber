@extends('layouts.base')

@section('title', $job->title . ' at ' . $job->company . ' - Design Jobs Wales')
@section('description', $job->category->description)
@section('keywords', $job->category->keywords)

@section('body')
    <h2>Error</h2>
    <h3>Something went wrong. <a href="mailto:steve@inknpixel.co.uk">Email me</a> to tell me to get my act together.</h3>
@stop
