@extends('layouts.base')

@section('body')
    <h2>Jobs for {{ $category->name }}</h2>

    @foreach ($category->jobs()->paginate(20) as $job)
        <div class="row">
            <span class="row-info">
                <img src="http://www.designjobswales.co.uk/_templates/djw/img/icon-{{ $job->type->var_name }}.png" alt="{{ $job->type->name }}">
                <a href="{{ Config::get('app.url') }}/job/{{ $job->id }}" title="{{ $job->title }}">
                    {{ $job->title }}
                </a>
                <span class="la">at</span>
                {{ $job->company }}
                @if ($job->city)
                    <span class="la">in</span>
                    {{ $job->city->name }}
                @else
                    , Anywhere
                @endif
            </span>
            <span class="time-posted">
                <img src="http://www.designjobswales.co.uk/_templates/djw/img/clock.gif" alt="">
                {{ date('d-m-Y', strtotime($job->created_on)) }}
            </span>
        </div>
    @endforeach

    {{ $category->jobs()->paginate(20)->links() }}
@stop
