Hello! :)\r\n
\r\n\r\n
Your ad was published and is available at: {{ URL::action('JobController@show', array($job->id, $job->getSlug())) }} \r\n
\r\n\r\n
---\r\n
Edit: {{ URL::action('JobController@edit', array($job->id, $job->auth)) }}\r\n
Deactivate: {{ URL::action('JobController@deactivate', array($job->id, $job->auth)) }}\r\n
\r\n\r\n
---\r\n
\r\n
Thank you for using our service!\r\n
Steve
