{{$job.title}}\n\n
@if (!$job.is_active)
    Activate ad: {{}}
@endif

Hello! :)

Your ad was published and is available at: {{ URL::action('JobController@show', array($job->id, $job->getSlug())) }}

---
Edit: {{ URL::action('JobController@edit', array($job->id, $job->auth)) }}
Deactivate: {{ URL::action('JobController@deactivate', array($job->id, $job->auth)) }}

---

Thank you for using our service!
Steve
