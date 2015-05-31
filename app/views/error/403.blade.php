@extends('layouts.base')

@section('title', $job->title . ' at ' . $job->company . ' - Design Jobs Wales')
@section('description', $job->category->description)
@section('keywords', $job->category->keywords)

@section('body')
    <h2>Forbidden</h2>
    <h3>It seems you're not allowed to view this page, if you think you should be able to then <a href="mailto:steve@inknpixel.co.uk">email me</a>.</h3>
@stop
