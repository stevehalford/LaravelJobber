@extends('layouts.base')

@section('title', 'Post a Job - Design Jobs Wales')

@section('body')
<div id="content">
    <div class="steps">
        <div id="step-1">
            Step 1: Write
        </div>
        <div id="step-2" class="step-active">
            Step 2: Verify
        </div>
        <div id="step-3">
            Step 3: Confirm
        </div>
        <div class="clear"></div>
    </div>
    <br />

    <h2>
        <img src="http://www.designjobswales.co.uk/_templates/djw/img/icon-{{ $job->type->var_name }}.png" alt="{{ $job->type->name }}">
        {{ $job->title }}
    </h2>
    <p>
        <span class="fading">at</span>
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

    {{ Form::open(array('action' => array('JobController@confirm', $job->id), 'id' => 'publish_form')) }}
        {{ Form::token() }}
        <fieldset>
            <p>NB: If you are a <strong>recruitment agent</strong> posting a job on behalf of a client, we will ask for a small fee of <strong>&pound;20</strong> via paypal before your job ad will be approved. This will help keep the site running for the benefit of local developers and designers. Thank you.</p>
            <div class="right">
                <div class="suggestion">If you changed your mind you can
                <a href="{{Config::get('app.url')}}" title="Cancel">cancel posting this ad</a></div>
            </div>
            <input type="submit" name="submit" id="submit" value="Publish" />
            &nbsp;or&nbsp;
            <a href="{{URL::action('JobController@edit', $job->id)}}" title="Edit">Edit it</a>
        </fieldset>
    {{ Form::close() }}

</div>
@stop
