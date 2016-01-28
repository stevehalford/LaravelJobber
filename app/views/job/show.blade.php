@extends('layouts.base')

@section('title', $job->title . ' at ' . $job->company . ' - Design Jobs Wales')
@section('description', $job->category->description)
@section('keywords', $job->category->keywords)

@section('body')

    <div id="job-details">
        <div id="applied-to-job">
            @if ($job->apply_count)
                {{ $job->apply_count }}
            @else
                0
            @endif
            @if ($job->apply_count == 1)
                <p>applicant</p>
            @else
                <p>applicants</p>
            @endif
        </div>
        <h2>
            {{ $job->title }}
        </h2>
        <p>
            <img src="http://www.designjobswales.co.uk/_templates/djw/img/icon-{{ $job->type->var_name }}.png" alt="{{ $job->type->name }}">
            <a href="http://{{ $job->url }}">{{ $job->company }}</a>
            @if ($job->city)
                <span class="fading">in</span> <strong>{{ $job->city->name }}</strong>
            @else
                @if ($job->outside_location)
                    - {{ $job->outside_location }}
                @else
                    - Anywhere
                @endif
            @endif
        </p>

        <div id="job-description">
            {{ Markdown::parse($job->description) }}
        </div>
        <br>

        @if ( $isOldJob )
            <div class="alert alert-error alert-block">
                Warning! This job was posted {{ $job->created_on->diffForHumans() }}. Please consider this when applying.
            </div>
        @endif

        @if ($job->apply_online)
            <div id="apply_online_now"><a href="#" onclick="$('#apply-online').toggle(); window.location.href = '#apply'; return false;">» Apply now</a></div>

            @include('partials/apply')
        @endif

        <br>

        @include('partials/social')

    </div><!-- #job-details -->

    <div id="job-bottom">
        <div id="job-post-utils">
            <a href="{{ Config::get('app.url') }}/jobs/{{ $job->category->var_name }}/" title="category home">« Go back to category</a><br>
        </div><!-- #job-post-utils -->
        <div id="number-views">
            Published at <strong>{{ date('d-m-Y', strtotime($job->created_on)) }}</strong><br>
            Viewed: <strong>{{ $job->views_count }}</strong> times
        </div><!-- #number-views -->
        <div class="clear"></div>
    </div><!-- #job-bottom -->
@stop
