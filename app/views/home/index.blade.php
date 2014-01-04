@extends('layouts.base')

@section('body')
    <h2>Most recent jobs</h2>
    @foreach ($recents as $job)
        @include('partials/job_row')
    @endforeach

    <br/>
    <h2>Most applied to jobs</h2>
    @foreach ($popular as $job)
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
                    @if ($job->outside_location)
                        - {{ $job->outside_location }}
                    @else
                        - Anywhere
                    @endif
                @endif
            </span>
            <span class="time-posted">
                <strong>{{ $job->apply_count }}</strong>
                applications
            </span>
        </div>
    @endforeach
@stop
