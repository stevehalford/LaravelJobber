@extends('layouts.base')

@section('body')
    <h2>Most recent jobs</h2>
    @foreach ($recents as $job)
            <div class="row">
                <span class="row-info">
                    <img src="http://www.designjobswales.co.uk/_templates/djw/img/icon-fulltime.png" alt="Full-time">
                    <a href="http://www.designjobswales.co.uk/job/2895/experienced-designer-at-spindogs/" title="{{ $job->title }}">
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
        </li>
    @endforeach
@stop
