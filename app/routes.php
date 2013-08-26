<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/jobs', function() {
    $jobs = Job::where('is_active', '=', 1)->orderBy('created_on', 'desc')->take(20)->get();

    $jobsFormatted = array();
    foreach ($jobs as $job) {
        $jobArray = array(
            'id' => $job->id,
            'title' => $job->title,
            'description' => $job->description,
            'company' => $job->company,
            'created_on' => $job->created_on,
            'url' => 'http://www.designjobswales.co.uk/job/'.$job->id.'/'
        );

        if ($job->city) {
            $jobArray['city'] = $job->city->name;
        }

        $jobsFormatted[] = $jobArray;
    }

    return Response::json($jobsFormatted, 200);
});
