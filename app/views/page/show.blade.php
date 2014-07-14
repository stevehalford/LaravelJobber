@extends('layouts.base')

@section('title', $page->page_title)
@section('description', $page->description)
@section('keywords', $page->keywords)

@section('body')
    <h3 class="page-heading">
        {{ $page->title }}
    </h3>
    {{ $page->content }}
@stop
