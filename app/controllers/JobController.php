<?php

class JobController extends BaseController
{
    public function show($id)
    {
        $job = Job::find($id);

        return View::make(
            'job.show',
            array(
                'job' => $job
            )
        );
    }

    public function apply($id)
    {
        $job = Job::find($id);

        $application = new Enquiry;
        $application->job_id = $job->id;

        if ($application->save()) {
            $job->apply_count = $job->apply_count + 1;
            $job->save();
        }
    }
}
