<div class="row">
    <a href="{{ URL::action('JobController@show', array($job->id, $job->getSlug())) }}" title="{{ $job->title }}">
        <h2>{{ $job->title }}</h2>
        <h3>
            <img src="{{ Config::get('app.url') }}/img/icon-{{ $job->type->var_name }}.png" alt="{{ $job->type->name }}">
            <strong>{{ $job->company }}</strong>
            @if ($job->city)
                in
                <strong>{{ $job->city->name }}</strong>
            @else
                @if ($job->outside_location)
                    <strong>- {{ $job->outside_location }}</strong>
                @else
                    <strong>- Anywhere</strong>
                @endif
            @endif
            - Posted {{ $job->created_on->diffForHumans() }} - <strong>{{ $job->apply_count }}</strong> applications
        </h3>
    </a>
    
</div>
