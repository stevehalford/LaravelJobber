<div class="row">
    <span class="row-info">
        <img src="{{ Config::get('app.url') }}/img/icon-{{ $job->type->var_name }}.png" alt="{{ $job->type->name }}">
        <a href="{{ URL::action('JobController@show', array($job->id, $job->getSlug())) }}" title="{{ $job->title }}">
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
        @if (isset($apply_count) && $apply_count)
            <strong>{{ $job->apply_count }}</strong>
            applications
        @else
            <img src="http://www.designjobswales.co.uk/_templates/djw/img/clock.gif" alt="">
            {{ date('d-m-Y', strtotime($job->created_on)) }}
        @endif
    </span>
</div>
