Hello! :)

Your ad was published and is available at: {{ URL::action('JobController@show', array($job->id, $job->getSlug())) }}

Please keep this email handy as the links below will allow you to edit or deactivate the ad should you wish to in the future.

---
Edit: {{ URL::action('JobController@edit', array($job->id, $job->auth)) }}
Deactivate: {{ URL::action('JobController@deactivate', array($job->id, $job->auth)) }}

---

Thank you for using our service!
Steve
