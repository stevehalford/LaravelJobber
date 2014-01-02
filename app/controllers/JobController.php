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
}
