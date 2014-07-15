{{ Markdown::parse($apply_msg) }} 
\r\n
--\r\n
This e-mail is an application sent from {{ URL::action('JobController@show', array($job->id, $job->getSlug())) }} 
