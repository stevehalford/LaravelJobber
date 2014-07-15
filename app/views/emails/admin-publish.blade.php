@if (!$job->is_active)
    Activate ad: {{ Config::get('app.url') . '/activate/' . $job->id . '/' . $job->auth}} 
@else
    New job posted
@endif
 
{{ URL::action('JobController@show', array($job->id, $job->getSlug())) }} 
 
{{ $job->title }} at {{ $job->company }} 
 
{{ $job->description }} 
 
URL: {{ $job->url }} 
 
-- 
Published by: {{$job->poster_email}} 
 
-- 
Edit: {{ URL::action('JobController@edit', array($job->id, $job->auth)) }}  
Deactivate: {{ URL::action('JobController@deactivate', array($job->id, $job->auth)) }}  

