@if (!$job->is_active)
    Activate ad: {{ Config::get('app.url') . '/activate/' . $job->id . '/' . $job->auth}}
@else
    New job posted
@endif
\n\n
{{ URL::action('JobController@show', array($job->id, $job->getSlug())) }}
\n\n
{{ $job->title }} at {{ $job->company }}
\n\n
{{ $job->description }}
\n\n
URL: {{ $job->url }}
\n\n
--\n
Published by: $job->poster_email\n
--\n
Edit: {{ URL::action('JobController@edit', array($job->id, $job->auth)) }}
Deactivate: {{ URL::action('JobController@deactivate', array($job->id, $job->auth)) }}

