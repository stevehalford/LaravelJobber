@if (!$job->is_active)
    Activate ad: {{ Config::get('app.url') . '/activate/' . $job->id . '/' . $job->auth}} 
@else
    New job posted
@endif
\r\n
{{ URL::action('JobController@show', array($job->id, $job->getSlug())) }} 
\r\n
{{ $job->title }} at {{ $job->company }} 
\r\n
{{ $job->description }} 
\r\n
URL: {{ $job->url }} 
\r\n
--\r\n
Published by: {{$job->poster_email}} 
\r\n
--\r\n
Edit: {{ URL::action('JobController@edit', array($job->id, $job->auth)) }} \r\n
Deactivate: {{ URL::action('JobController@deactivate', array($job->id, $job->auth)) }} \r\n

