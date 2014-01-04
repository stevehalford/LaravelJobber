@extends('layouts.base')

@section('body')
    <div id="job-details">
        <div id="applied-to-job">
            {{ $job->apply_count }}
            @if ($job->apply_count == 1)
                <p>applicant</p>
            @else
                <p>applicants</p>
            @endif
        </div>
        <h2>
            <img src="http://www.designjobswales.co.uk/_templates/djw/img/icon-{{ $job->type->var_name }}.png" alt="{{ $job->type->name }}">
            {{ $job->title }}
        </h2>
        <p>
            <span class="fading">at</span>
            <a href="http://{{ $job->url }}">{{ $job->company }}</a>
            <span class="fading">in</span> <strong>{{ $job->city->name }}</strong>
        </p>

        <div id="job-description">
            {{ nl2br($job->description) }}
        </div>
        <br>

        @if ($job->apply_online)
            <div id="apply_online_now"><a href="#" onclick="$('#apply-online').toggle(); window.location.href = '#apply'; return false;">» Apply now</a></div>
        @endif

        <br>

        @include('partials/social')

    </div><!-- #job-details -->

    <div id="job-bottom">
        <div id="job-post-utils">
            <a href="{{ Config::get('app.url') }}/jobs/{{ $job->category->var_name }}/" title="category home">« Go back to category</a><br>
            Is this job ad fake? <a href="#" onclick="Jobber.ReportSpam('http://www.designjobswales.co.uk/report-spam/', 2895); return false;" title="report fake ad">Report it!</a>
            &nbsp;&nbsp;<span id="report-spam-response"></span><br>
            <a href="#" onclick="Jobber.SendToFriend.showHide(); return false;" title="Recommend to a friend">Recommend to a friend</a>
        </div><!-- #job-post-utils -->
        <div id="number-views">
            Published at <strong>{{ date('d-m-Y', strtotime($job->created_on)) }}</strong><br>
            Viewed: <strong>{{ $job->views_count }}</strong> times
        </div><!-- #number-views -->
        <div class="clear"></div>
    </div><!-- #job-bottom -->
@stop
